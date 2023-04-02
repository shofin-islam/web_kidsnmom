@extends('layouts.app')

@section('title','View-Product')

@section('mainContent')
<div class="box box-info">
   <section class="content-header">
        <h1>
            Product Information
            <small>Preview</small>
            <a href="{{route('products.edit',$products->id)}}" class="btn btn-success" title="Edit"><span class="glyphicon glyphicon-edit"></a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Product</a></li>
            <li class="active">View Product</li>
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
                                    <th>{{ $products->name }}</th>
                                </tr>
                                <tr>
                                    <th>Code</th>
                                    <th>{{ $products->productCode }}</th>
                                </tr>
                                <tr>
                                    <th>Category Name</th>
                                    <th>{{ $products->categoryName }}</th>
                                </tr>
                                <tr>
                                    <th>Manufacturer Name</th>
                                    <th>{{ $products->manufacturerName }}</th>
                                </tr>
                                <tr>
                                    <th>Product Quantity</th>
                                    <th>{{ $products->productQuantity }}</th>
                                </tr>
                                <tr>
                                    <th>Purchase Price </th>
                                    <th>{{ $products->purchasePrice }}</th>
                                </tr>
                                <tr>
                                    <th>Sales Price </th>
                                    <th>{{ $products->salesPrice }}</th>
                                </tr>
                                <tr>
                                    <th>Discount Price </th>
                                    <th>{{ $products->discountPrice }}</th>
                                </tr>
                                <tr>
                                    <th>Total Price </th>
                                    <th>{{ $products->totalAmount }}</th>
                                </tr>
                                <tr>
                                    <th>Due Price </th>
                                    <th>{{ $products->dueAmount }}</th>
                                </tr>
                                <tr>
                                    <th>Project Name </th>
                                    <th>{{ $products->projectName }}</th>
                                </tr>
                                
                                <tr>
                                    <th>Product Description</th>
                                    <th>{!! $products->details !!}</th>
                                </tr>
                                
                                <tr>
                                    <th>Publication Status</th>
                                    <th>{{ $products->publicationStatus==1 ? "Published":"Un-published"}}</th>
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
        <a href="{{route('products.index')}}" class="center-block btn btn-default" id="sendEmail">
        <i class="fa fa-arrow-circle-left"></i> Back</a>
    </div>
</div>

@endsection

