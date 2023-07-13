@extends('layouts.app')

@section('title','New-Order')

@section('mainContent')
<div class="box box-info">
    <div class="box-header">
        <div class="center-block" style="text-align: center">
            <i class="fa fa-cart-plus"></i>
            <h3 class="box-title">New Order</h3>
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
    <form action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <section class="content-header">
        <h1>
            Order Information
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Order</a></li>
            <li class="active">New Order</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-body">
                    <div class="form-group">
                            <label>Product Name:</label>
                            <div class="input-group col-sm-8">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <select class=" form-control select2" name="productId" id="productId">
                                            <option value="0"> --- Select Product Name --- </option>
                                            @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                <span class="text-danger">{{ $errors->has('productId') ? $errors->first('productId') : ''}} </span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Customer Name:</label>
                            <div class="input-group col-sm-8">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <select class=" form-control select2" name="customerId" id="customerId">
                                            <option value="0"> --- Select Customer Name --- </option>
                                            @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                <span class="text-danger">{{ $errors->has('customerId') ? $errors->first('customerId') : ''}} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Custom Price:</label>
                            <div class="input-group col-sm-8">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <input type="number" name="customPrice" id="custom_price" class="form-control" value="{{ old('customPrice') }}">
                                <span class="text-danger">{{ $errors->has('customPrice') ? $errors->first('customPrice') : ''}} </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Unit:</label>
                            <div class="input-group col-sm-8">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <input type="number" name="unit" id="unit" class="form-control" value="{{ old('unit') }}">
                                <span class="text-danger">{{ $errors->has('unit') ? $errors->first('unit') : ''}} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Subtotal:</label>

                            <div class="input-group col-sm-8">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <input type="number" name="subTotal" id="subTotal" class="form-control" value="{{ old('subTotal') }}">
                                <span class="text-danger">{{ $errors->has('subTotal') ? $errors->first('subTotal') : ''}} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Flat Discount:</label>

                            <div class="input-group col-sm-8">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <input type="number" name="flatDiscount" id="flatDiscount" class="form-control" value="{{ old('flatDiscount') }}">
                                <span class="text-danger">{{ $errors->has('flatDiscount') ? $errors->first('flatDiscount') : ''}} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Payable:</label>

                            <div class="input-group col-sm-8">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <input type="number" name="payable" id="payable" class="form-control" value="{{ old('payable') }}">
                                <span class="text-danger">{{ $errors->has('payable') ? $errors->first('payable') : ''}} </span>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                </div>
            </div>
            <!-- /.col (left) -->
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-body">
                        
                        <div class="form-group">
                            <label>Product Details:</label>
                            <div class="input-group col-sm-8" id="productDetails">
                                
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Customer Details:</label>
                            <div class="input-group col-sm-8" id="customerDetails">
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Payment methods:</label>
                            <div class="input-group col-sm-8">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <select class=" form-control select2" name="methodId" id="methodId">
                                            <option value="0"> --- Select Payment Method --- </option>
                                            @foreach($methods as $method)
                                            <option value="{{ $method->id }}">{{ $method->methodName }}</option>
                                            @endforeach
                                        </select>
                                <span class="text-danger">{{ $errors->has('methodId') ? $errors->first('methodId') : ''}} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Paid:</label>

                            <div class="input-group col-sm-8">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <input type="number" name="paid" id="paid" class="form-control" value="{{ old('paid') }}">
                                <span class="text-danger">{{ $errors->has('paid') ? $errors->first('paid') : ''}} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Due:</label>

                            <div class="input-group col-sm-8">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <input type="number" name="due" id="due" class="form-control" value="{{ old('due') }}">
                                <span class="text-danger">{{ $errors->has('due') ? $errors->first('due') : ''}} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Due Date:</label>

                            <div class="input-group date col-sm-8">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-left" name="dueDate" id="datepicker">
                            <span class="text-danger">{{ $errors->has('dueDate') ? $errors->first('dueDate') : ''}} </span>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>Note:</label>
                            
                            <div class="input-group col-md-12">
                                <div class="form-group" style=" margin-top: 5px;">
                                    <textarea class="col-md-8" name="note" value="{{ old('note') }}" placeholder="Short Note"
                                        style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('note') }}
                                    </textarea>
                                    <span class="text-danger">{{ $errors->has('note') ? $errors->first('note') : ''}} </span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
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

<script type="text/javascript">
    $('#datepicker').datepicker({
        autoclose: true,
    })

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        var subTotal = $("#subTotal");
        subTotal.prop('disabled', true);
        var payable = $("#payable");
        payable.prop('disabled',true);
        var unit = $("#unit");
        var flatDiscount = $("#flatDiscount");
        var paid = $("#paid");
        var due = $("#due");
        var custom_price = $("#custom_price");
        due.prop('disabled',true);
        var purchase_price=0;
        var unitPrice= 0;
        var subTotalAmount=0;
        var payableAmount=0;
        var availableUnit=0;

        reset();
        
        unit.on('change',function(e){
            if(unit.val()<=0){
                alert("Invalid Unit!");
                reset();
            }else if(unit.val()>availableUnit){
                alert("Available Unit: "+availableUnit);
                reset();
            }else{
                calculate();
            }
              
        });

        custom_price.on('change',function(e){
            if(custom_price.val()<=0){
                alert("Invalid Custom Price !");
                reset();
            }else if(custom_price.val()<purchase_price){
                alert("Custom price less than purchase price: ");
                reset();
            }else{
                calculate();
            }
              
        });
        flatDiscount.on('change',function(e){
            if(flatDiscount.val()<=0){
                alert("Invalid Discount Amount!");
                reset();
            }else{
                calculate();
            }
        });

        paid.on('change',function(e){
            if(paid.val()<=0){
                alert("Invalid Paid Amount!");
                reset();
            }else{
                calculate();
            }
        });

    $("#productId").on('change',function(e){
        var productId = $("#productId").val();
        $.ajax({
           type:'POST',
           url:"{{ url('/sales/productById') }}",
           data:{'id': productId, '_token': $('input[name="token"]').val()},
           success:function(data){
            console.log(data);
            $("#productDetails").html("Name: "+data[0].name+" / Code: "+data[0].productCode+" / Sale price: "+data[0].salesPrice+" / Product Quantity: "+data[0].productQuantity);
            purchase_price=data[0].purchasePrice;
            availableUnit=data[0].productQuantity;
            reset();
        }
        });
    });

    $("#customerId").on('change',function(e){
        
        var customerId = $("#customerId").val();
        $.ajax({
           type:'POST',
           url:"{{ url('/sales/customerById') }}",
           data:{'id': customerId, '_token': $('input[name="token"]').val()},
           success:function(data){
            console.log(data);
            $("#customerDetails").html(data[0].name+" / "+data[0].address+" / "+data[0].phoneNumber);
           }
        });

    });

    function reset(){
            subTotalAmount=0;
            payableAmount=0;
            unit.val(0);
            flatDiscount.val(0);
            payable.val(0);
            paid.val(0);
            due.val(0);
            subTotal.val(0);
            payable.val(0);
    }

    function calculate(){
            unitPrice=custom_price.val();
            flatDiscountAmount=flatDiscount.val();
            unitValue = unit.val()
            subTotalAmount = unitPrice*unitValue;
            payableAmount = subTotalAmount-flatDiscountAmount;
            paidAmount=paid.val();

            if(unitPrice<=0){
                alert("Invalid Unit Price, Select a product first!");
                reset();
            }
            else if(unitPrice<=purchase_price){
                alert("Custom Price should more than purchase price!");
                reset();
            }
            else if(unitValue<=0){
                alert("Invalid Unit, Check the unit first!");
                reset();
            }
            else if(subTotalAmount<flatDiscountAmount){  
                alert("Discount amount is greater than sub total Amount!");
                reset();
            }else if(payableAmount<paidAmount){  
                alert("Paid amount is greater than payable amount!");
                reset();
            }else{
                subTotal.val(subTotalAmount);
                payable.val(payableAmount);
                due.val(payableAmount-paidAmount);
            }
    }

</script>
@endsection

