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
@section('title','Manage Customers')

@section('mainContent')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="pull-left">
                        <a class="btn btn-warning" href="{{ route('customers.create') }}"> New Customer</a>
                    </div>
                    <div class="center-block" style="text-align: center; margin: 3px;padding: 3px;">
                        <i class="fa fa-tasks"></i>
                        <h3 class="box-title">Manage Customers</h3><br>
                        
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
                        <th>Customer ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Project#</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{!! $customer->address !!}</td>
                        <td>{{ $customer->phoneNumber }}</td>
                        <td>{{ $customer->projectName }}</td>
                        <td>{{ $customer->publicationStatus==1 ? 'Published' : "Unpublished" }}</td>
                        <td><a href="{{ route('customers.show',$customer->id) }}" class="btn btn-info" title="View"><span class="glyphicon glyphicon-zoom-in"></span>
                            </a>
                            @can('customer-edit')
                            <a href="{{ route('customers.edit',$customer->id) }}" class="btn btn-success" title="Edit">
                             <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            @endcan
                            <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">
                            @csrf

                            @method('DELETE')

                            @can('customer-delete')

                            <button type="submit" class="btn btn-danger">Delete</button>

                            @endcan
                            </form>
                    </tr>
                    @endforeach
                     
                </tbody>
            </table>
            <div class="row">
                <!-- this is for default links -->
            <!-- {!! $customers->links() !!} -->
            </div>
            <div class="col-md-12">
                <div class="col-md-4">
                        
                </div>
                <div class="col-md-4">
                        
                </div>
                
                <div class="col-md-4 ">
                        {{ $customers->links('vendor.pagination.custom')}}
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

