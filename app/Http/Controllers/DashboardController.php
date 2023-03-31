<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use App\Models\ProductOrder;
use App\Models\Payment;
use App\Classes\UserProjectInfo;
use DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getLastMonthData()
    {
      $projectInfo = new UserProjectInfo;

        $expenses = Expense::whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->where('deletionStatus',0)
        ->whereIn('projectId', $projectInfo->getUserProjectId()->pluck('project_id'))
        ->get(['amount','created_at']);
        
        $total = 0;
        foreach($expenses as $exp){
            $total=$total+$exp->amount;
        }

        $this_months_collection = Payment::select('id','orderId','amount')
                        ->whereMonth('created_at', '=', date('m'))
                        ->whereYear('created_at', '=', date('Y'))
                        ->where('deletionStatus',0)
                        ->whereIn('projectId', $projectInfo->getUserProjectId()->pluck('project_id'))
                        ->get();

        $totalPaymentReceived=0;                
          foreach($this_months_collection as $c){
            $totalPaymentReceived=$totalPaymentReceived+$c->amount;
          }


          // Product::select('productQuantity')->where('deletionStatus',0)->get();

        $productStock = DB::table('products')
        ->where('deletionStatus',0)
        ->whereIn('projectId', $projectInfo->getUserProjectId()->pluck('project_id'))
        ->sum('productQuantity');

        $ordersData = ProductOrder::whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->where('deletionStatus',0)
        ->whereIn('projectId', $projectInfo->getUserProjectId()->pluck('project_id'))
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
            "due" => $dueAmount,
            "totalPaymentReceived" => $totalPaymentReceived,
            "productStock" => $productStock,
          );

        //   except current month data
        //   Payment::whereYear('created_at', '<>', now()->year)
        //          ->orWhereMonth('created_at', '<>', now()->month)
        //          ->get();

          //current month payment for old orders
          $currentMonthData = Payment::select('payments.id','payments.orderId','payments.amount')
                        ->join('product_orders as po', 'po.id', '=', 'payments.orderId')
                        ->whereMonth('payments.created_at', '=', date('m'))
                        ->whereYear('payments.created_at', '=', date('Y'))
                        ->where('payments.deletionStatus',0)
                        ->whereIn('payments.projectId', $projectInfo->getUserProjectId()->pluck('project_id'))
                        ->where(function ($query) {
                            $query->whereYear('po.created_at', '<>', now()->year)
                                  ->orWhereMonth('po.created_at', '<>', now()->month);
                        })
                        ->get();
        $dueCollection=0;                
          foreach($currentMonthData as $data){
            $dueCollection=$dueCollection+$data->amount;
                // echo $data->id.'_'.$data->orderId.'_'.$data->amount.'<br>';
          }

          // dd($orderInfo);

        return view('usersdashboard',['total' => $total,'orderInfo' => $orderInfo,'dueCollection'=>$dueCollection]);
    }

    public function getDueCustomerList()
    {
        $projectInfo = new UserProjectInfo;

        $dueCustomersData = ProductOrder::select(
            'product_orders.id', 
            'product_orders.unit',
            'product_orders.payable',
            'product_orders.paid',
            'product_orders.due',
            'product_orders.dueDate',
            'p.name as productName',
            'c.name as customerName',
            'c.phoneNumber as CustomersContact'

        )
        ->join('products as p', 'p.id', '=', 'product_orders.productId')
        ->join('customers as c', 'c.id', '=', 'product_orders.customerId')
        ->whereIn('product_orders.projectId', $projectInfo->getUserProjectId()->pluck('project_id'))
        ->where([['product_orders.due','>',0]])
        ->get();
        
        return view('reports.customer_due',['dueCustomersData'=>$dueCustomersData]);
        
    }

    public function getNextRecoveryCustomerslist()
    {

        $projectInfo = new UserProjectInfo;

        $dueCustomersData = ProductOrder::select(
            'product_orders.id', 
            'product_orders.unit',
            'product_orders.payable',
            'product_orders.paid',
            'product_orders.due',
            'product_orders.dueDate',
            'p.name as productName',
            'c.name as customerName',
            'c.phoneNumber as CustomersContact'
        )
        ->join('products as p', 'p.id', '=', 'product_orders.productId')
        ->join('customers as c', 'c.id', '=', 'product_orders.customerId')
        ->where([['product_orders.due','>',0]])
        ->whereBetween('product_orders.dueDate', [now(), now()->addDays(7)])
        ->whereIn('product_orders.projectId', $projectInfo->getUserProjectId()->pluck('project_id'))
        ->get();
        
        return view('reports.upcoming_customer_due',['dueCustomersData'=>$dueCustomersData]);
        
    }
}
