@extends('layouts.app')

@section('title','Edit-Expense')

@section('mainContent')
<div class="box box-info">
    <div class="box-header">
        <div class="center-block" style="text-align: center">
            <i class="fa fa-cart-plus"></i>
            <h3 class="box-title">Edit Expense</h3>
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
    <form action="{{ route('expense.update', $expenseById->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <section class="content-header">
        <h1>
            Expense Information
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Expense</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">

                <div class="box box-danger">
                    <div class="box-body">
                    <div class="form-group">
                            <label>Expense Type:</label>
                            <div class="input-group col-sm-6">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <select class=" form-control select2" name="type" id="type">
                                            <option value="0"> --- Select Type --- </option>
                                            @foreach($extypes as $extype)
                                            <option value="{{ $extype->id }}">{{ $extype->name }}</option>
                                            @endforeach
                                        </select>
                                <span class="text-danger">{{ $errors->has('type') ? $errors->first('type') : ''}} </span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Details:</label>
                            
                            <div class="input-group">
                                <div class="form-group" style=" margin-top: 5px;">
                                    <textarea class="textarea " name="details"  placeholder="Expense details"
                                        style="width: 100%;height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $expenseById->details }}
                                    </textarea>
                                    <span class="text-danger">{{ $errors->has('details') ? $errors->first('details') : ''}} </span>
                                </div>
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
                                            @foreach($Projects as $p)
                                            <option value="{{ $p->pId }}">{{ $p->pName }}</option>
                                            @endforeach
                                        </select>
                                <span class="text-danger">{{ $errors->has('projectId') ? $errors->first('projectId') : ''}} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Amount:</label>
                            <div class="input-group col-sm-6">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <input type="text" name="amount" class="form-control" value="{{ $expenseById->amount }}">
                                <span class="text-danger">{{ $errors->has('amount') ? $errors->first('amount') : ''}} </span>
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
    document.getElementById('projectId').value = {{ $expenseById->projectId }};
    document.getElementById('type').value = {{ $expenseById->type }};
</script>
@endsection
