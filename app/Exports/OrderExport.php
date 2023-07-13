<?php

namespace App\Exports;

use App\Models\ProductOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Classes\UserProjectInfo;

class OrderExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $projectInfo = new UserProjectInfo;

        $dueCustomersData = ProductOrder::select(
            'product_orders.id',
            'p.name as productName',
            'c.name as customerName',
            'c.phoneNumber as CustomersContact',
            'c.address as cAddress',
            'product_orders.unit',
            'product_orders.payable',
            'product_orders.paid',
            'product_orders.due',
            'projects.name as projectName'

        )
        ->join('products as p', 'p.id', '=', 'product_orders.productId')
        ->join('customers as c', 'c.id', '=', 'product_orders.customerId')
        ->join('projects', 'product_orders.projectId', '=', 'projects.id')
        ->where([['product_orders.due','>',0],['product_orders.deletionStatus','=',0]])
        ->whereIn('product_orders.projectId', $projectInfo->getUserProjectId()->pluck('project_id'))
        ->get();

        // return $dueCustomersData;
    }

    public function headings(): array

    {

        return ["ID","Product","Customer","Phone","Address", "Unit", "Payable","Paid", "due","Project"];

    }
}
