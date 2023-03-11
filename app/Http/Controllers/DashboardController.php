<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use App\Models\ProductOrder;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getLastMonthData()
    {

        $expenses = Expense::whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->get(['amount','created_at']);
        
        $total = 0;
        foreach($expenses as $exp){
            $total=$total+$exp->amount;
        }

        $ordersData = ProductOrder::whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->get(['payable','paid','due','created_at']);
        
        $payable = 0;
        $dueAmount = 0;
        $paidAmount = 0;
        
        foreach($ordersData as $od){
            $payable=$payable+$od->payable;
            $dueAmount=$dueAmount+$od->due;
            $paidAmount=$paidAmount+$od->paid;
        }
        $orderInfo= array(
            "payable" => $payable,
            "paid" => $paidAmount,
            "due" => $dueAmount
          );

        return view('usersdashboard',['total' => $total,'orderInfo' => $orderInfo]);
    }

    public function getDueCustomerList()
    {
        $dueCustomersData = ProductOrder::select(
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
        ->where([['product_orders.due','>',0]])
        ->get();
        
        return view('reports.customer_due',['dueCustomersData'=>$dueCustomersData]);
        
    }
}
