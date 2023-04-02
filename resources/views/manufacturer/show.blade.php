@extends('layouts.app')

@section('title','Cutomer Info')

@section('mainContent')
<div class="box box-info">
   <section class="content-header">
        <h1>
        Cutomer Information
            <small>Preview</small>
            <a href="{{route('customers.edit',$customer->id)}}" class="btn btn-success" title="Edit"><span class="glyphicon glyphicon-edit"></a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Cutomer</a></li>
            <li class="active">Cutomer Info</li>
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
                                    <th>Cutomer Name</th>
                                    <th>{{ $customer->name }}</th>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <th>{{ $customer->phoneNumber }}</th>
                                </tr>
                                <tr>
                                    <th>projectId</th>
                                    <th>{{ $customer->projectId }}</th>
                                </tr>
                                <tr>
                                    <th>Customer Address</th>
                                    <th>{{ $customer->address }}</th>
                                </tr>
                                <tr>
                                    <th>Publication Status</th>
                                    <th>{{ $customer->publicationStatus==1 ? "Published":"Un-published"}}</th>
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
        <a href="{{route('customers.index')}}" class="center-block btn btn-default" id="sendEmail">
        <i class="fa fa-arrow-circle-left"></i> Back</a>
    </div>
</div>

@endsection

