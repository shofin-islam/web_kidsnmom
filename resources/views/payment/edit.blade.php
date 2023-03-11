@extends('layouts.app')

@section('title','Edit-Payment')

@section('mainContent')
<div class="box box-info">
    <div class="box-header">
        <div class="center-block" style="text-align: center">
            <i class="fa fa-cart-plus"></i>
            <h3 class="box-title">Edit Payment</h3>
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
    <form action="{{ route('payment.update',$paymentById->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <section class="content-header">
        <h1>
            Product Information
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Payments</a></li>
            <li class="active">New</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-body">
                    <div class="form-group">
                            <label>Order Seletor:</label>
                            <div class="input-group col-sm-8">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <select class=" form-control select2" name="orderId" id="orderId">
                                            <option value="0"> --- Select Product Name --- </option>
                                            @foreach($orders as $order)
                                            <option value="{{ $order->id }}">{{ $order->id }}_{{ $order->productName }}_{{ $order->customerName }}_{{ $order->due }}</option>
                                            @endforeach
                                        </select>
                                <span class="text-danger">{{ $errors->has('orderId') ? $errors->first('orderId') : ''}} </span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Payment Method:</label>
                            <div class="input-group col-sm-8">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <select class=" form-control select2" name="paymentMethod" id="paymentMethod">
                                            <option value="0"> --- Select Method Name --- </option>
                                            @foreach($methods as $method)
                                            <option value="{{ $method->id }}">{{ $method->methodName }}</option>
                                            @endforeach
                                        </select>
                                <span class="text-danger">{{ $errors->has('paymentMethod') ? $errors->first('paymentMethod') : ''}} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Amount:</label>
                            <div class="input-group col-sm-8">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <input type="number" name="amount" id="amount" class="form-control" value="{{ $paymentById->amount }}">
                                <span class="text-danger">{{ $errors->has('amount') ? $errors->first('amount') : ''}} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Reference Number:</label>
                            <div class="input-group col-sm-8">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <input type="text" name="reference" id="reference" class="form-control" value="{{ $paymentById->reference }}">
                                <span class="text-danger">{{ $errors->has('reference') ? $errors->first('reference') : ''}} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Phone Number:</label>
                            <div class="input-group col-sm-6">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <input type="text" name="phoneNumber" class="form-control" value="{{ $paymentById->phoneNumber }}">
                                <span class="text-danger">{{ $errors->has('phoneNumber') ? $errors->first('phoneNumber') : ''}} </span>
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
                            <label>Order Details:</label>
                            <div class="input-group col-sm-6" id="orderDetails">
                                
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Project:</label>
                            <div class="input-group col-sm-6">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <select class=" form-control select2" name="projectId" id="projectId">
                                            <option value="0"> --- Select Project --- </option>
                                            <option value="1">Master Project</option>
                                        </select>
                                <span class="text-danger">{{ $errors->has('projectId') ? $errors->first('projectId') : ''}} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Note:</label>
                            
                            <div class="input-group">
                                <div class="form-group" style=" margin-top: 5px;">
                                    <textarea class="textarea " name="note" value="{{ $paymentById->note }}" placeholder="Short Note"
                                        style="width: 100%;height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $paymentById->note }}
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

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var dueAmount=0;
    var amountF = $("#amount");

    $("#orderId").on('change',function(e){
        var productId = $("#orderId").val();
        $.ajax({
           type:'POST',
           url:"{{ url('/sales/orderDetails') }}",
           data:{'id': productId, '_token': $('input[name="token"]').val()},
           success:function(data){
            console.log(data);
            dueAmount=data.due;
            $("#orderDetails").html("Order No: "+data.oId+"<br>Name: "+data.pName+"<br>Customer: "+data.cName+"<br>Phone: "+data.cPhoneNumber+"<br>Payable: "+data.payable+"<br>Paid: "+data.paid+"<br>Due: "+data.due);
        }
        });
    });

    amountF.on('change',function(e){
        var amount = amountF.val();
       if(amount>dueAmount){
        alert("Amount is greater than due amount!");
        // amountF.val(0);
       }else{}
    });

    
    document.getElementById('projectId').value = {{ $paymentById->projectId }};
    document.getElementById('orderId').value = {{ $paymentById->orderId }};
    const data = JSON.parse(' {!! $orderDetails !!} ');
    dueAmount=data.due;
    $("#orderDetails").html("Order No: "+data.oId+"<br>Name: "+data.pName+"<br>Customer: "+data.cName+"<br>Phone: "+data.cPhoneNumber+"<br>Payable: "+data.payable+"<br>Paid: "+data.paid+"<br>Due: "+data.due);
    $("#paymentMethod").val({{ $paymentById->paymentMethod }});
</script>
@endsection

