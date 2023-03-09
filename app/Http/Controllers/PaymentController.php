<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\PaymentMethod;

class PaymentController extends Controller
{
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
        $products = Product::where('publicationStatus', 1)->get();
        $customers = Customer::where('publicationStatus', 1)->get();
        $methods = PaymentMethod::where('publicationStatus', 1)->get();
        return view('payment.create',['products' => $products, 'customers' => $customers,'methods' => $methods]);
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
            'amount' => 'numeric|min:0|between:1,999999999',
            'paymentMethod' => 'required|not_in:0',
            'phoneNumber' => 'required|digits:11',
        ]);

        $payment = new Payment();

        $payment->productId = $request->productId;
        $payment->customerId = $request->customerId;
        $payment->projectId = $request->projectId;
        $payment->paymentMethod = $request->paymentMethod;
        $payment->amount = $request->amount;
        $payment->reference = $request->reference;
        $payment->phoneNumber = $request->phoneNumber;
        $payment->note = $request->note;
        $payment->save();

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
        $customerInfo = Customer::where('id', $payment->customerId)->first();
        $customerInfoById=json_encode($customerInfo);
        $productInfo = Product::where('id', $payment->productId )->first();
        $productDetails=json_encode($productInfo);
        $products = Product::where('publicationStatus', 1)->get();
        $customers = Customer::where('publicationStatus', 1)->get();
        $methods = PaymentMethod::where('publicationStatus', 1)->get();
        return view('payment.edit',['productDetails' => $productDetails,'customerInfoById' => $customerInfoById,'paymentById' => $payment,'products' => $products, 'customers' => $customers,'methods' => $methods]);
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
        request()->validate([
            'productId' => 'required|not_in:0',
            'customerId' => 'required|not_in:0',
            'projectId' => 'required|not_in:0',
            'amount' => 'numeric|min:0|between:1,999999999',
            'paymentMethod' => 'required|not_in:0',
            'phoneNumber' => 'required|digits:11',
        ]);

        $payment = Payment::find($id);

        $payment->productId = $request->productId;
        $payment->customerId = $request->customerId;
        $payment->projectId = $request->projectId;
        $payment->paymentMethod = $request->paymentMethod;
        $payment->amount = $request->amount;
        $payment->reference = $request->reference;
        $payment->phoneNumber = $request->phoneNumber;
        $payment->note = $request->note;
        $payment->save();

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
       $payment->save();
       return redirect()->route('payment.index')->with('success','Payment delete successfully') ;
    }
}
