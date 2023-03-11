<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\PaymentMethod;
use App\Models\ProductOrder;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{

    function __construct()

    {

         $this->middleware('permission:payment-list|payment-create|payment-edit|payment-delete', ['only' => ['index','show']]);

         $this->middleware('permission:payment-create', ['only' => ['create','store']]);

         $this->middleware('permission:payment-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:payment-delete', ['only' => ['destroy']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $payments = Payment::select(
            'payments.*', 
            'p.name as productName',
            'c.name as customerName',
            'm.methodName as methodName',
        )
        ->join('products as p', 'p.id', '=', 'payments.productId')
        ->join('customers as c', 'c.id', '=', 'payments.customerId')
        ->join('payment_methods as m', 'm.id', '=', 'payments.paymentMethod')
        ->orderBy('id', 'asc')
        ->paginate(100);

    return view('payment.index',compact('payments')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productOrders = ProductOrder::select(
                        'product_orders.id',
                        'product_orders.due',
                        'p.name as productName',
                        'c.name as customerName'
                    )
                    ->join('products as p', 'p.id', '=', 'product_orders.productId')
                    ->join('customers as c', 'c.id', '=', 'product_orders.customerId')
                    ->get();
        $methods = PaymentMethod::where('publicationStatus', 1)->get();
        return view('payment.create',['methods' => $methods,'orders'=>$productOrders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $pOrder = ProductOrder::where('id', $request->orderId)->first();
        
        request()->validate([
            'orderId' => 'required|not_in:0',
            'projectId' => 'required|not_in:0',
            // 'amount' => 'numeric|min:0|between:1,999999999',
            'amount' => ['required','numeric','between:0,999999999', function ($attribute, $value, $fail)use ($pOrder) {
                   $due=$pOrder->due;
                    if ($value > $due) {
                         $fail($attribute.' could not be more than due.');
                    }
              }],
            'paymentMethod' => 'required|not_in:0',
            'phoneNumber' => 'required|digits:11',
        ]);

        $reqAmount=$request->amount;

        $payment = new Payment();

        $payment->orderId = $request->orderId;
        $payment->productId = $pOrder->productId;
        $payment->customerId = $pOrder->customerId;

        $payment->projectId = $request->projectId;
        $payment->paymentMethod = $request->paymentMethod;
        $payment->amount = $reqAmount;
        $payment->reference = $request->reference;
        $payment->phoneNumber = $request->phoneNumber;
        $payment->note = $request->note;
        $payment->save();

        $due = $pOrder->due;
        $paid = $pOrder->paid;
        $newDue=$due-$reqAmount;
        $newPaid=$paid+$reqAmount;

        $pOrder->due=$newDue;
        $pOrder->paid=$newPaid;
        $pOrder->save();

        return redirect()->route('payment.index')->with('success','payment placed successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paymentInfo = Payment::select(
            'payments.*', 
            'p.name as productName',
            'c.name as customerName',
            'm.methodName as methodName',
        )
        ->join('products as p', 'p.id', '=', 'payments.productId')
        ->join('customers as c', 'c.id', '=', 'payments.customerId')
        ->join('payment_methods as m', 'm.id', '=', 'payments.paymentMethod')
        ->where('payments.id',$id)
        ->first();
        
        // to show activity log
            // $logs= Activity::where([
            // ['log_name', '=', 'payment'],
            // ['subject_id', '=', $id]])->get();

            // foreach($logs as $log){
            //     echo $log->changes().'<br>==============<br>';
            // }
        return view('payment.show',compact('paymentInfo')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = Payment::where('id',$id)->first();

        $productOrders = ProductOrder::select(
            'product_orders.id',
            'product_orders.due',
            'p.name as productName',
            'c.name as customerName'
        )
        ->join('products as p', 'p.id', '=', 'product_orders.productId')
        ->join('customers as c', 'c.id', '=', 'product_orders.customerId')
        ->get();

        $products = ProductOrder::where('id', $payment->orderId)->first();
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
        $orderDetails = json_encode($data);


        $methods = PaymentMethod::where('publicationStatus', 1)->get();
        return view('payment.edit',['orders' => $productOrders,'orderDetails' => $orderDetails,'paymentById' => $payment,'methods' => $methods]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pOrder = ProductOrder::where('id', $request->orderId)->first();
        
        request()->validate([
            'orderId' => 'required|not_in:0',
            'projectId' => 'required|not_in:0',
            // 'amount' => 'numeric|min:0|between:1,999999999',
            'amount' => ['required','integer', function ($attribute, $value, $fail)use ($pOrder) {
                   $due=$pOrder->due;
                    if ($value > $due) {
                         $fail($attribute.' could not be more than due.');
                    }
              }],
            'paymentMethod' => 'required|not_in:0',
            'phoneNumber' => 'required|digits:11',
        ]);


        $payment = Payment::find($id);

        $oldOrderId = $payment->orderId;
        $newOrderId= $request->orderId;
        $sameOrderId=0;
        
        $oldAmount = $payment->amount;
        $reqAmount = $request->amount;

        $payment->orderId = $request->orderId;
        $payment->productId = $pOrder->productId;
        $payment->customerId = $pOrder->customerId;
        $payment->projectId = $request->projectId;
        $payment->paymentMethod = $request->paymentMethod;
        $payment->amount = $request->amount;
        $payment->reference = $request->reference;
        $payment->phoneNumber = $request->phoneNumber;
        $payment->note = $request->note;
        $payment->save();

        if($oldOrderId==$newOrderId){
            $sameOrderId=1;
        }else{
            $sameOrderId=0;

            $porderDue = $pOrder->due;
            $porderPaid = $pOrder->paid;
            $changeDue=$porderDue-$reqAmount;
            $changepaid=$porderPaid+$reqAmount;

            $pOrder->due=$changeDue;
            $pOrder->paid=$changepaid;
            $pOrder->save();

            $oldProductOrder = ProductOrder::where('id', $oldOrderId)->first();
            $oldProductOrder->paid = $oldProductOrder->paid - $oldAmount;
            $oldProductOrder->due = $oldProductOrder->due + $oldAmount;
            $oldProductOrder->save();
            
        }

        if( $oldAmount > $reqAmount && $sameOrderId==1){
            $diff = $oldAmount - $reqAmount;
            
            $newPaidAmount = $pOrder->paid;
            $newPaidAmount=$newPaidAmount-$diff;
            $pOrder->paid = $newPaidAmount;

            $newDueAmount = $pOrder->due;
            $newDueAmount=$newDueAmount+$diff;
            $pOrder->due = $newDueAmount;
            $pOrder->save();
            
        }else if($reqAmount>$oldAmount && $sameOrderId==1){
            $diff = $reqAmount - $oldAmount;
            
            $newPaidAmount = $pOrder->paid;
            $newPaidAmount=$newPaidAmount+$diff;
            $pOrder->paid = $newPaidAmount;

            $newDueAmount = $pOrder->due;
            $newDueAmount=$newDueAmount-$diff;
            $pOrder->due = $newDueAmount;
            $pOrder->save();
        }else{
            // echo " not changed";
        }
        
        return redirect()->route('payment.index')->with('success','payment placed successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // dd($id);
       $payment=Payment::find($id);
       $payment->deletionStatus = 1;
       $oldOrderid = $payment->orderId;
       $oldAmount = $payment->amount;
       $payment->save();

            $oldProductOrder = ProductOrder::where('id', $oldOrderId)->first();
            $oldProductOrder->paid = $oldProductOrder->paid - $oldAmount;
            $oldProductOrder->due = $oldProductOrder->due + $oldAmount;
            $oldProductOrder->save();
       
       return redirect()->route('payment.index')->with('success','Payment delete successfully') ;
    }
}
