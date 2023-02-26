<?php

namespace App\Http\Controllers;

use App\Models\ProductOrder;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Response;
use DB;
class ProductOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = ProductOrder::select(
            'product_orders.id', 
            'product_orders.unit',
            'product_orders.payable',
            'product_orders.paid',
            'product_orders.due',
            'p.name as productName',
            'c.name as customerName',
            'c.phoneNumber as CustomersContact'

        )
        ->join('products as p', 'p.id', '=', 'product_orders.productId')
        ->join('customers as c', 'c.id', '=', 'product_orders.customerId')
        ->orderBy('id', 'asc')
        ->paginate(100);

    return view('productOrder.index',compact('orders')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('publicationStatus', 1)->get();
        $customers = Customer::where('publicationStatus', 1)->get();
        return view('productOrder.create',['products' => $products, 'customers' => $customers]);
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
            'projectId' => 'required|not_in:0',
            'unit' => 'required|min:1|numeric|gt:0',
            'flatDiscount' => 'required|numeric|between:0,999999999',
            'paid' => 'required|numeric|min:0|between:0,999999999',
            'payable' => 'numeric|min:0|between:0,999999999',
            'due' => 'numeric|min:0',
            'subTotal' => 'numeric|gt:0',
        ]);

        $pId = $request->productId;
        $cId = $request->customerId;
        $productInfo = Product::where('id', $pId )->first();
        $customerInfo = Customer::where('id', $cId)->first();

        $unit = $request->unit;
        $unitPrice = $productInfo->salesPrice;
        $productCode = $productInfo->productCode;
        $subTotal = $unit*$unitPrice;
        $payble=$subTotal-$request->flatDiscount;
        $productOrder = new ProductOrder();

        $productOrder->productId = $request->productId;
        $productOrder->customerId = $request->customerId;
        $productOrder->unit = $unit;
        $productOrder->unitPrice = $unitPrice;
        $productOrder->subTotal = $subTotal;
        $productOrder->customerDetails = json_encode($customerInfo);
        $productOrder->productDetails = json_encode($productInfo);
        $productOrder->projectId = $request->projectId;
        $productOrder->flatDiscount = $request->flatDiscount;
        $productOrder->payable = $payble;
        $productOrder->paid = $request->paid;
        $productOrder->due = $payble-$request->paid;
        $productOrder->note = $request->note;
        $productOrder->save();
        
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
            'c.phoneNumber as CustomersContact'
        )
        ->join('products as p', 'p.id', '=', 'product_orders.productId')
        ->join('customers as c', 'c.id', '=', 'product_orders.customerId')
        ->where('product_orders.id',$id)
        ->first();
        // return Response::json($order);

        dd($order);
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
        
        $order = ProductOrder::select(
            'product_orders.*')
        ->where('product_orders.id',$id)
        ->first();

        $products = Product::where('publicationStatus', 1)->get();
        $customers = Customer::where('publicationStatus', 1)->get();

        return view('productOrder.edit',['order' => $order,'products' => $products, 'customers' => $customers]);

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

            'productId' => 'required|not_in:0',
            'customerId' => 'required|not_in:0',
            'projectId' => 'required|not_in:0',
            'unit' => 'required|min:1|numeric|gt:0',
            'flatDiscount' => 'required|numeric|between:0,999999999',
            'paid' => 'required|numeric|min:0|between:0,999999999',
            'payable' => 'numeric|min:0|between:0,999999999',
            'due' => 'numeric|min:0',
            'subTotal' => 'numeric|gt:0',
        ]);
        
        $pId = $request->productId;
        $cId = $request->customerId;
        $productInfo = Product::where('id', $pId )->first();
        $customerInfo = Customer::where('id', $cId)->first();

        $unit = $request->unit;
        $unitPrice = $productInfo->salesPrice;
        $productCode = $productInfo->productCode;
        $subTotal = $unit*$unitPrice;
        $payble=$subTotal-$request->flatDiscount;

        $productOrder = ProductOrder::find($id);
        // dd($productOrder);
        $productOrder->productId = $request->productId;
        $productOrder->customerId = $request->customerId;
        $productOrder->unit = $unit;
        $productOrder->unitPrice = $unitPrice;
        $productOrder->subTotal = $subTotal;
        $productOrder->customerDetails = json_encode($customerInfo);
        $productOrder->productDetails = json_encode($productInfo);
        $productOrder->projectId = $request->projectId;
        $productOrder->flatDiscount = $request->flatDiscount;
        $productOrder->payable = $payble;
        $productOrder->paid = $request->paid;
        $productOrder->due = $payble-$request->paid;
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
        $productOrder->deletionStatus = 1;
        $productOrder->save();
        return redirect()->route('sales.index')->with('success','Order deleted successfully') ;
    }
}
