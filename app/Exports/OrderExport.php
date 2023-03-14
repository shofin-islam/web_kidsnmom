<?php

namespace App\Exports;

use App\Models\ProductOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $dueCustomersData = ProductOrder::select(
            'product_orders.id',
            'p.name as productName',
            'c.name as customerName',
            'c.phoneNumber as CustomersContact',
            'product_orders.unit',
            'product_orders.payable',
            'product_orders.paid',
            'product_orders.due'

        )
        ->join('products as p', 'p.id', '=', 'product_orders.productId')
        ->join('customers as c', 'c.id', '=', 'product_orders.customerId')
        ->where([['product_orders.due','>',0]])
        ->get();

        return $dueCustomersData;
    }

    public function headings(): array

    {

        return ["ID","productName","customerName","Phone_Number", "Unit", "Payable","Paid", "due"];

    }
}
