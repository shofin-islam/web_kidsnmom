@extends('layouts.app')
<style>

    .page-item.active .page-link{

        z-index: 3;

        color: #fff !important  ;

        background-color: #00ACD6 !important;

        border-color: #00ACD6 !important;

        border-radius: 50%;

        padding: 6px 12px;

    }

    .page-link{

        z-index: 3;

        color: #00ACD6 !important;

        background-color: #fff;

        border-color: #007bff;

        border-radius: 50%;

        padding: 6px 12px !important;

    }

    .page-item:first-child .page-link{

        border-radius: 30% !important;

    }

    .page-item:last-child .page-link{

        border-radius: 30% !important;   

    }

    .pagination li{

        padding: 3px;

    }

    .disabled .page-link{

        color: #212529 !important;

        opacity: 0.5 !important;

    }

    div.flex-box {
    display: flex;
    justify-content: space-between;
    border: 2px deeppink dashed;

    .container {
    position: relative;
    width: 600px;
    border: 1px solid blue;
}

.inlineLeft, .inlineRight {
    position: absolute;
    display: inline;
}

.inlineRight {
    right: 0;
}
}

</style>
@section('title','Manage Orders')

@section('mainContent')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="pull-left">
                        <a class="btn btn-warning" href="{{ route('sales.create') }}"> New Order</a>
                    </div>
                    <div class="center-block" style="text-align: center; margin: 3px;padding: 3px;">
                        <i class="fa fa-tasks"></i>
                        <h3 class="box-title">Manage Orders</h3><br>
                        
                        @if (session()->has('success'))
                        <div class="alert alert-success" style="margin: 10px;">
                            {{ session('success') }}
                        </div>
                        @endif
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Code</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Sold Unit</th>
                        <th>Payable</th>
                        <th>Paid</th>
                        <th>Due</th>
                        <th>Project</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->productName }}</td>
                        <td>{{ $order->productCode }}</td>
                        <td>{{ $order->customerName }}</td>
                        <td>{{ $order->CustomersContact }}</td>
                        <td>{{ $order->unit }}</td>
                        <td>{{ $order->payable }}</td>
                        <td>{{ $order->paid }}</td>
                        <td>{{ $order->due }}</td>
                        <td>{{ $order->projectName }}</td>
                        <td>{{ $order->deletionStatus==1 ? 'Deleted' : ''}}</td>
                        <td>{{ $order->created_at}}</td>
                        <td>
                            <a href="{{ route('sales.show',$order->id) }}" class="btn btn-info" title="View"><span class="glyphicon glyphicon-zoom-in"></span>
                            </a>
                            @can('product-order-edit')
                            @if($order->due>0)
                            <a href="{{ route('sales.edit',$order->id) }}" class="btn btn-success" title="Pay">
                             <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            @endif
                            @endcan
                            @can('product-order-delete')
                            <form action="{{ route('sales.destroy',$order->id) }}" method="POST">
                            @csrf

                            @method('DELETE')

                            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
                            </form>
                            @endcan
                    </tr>
                    @endforeach
                     
                </tbody>
            </table>
            <div class="row">
                <!-- this is for default links -->
            <!-- {!! $orders->links() !!} -->
            </div>
            <div class="col-md-12">
                <div class="col-md-4">
                        
                </div>
                <div class="col-md-4">
                        
                </div>
                
                <div class="col-md-4 ">
                        {{ $orders->links('vendor.pagination.custom')}}
                </div>
            </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection

