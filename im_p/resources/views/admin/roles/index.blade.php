@extends('admin.layouts.app')
@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="col-lg-10 col-lg-offset-1">
                <h1><i class="fa fa-key"></i> Roles
                 <!-- <div class="panel-right"> -->
                @can('create role')
                <a href="{{ URL::to('roles/create') }}" class="btn btn-success">Add Role</a>
                @endcan
                <!-- </div> -->
                <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
                <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a></h1>
                <hr>
                @if(Session('success'))
                <h4 class="alert alert-success"><i class="fa fa-checks"></i> {{Session('success')}}</h4>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered table-striped"  id="sample_3">
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th>Permissions</th>
                                <th>Operation</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($roles as $role)
                            <tr>

                                <td>{{ $role->name }}</td>

                                <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                                <td>
                                @can('edit role')
                                <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                                @endcan
                                @can('delete role')

                                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
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
</div>
<script type="text/javascript" src="{{url('assets/app/controllers/validation.js')}}"></script>
@endsection
