@extends('layouts.app')

@section('title','View-Product')

@section('mainContent')
<div class="box box-info">
   <section class="content-header">
        <h1>
            Product Information
            <small>Preview</small>
            <a href="{{route('sales.edit',$order->id)}}" class="btn btn-success" title="Edit"><span class="glyphicon glyphicon-edit"></a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Order</a></li>
            <li class="active">Order Details</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">

                <div class="box box-danger">
                    <div class="box-body">
                        <table class="table table-bordered " width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th>Product Name</th>
                                    <th>{{ $order->productName }}</th>
                                </tr>
                                <tr>
                                    <th>Product Name</th>
                                    <th>{{ $order->productDetails }}</th>
                                </tr>
                                <tr>
                                    <th>Code</th>
                                    <th>{{ $order->productCode }}</th>
                                </tr>
                                <tr>
                                    <th>Category Name</th>
                                    <th>{{ $order->customerName }}</th>
                                </tr>
                                <tr>
                                    <th>Category Name</th>
                                    <th>{{ $order->customerDetails }}</th>
                                </tr>
                                <tr>
                                    <th>Manufacturer Name</th>
                                    <th>{{ $order->CustomersContact }}</th>
                                </tr>
                                <tr>
                                    <th>Product Quantity</th>
                                    <th>{{ $order->unit }}</th>
                                </tr>
                                <tr>
                                    <th>Purchase Price </th>
                                    <th>{{ $order->payable }}</th>
                                </tr>
                                <tr>
                                    <th>Sales Price </th>
                                    <th>{{ $order->paid }}</th>
                                </tr>
                                <tr>
                                    <th>Product Description</th>
                                    <th>{{ $order->due }}</th>
                                </tr>
                                <tr>
                                    <th>Publication Status</th>
                                    <th>{{ $order->note}}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.col (left) -->
            
        </div>
    </section>
    <div class="box-footer clearfix">
        <a href="{{route('sales.index')}}" class="center-block btn btn-default" id="sendEmail">
        <i class="fa fa-arrow-circle-left"></i> Back</a>
    </div>
</div>

@endsection

