@extends('layouts.app')

@section('title','New-Order')

@section('mainContent')
<div class="box box-info">
    <div class="box-header">
        <div class="center-block" style="text-align: center">
            <i class="fa fa-cart-plus"></i>
            <h3 class="box-title">Export Order By Range</h3>
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
    <form action="{{ route('sales.export') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <section class="content-header">
        <h1>
            Order Information
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Order</a></li>
            <li class="active">Export Order</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-body">
                    <div class="form-group">
                            <label>Start Date:</label>

                            <div class="input-group date col-sm-8">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-left" name="startDate" id="datepicker">
                            <span class="text-danger">{{ $errors->has('startDate') ? $errors->first('startDate') : ''}} </span>
                            </div>
                            <!-- /.input group -->
                        </div>
                        
                        <div class="form-group">
                            <label>End Date:</label>

                            <div class="input-group date col-sm-8">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-left" name="endDate" id="datepicker2">
                            <span class="text-danger">{{ $errors->has('endDate') ? $errors->first('endDate') : ''}} </span>
                            </div>
                            <!-- /.input group -->
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- /.col (left) -->
            
            
        </div>
        
    </section>
    <div class="box-footer clearfix">
        <button type="submit" class="center-block btn btn-default" id="sendEmail">Download
            <i class="fa fa-arrow-circle-right"></i></button>
    </div>
    {!! Form::close() !!}
</div>

@endsection
@section('myscripts')

<script type="text/javascript">
    $('#datepicker').datepicker({
        autoclose: true,
    });

    $('#datepicker2').datepicker({
        autoclose: true,
    })

</script>
@endsection

