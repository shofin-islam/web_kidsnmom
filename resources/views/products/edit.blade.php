@extends('layouts.app')

@section('title','Edit-Product')

@section('mainContent')
<div class="box box-info">
    <div class="box-header">
        <div class="center-block" style="text-align: center">
            <i class="fa fa-cart-plus"></i>

            <h3 class="box-title">Create Product</h3>
            @if (session()->has('success'))
            <div class="alert alert-success" style="margin: 5px;">
                {{ session('success') }}
            </div>
            @endif
        </div>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                    title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
        <!-- /. tools -->
    </div>
    
    <form action="{{ route('products.update',$product->pid) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <section class="content-header">
        <h1>
            Product Information
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Product</a></li>
            <li class="active">New Product</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
            {{$product->pid}} {{$product->name}}
                <div class="box box-danger">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Product Name:</label>

                            <div class="input-group col-sm-6">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}} </span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Product Code:</label>

                            <div class="input-group col-sm-6">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <input type="text" name="productCode" class="form-control" value="{{ $product->productCode }}">
                                <span class="text-danger">{{ $errors->has('productCode') ? $errors->first('productCode') : ''}} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Purchase Price:</label>

                            <div class="input-group col-sm-6">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <input type="number" name="purchasePrice" class="form-control" value="{{ $product->purchasePrice }}">
                                <span class="text-danger">{{ $errors->has('purchasePrice') ? $errors->first('purchasePrice') : ''}} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Product Price:</label>

                            <div class="input-group col-sm-6">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <input type="number" name="salesPrice" class="form-control" value="{{ $product->salesPrice }}">
                                <span class="text-danger">{{ $errors->has('salesPrice') ? $errors->first('salesPrice') : ''}} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Product Quantity:</label>

                            <div class="input-group col-sm-6">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <input type="number" name="productQuantity" class="form-control" value="{{ $product->productQuantity }}">
                                <span class="text-danger">{{ $errors->has('productQuantity') ? $errors->first('productQuantity') : ''}} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Total Amount:</label>
                            <div class="input-group col-sm-6">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <input type="number" name="totalAmount" class="form-control" value="{{ $product->totalAmount }}">
                                <span class="text-danger">{{ $errors->has('totalAmount') ? $errors->first('totalAmount') : ''}} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Due Amount:</label>
                            <div class="input-group col-sm-6">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <input type="number" name="dueAmount" class="form-control" value="{{ $product->dueAmount }}">
                                <span class="text-danger">{{ $errors->has('dueAmount') ? $errors->first('dueAmount') : ''}} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Product Description:</label> {{ $product->details }}
                            <div class="input-group">
                                <div class="form-group" style=" margin-top: 5px;">
                                    <textarea class="textarea" name="details" placeholder="Product Short Description"
                                        style="width: 100%;height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {{ $product->details }}
                                    </textarea>
                                    <span class="text-danger">{{ $errors->has('details') ? $errors->first('details') : ''}} </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Category Name:</label>

                            <div class="input-group col-sm-6">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <select class=" form-control select2" name="categoryId" id="categoryId">
                                            <option value="0"> --- Select Category Name --- </option>
                                            @foreach($categorys as $category)
                                            <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                                            @endforeach
                                        </select>
                                <span class="text-danger">{{ $errors->has('categoryId') ? $errors->first('categoryId') : ''}} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Manufacturer Name:</label>

                            <div class="input-group col-sm-6">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                    <select class="form-control select2" name="manufacturerId" id="manufacturerId">
                                            <option value="0"> --- Select Manufacturer Name --- </option>
                                            @foreach($manufacturers as $manufacturer)
                                            <option value="{{ $manufacturer->id }}"> {{ $manufacturer->id }} {{ $manufacturer->manufacturerName }}</option>
                                            @endforeach
                                    </select>
                                <span class="text-danger">{{ $errors->has('manufacturerId') ? $errors->first('manufacturerId') : ''}} </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Publication Status:</label>

                            <div class="input-group col-sm-6">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <select class="form-control select2" name="publicationStatus" id="publicationStatus">
                                    <option value="0"> --- Select Publication Status --- </option>
                                    <option value="1">Published</option>
                                    <option value="2">Unpublished</option>
                                </select>
                                <span class="text-danger">{{ $errors->has('publicationStatus') ? $errors->first('publicationStatus') : ''}} </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col (left) -->
            
        </div>
        
    </section>
    <div class="box-footer clearfix">
        <button type="submit" class="center-block btn btn-default" id="sendEmail">ADD
            <i class="fa fa-arrow-circle-right"></i></button>
    </div>
    {!! Form::close() !!}
</div>

@endsection
@section('myscripts')

<script>
    
    document.getElementById('categoryId').value = {{ $product->categoryId }};
    document.getElementById('manufacturerId').value = {{ $product->manufacturerId }};
    document.getElementById('publicationStatus').value = {{ $product->publicationStatus }};
</script>
@endsection
