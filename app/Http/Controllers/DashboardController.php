<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use App\Models\ProductOrder;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getLastMonthExpense()
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
        
        foreach($ordersData as $od){
            $payable=$payable+$od->payable;
        }

        return view('usersdashboard',['total' => $total,'payable' => $payable]);
    }
}
