@extends('layouts.app')


@section('mainContent')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Users Management</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>

        </div>

    </div>

</div>


@if ($message = Session::get('success'))

<div class="alert alert-success">

  <p>{{ $message }}</p>

</div>

@endif


<table class="table table-bordered">

 <tr>

   <th>No</th>

   <th>Name</th>

   <th>Email</th>

   <th>Roles</th>
   <th>Projects</th>

   <th width="280px">Action</th>

 </tr>

 @foreach ($usersWithProjects as $key => $userWithProjects)

  <tr>

    <td>{{ $userWithProjects['user']->id }}</td>

    <td>{{ $userWithProjects['user']->name }}</td>

    <td>{{ $userWithProjects['user']->email }}</td>

    <td>

      @if(!empty($userWithProjects['user']->getRoleNames()))

        @foreach($userWithProjects['user']->getRoleNames() as $v)

           <label class="badge badge-success">{{ $v }}</label>

        @endforeach

      @endif

    </td>
    <td>
    @if(count($userWithProjects['projects']) > 0)
            @foreach ($userWithProjects['projects'] as $projectName)
                <label class="badge badge-success">{{ $projectName }}</label>
            @endforeach
    @else
    <label class="badge badge-success">No Project</label>
    @endif

    </td>

    <td>

       <a class="btn btn-info" href="{{ route('users.show',$userWithProjects['user']->id) }}">Show</a>

       <a class="btn btn-primary" href="{{ route('users.edit',$userWithProjects['user']->id) }}">Edit</a>

        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $userWithProjects['user']->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

        {!! Form::close() !!}

    </td>

  </tr>

 @endforeach

</table>

{{ $users->links('vendor.pagination.custom')}}

@endsection