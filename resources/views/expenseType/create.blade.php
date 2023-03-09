@extends('layouts.app')

@section('title','New-Expense')

@section('mainContent')
<div class="box box-info">
    <div class="box-header">
        <div class="center-block" style="text-align: center">
            <i class="fa fa-cart-plus"></i>
            <h3 class="box-title">New Expense</h3>
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
    <form action="{{ route('expenseType.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <section class="content-header">
        <h1>
            Customer Information
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Expense</a></li>
            <li class="active">New</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">

                <div class="box box-danger">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Expense Name:</label>

                            <div class="input-group col-sm-6">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}} </span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Details:</label>
                            
                            <div class="input-group">
                                <div class="form-group" style=" margin-top: 5px;">
                                    <textarea class="textarea " name="details" value="{{ old('details') }}" placeholder="Expense details"
                                        style="width: 100%;height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('details') }}
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
                                <select class=" form-control select2" name="projectId">
                                            <option value="0"> --- Select Project --- </option>
                                            <option value="1">Master Project</option>
                                        </select>
                                <span class="text-danger">{{ $errors->has('projectId') ? $errors->first('projectId') : ''}} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Publication Status:</label>

                            <div class="input-group col-sm-6">
                                <div class="input-group-addon">
                                    <i class="fa fa-gg"></i>
                                </div>
                                <select class="form-control select2" name="publicationStatus">
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

