<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetails;
use Auth;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }
    public function customersHome(){
        $cartCount = Cart::count();
         // return $cartCount;
        return view('frontEnd.customers.customerHomePage',['cartCount'=>$cartCount]);
    }
    public function checkoutSuccess() {
        return view('frontEnd.checkout.myHome');
    }
    public function updatePasswordForm() {
        return view('frontEnd.customers.updatePassword');
    }
    public function updatePassword(Request $request) {
        $oldPassword=$request->oldPassword;
        $newPassword=$request->newPassword;
        if(!(Hash::check($oldPassword,Auth::guard('customer')->user()->password))){
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }else if(strcmp($oldPassword,$newPassword) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }else{
            Auth::guard('customer')->user()->fill(['password'=>Hash::make($newPassword)])->save();
            return redirect()->back()->with("error","New Password Update Successfully");
        }
    }
    public function myOrderList() {
       $userId= Session::get('customerId');
       $myOrders =Order::where('customerId',$userId)->where('orderStatus','Confirm')->paginate(2);

       $myOrderList=[];
       
       foreach ($myOrders as $order){
           $orderId=$order->id;
           $myOrderList[]= OrderDetails::where('orderId',$orderId)->get();
       }

        return view('frontEnd.customers.myOrderList',['myOrders'=>$myOrders,'myOrderList'=>$myOrderList]);
        
    }
    
}
