@extends('layouts.app')

@section('title','View-Product')

@section('mainContent')
<div class="box box-info">
   <section class="content-header">
        <h1>
            Product Information
            <small>Preview</small>
            <a href="{{route('payment.edit',$paymentInfo->id)}}" class="btn btn-success" title="Edit"><span class="glyphicon glyphicon-edit"></a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Payment</a></li>
            <li class="active">Payment Details</li>
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
                                    <th>{{ $paymentInfo->productName }}</th>
                                </tr>
                                
                                <tr>
                                    <th>Customer Name</th>
                                    <th>{{ $paymentInfo->customerName }}</th>
                                </tr>
                                <tr>
                                    <th>Contact Number</th>
                                    <th>{{ $paymentInfo->phoneNumber }}</th>
                                </tr>
                                <tr>
                                    <th>Payment Method</th>
                                    <th>{{ $paymentInfo->methodName }}</th>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <th>{{ $paymentInfo->amount }}</th>
                                </tr>
                                <tr>
                                    <th>Reference</th>
                                    <th>{{ $paymentInfo->reference }}</th>
                                </tr>
                                <tr>
                                    <th>Note </th>
                                    <th>{{ $paymentInfo->note }}</th>
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

