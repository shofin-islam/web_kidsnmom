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

        $products = ProductOrder::where('id', $request->orderId)->first();
        
        request()->validate([
            'orderId' => 'required|not_in:0',
            'projectId' => 'required|not_in:0',
            // 'amount' => 'numeric|min:0|between:1,999999999',
            'amount' => ['required','integer', function ($attribute, $value, $fail)use ($products) {
                   $due=$products->due;
                    if ($value > $due) {
                         $fail($attribute.' could not be more than due.');
                    }
              }],
            'paymentMethod' => 'required|not_in:0',
            'phoneNumber' => 'required|digits:11',
        ]);

        $payment = new Payment();

        $payment->orderId = $request->orderId;

        $payment->productId = $products->productId;
        $payment->customerId = $products->customerId;

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
        $products = ProductOrder::where('id', $request->orderId)->first();
        
        request()->validate([
            'orderId' => 'required|not_in:0',
            'projectId' => 'required|not_in:0',
            // 'amount' => 'numeric|min:0|between:1,999999999',
            'amount' => ['required','integer', function ($attribute, $value, $fail)use ($products) {
                   $due=$products->due;
                    if ($value > $due) {
                         $fail($attribute.' could not be more than due.');
                    }
              }],
            'paymentMethod' => 'required|not_in:0',
            'phoneNumber' => 'required|digits:11',
        ]);


        $payment = Payment::find($id);
        $payment->orderId = $request->orderId;
        $payment->productId = $products->productId;
        $payment->customerId = $products->customerId;
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
