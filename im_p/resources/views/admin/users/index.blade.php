@extends('admin.layouts.app')
@section('content')
<div class="page-content">
    <div class="row">
    <div class="col-lg-12">
    <div class="panel-right">
       @can('create user')
       <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>
       @endcan
    </div>
    <h1><i class="fa fa-users"></i> User Administration <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
    <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a></h1>
    <hr>
    @if(Session('success'))
    <h4 class="alert alert-success"><i class="fa fa-checks"></i> {{Session('success')}}</h4>
    @endif
    <div class="table-responsive">
        <table class="table  table-striped"  id="sample_3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Date/Time Added</th>
                    <th>User Roles</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->department_name}}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td>
                    @can('edit user')
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                    @endcan
                    @can('delete user')

                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger','data-original-title'=>'Are you sure?','data-toggle'=>'confirmation']) !!}
                    {!! Form::close() !!}
                    @endcan

               

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
       
    </div>
</div>
<script type="text/javascript" src="{{url('assets/app/controllers/validation.js')}}"></script>
@endsection
