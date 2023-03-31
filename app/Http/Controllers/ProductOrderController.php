<?php

namespace App\Http\Controllers;

use App\Models\ProductOrder;
use App\Models\Product;
use App\Models\Customer;
use App\Models\PaymentMethod;
use App\Models\Payment;
use Illuminate\Http\Request;
use Response;
use DB;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Validator;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ProjectUser;
use App\Classes\UserProjectInfo;

class ProductOrderController extends Controller
{
    function __construct()

    {

         $this->middleware('permission:product-order-list|product-order-create|product-order-edit|product-order-delete', ['only' => ['index','show']]);

         $this->middleware('permission:product-order-create', ['only' => ['create','store']]);

         $this->middleware('permission:product-order-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:product-order-delete', ['only' => ['destroy']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectInfo = new UserProjectInfo;

        $orders = ProductOrder::select(
            'product_orders.id', 
            'product_orders.unit',
            'product_orders.payable',
            'product_orders.paid',
            'product_orders.due',
            'product_orders.deletionStatus',
            'product_orders.profit',
            'p.name as productName',
            'c.name as customerName',
            'c.phoneNumber as CustomersContact',
            'projects.name as projectName',
        )
        ->join('products as p', 'p.id', '=', 'product_orders.productId')
        ->join('customers as c', 'c.id', '=', 'product_orders.customerId')
        ->join('projects', 'product_orders.projectId', '=', 'projects.id')
        ->whereIn('product_orders.projectId', $projectInfo->getUserProjectId()->pluck('project_id'))
        ->where('product_orders.deletionStatus',0)
        ->orderBy('id', 'asc')
        ->paginate(1000);
    return view('productOrder.index',compact('orders')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projectInfo = new UserProjectInfo;

        $products = Product::where('publicationStatus', 1)
                                ->where('deletionStatus',0)
                                ->whereIn('projectId', $projectInfo->getUserProjectId()->pluck('project_id'))
                                ->get();
        $customers = Customer::where('publicationStatus', 1)
        ->where('deletionStatus',0)
        ->whereIn('projectId', $projectInfo->getUserProjectId()->pluck('project_id'))
        ->get();
        $methods = PaymentMethod::where('publicationStatus', 1)->where('deletionStatus',0)->get();
        return view('productOrder.create',['products' => $products, 'customers' => $customers,'methods'=>$methods,'Projects'=>$projectInfo->getUserProjectName()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'productId' => 'required|not_in:0',
            'customerId' => 'required|not_in:0',
            'unit' => 'required|min:1|numeric',
            'dueDate' => 'required|date|after_or_equal:today',
            'methodId' => 'required|not_in:0',
        ]);
        
        $mdy = explode('/', $request->dueDate); // split the string into an array of parts
        $ymd = $mdy[2] . '-' . $mdy[0] . '-' . $mdy[1].' 23:59:59'; // create a new string with the parts rearranged
        $pId = $request->productId;
        $cId = $request->customerId;
        $unit = $request->unit;
        $methodId = $request->methodId;
        $projectId = $request->projectId;

        // $productById = Product::find($request->productId);
        $productById = Product::where('id', $pId )->first();

        $purchasePrice_Unit = $productById->purchasePrice;
        $investFromOrder = $unit*$purchasePrice_Unit;

        request()->validate([
            'productId' => 'required|not_in:0',
            'customerId' => 'required|not_in:0',
            'unit' => ['required','min:1','numeric', function ($attribute, $value, $fail)use ($productById) {
                $available = $productById->productQuantity;
                if ($value > $available ) {
                      $fail($attribute.' not available.');
                 }
           }],
            'flatDiscount' => 'required|numeric|between:0,999999999',
            'paid' => 'required|numeric|min:0|between:0,999999999',
            'payable' => 'numeric|min:0|between:0,999999999',
            'due' => 'numeric|min:0',
            'subTotal' => 'numeric|gt:0',
            'dueDate' => 'required|date|after_or_equal:today',
        ]);
        
        $customerInfo = Customer::where('id', $cId)->first();
        $phoneNumber = $customerInfo->phoneNumber;

        $unitPrice = $productById->salesPrice;
        $productCode = $productById->productCode;
        $productProject = $productById->projectId;
        $subTotal = $unit*$unitPrice;
        $payble=$subTotal-$request->flatDiscount;
        $paidAmount = $request->paid;
        $profit = $payble-$investFromOrder;

        $productOrder = new ProductOrder();

        $productOrder->productId = $request->productId;
        $productOrder->customerId = $request->customerId;
        $productOrder->unit = $unit;
        $productOrder->unitPrice = $unitPrice;
        $productOrder->subTotal = $subTotal;
        $productOrder->customerDetails = json_encode($customerInfo);
        $productOrder->productDetails = json_encode($productById);
        $productOrder->projectId = $productProject;
        $productOrder->flatDiscount = $request->flatDiscount;
        $productOrder->payable = $payble;
        $productOrder->paid = $paidAmount;
        $productOrder->due = $payble-$paidAmount;
        $productOrder->dueDate = $ymd;
        $productOrder->profit = $profit;
        $productOrder->note = $request->note;
        $productOrder->save();
        
        $availableUnit = $productById->productQuantity;
        $latestUnit=$availableUnit-$unit;
        $productById->productQuantity = $latestUnit;
        $productById->save();

        $oid = $productOrder->getAttribute('id');

        $payment = new Payment();

        $payment->orderId = $oid;
        $payment->productId = $pId;
        $payment->customerId = $cId;

        $payment->projectId = $projectId;
        $payment->paymentMethod = $methodId;
        $payment->amount = $paidAmount;
        $payment->paymentType = 1;
        $payment->paymentSource = "ProductOrder";
        $payment->phoneNumber = $phoneNumber;
        $payment->save();


        return redirect()->route('sales.index')->with('success','Order created successfully.');
    }

    public function productById(Request $request)
    {
        $products = Product::where('id', $request->id)->get();
        return Response::json($products);
    }

    public function customerById(Request $request)
    {
        $customer = Customer::where('id', $request->id)->get();
        return Response::json($customer);
    }
    public function orderDetails(Request $request)
    {
        $products = ProductOrder::where('id', $request->id)->first();
        $productDetails =json_decode($products->productDetails);
        $customerDetails =json_decode($products->customerDetails);
        $data= array(
            "oId" => $products->id,
            "pName" => $productDetails->name,
            "cName" => $customerDetails->name,
            "cPhoneNumber" => $customerDetails->phoneNumber,
            "payable" => $products->payable,
            "paid" => $products->paid,
            "due" => $products->due
          );
        return Response::json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = ProductOrder::select(
            'product_orders.*',
            'p.name as productName',
            'p.productCode as productCode',
            'c.name as customerName',
            'c.phoneNumber as CustomersContact',
            'projects.name as projectName'
        )
        ->join('products as p', 'p.id', '=', 'product_orders.productId')
        ->join('customers as c', 'c.id', '=', 'product_orders.customerId')
        ->join('projects', 'product_orders.projectId', '=', 'projects.id')
        ->where('product_orders.id',$id)
        ->first();
        
        // to show activity log
            // $logs= Activity::where([
            // ['log_name', '=', 'productOrder'],
            // ['subject_id', '=', $id]])->get();

            // foreach($logs as $log){
            //     echo $log->changes().'<br>==============<br>';
            // }
        return view('productOrder.show',compact('order')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {       
        $projectInfo = new UserProjectInfo;

        $order = ProductOrder::select(
            'product_orders.*')
        ->where('product_orders.id',$id)
        ->first();
        $productDetails = Product::where('id',$order->productId)->first();
        $productDetails= json_encode($productDetails);
        // dd($productDetails);
        $products = Product::where('publicationStatus', 1)
        ->where('deletionStatus',0)
        ->whereIn('projectId', $projectInfo->getUserProjectId()->pluck('project_id'))
        ->get();
        $customers = Customer::where('publicationStatus', 1)
        ->where('deletionStatus',0)
        ->whereIn('projectId', $projectInfo->getUserProjectId()->pluck('project_id'))
        ->get();

        return view('productOrder.edit',['productDetails' => $productDetails,'order' => $order,'products' => $products, 'customers' => $customers,'Projects'=>$projectInfo->getUserProjectName()]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'dueDate' => 'required|date|after_or_equal:today'
        ]);
        
        $mdy = explode('/', $request->dueDate); // split the string into an array of parts
        $ymd = $mdy[2] . '-' . $mdy[0] . '-' . $mdy[1].' 23:59:59';

        $pId = $request->productId;
        $cId = $request->customerId;
        $productById = Product::find($request->productId);
        $productOrder = ProductOrder::find($id);
        $productInfo = Product::where('id', $pId )->first();
        $customerInfo = Customer::where('id', $cId)->first();
        $productOrderUnit = $productOrder->unit;
        $oldProductId=$productOrder->productId;
        request()->validate([
            'productId' => ['required','not_in:0', function ($attribute, $value, $fail)use ($productOrder) {
                $x = $productOrder->productId;
                if ($value != $x ) {
                      $fail($attribute.' must be same.');
                 }
           }],
            'customerId' => ['required','not_in:0', function ($attribute, $value, $fail)use ($productOrder) {
                $y = $productOrder->customerId;
                if ($value != $y ) {
                      $fail($attribute.' must be same.');
                 }
           }],
           'dueDate' => 'required|date|after_or_equal:today'
        ]);
        
        $productOrder->dueDate = $ymd;
        $productOrder->note = $request->note;
        $productOrder->save();


         return redirect()->route('sales.index')->with('success','Order Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $productOrder=ProductOrder::find($id);
        
        $orderUnit = $productOrder->unit;
        $productId= $productOrder->productId;

        $productOrder->deletionStatus = 1;
        $productOrder->save();

        $productByOrdersProId = Product::where('id',$productId)->first();
        $availableProductUnit = $productByOrdersProId->productQuantity;
        $availableProductUnit=$availableProductUnit+$orderUnit;
        $productByOrdersProId->productQuantity=$availableProductUnit;
        $productByOrdersProId->save();

        $payments=Payment::where('orderId',$id)->get();
        foreach($payments as $p){
            $p->deletionStatus=1;
            $p->save();
        }

        return redirect()->route('sales.index')->with('success','Order deleted successfully');
    }

    public function exportDueCustomers() 

    {

        return Excel::download(new OrderExport, 'Due_Customers.xlsx');
        // return Excel::create('itsolutionstuff_example', function($excel) use ($data) {

        //     $excel->sheet('mySheet', function($sheet) use ($data)
    
        //     {
    
        //         $sheet->fromArray($data);
    
        //     });
    
        //    })->download("pdf");

    }
}
