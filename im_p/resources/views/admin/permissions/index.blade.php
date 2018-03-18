@extends('admin.layouts.app')
@section('content')
<div class="page-content">
    <div class="row">
    <div class="col-md-12">
        <div class="tabbable-line boxless tabbable-reversed">
            <ul class="nav nav-tabs">
            </ul>
            <div class="tab-content">
                <div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-key"></i>Available Permissions
    @can('create permission')
    <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>
    @endcan
    <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
    <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a></h1>
    <hr>
    @if(Session('success'))
      <h4 class="alert alert-success"><i class="fa fa-checks"></i> {{Session('success')}}</h4>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-striped " id="sample_3">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{ $permission->name }}</td> 
                    <td align="center">
                    @can('edit permission')
                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" >Edit</a>
                    @endcan
                    @can('delete permission')
                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger','data-original-title'=>'Are you sure?','data-toggle'=>'confirmation']) !!}
                    {!! Form::close() !!}
                    @endcan
                    </td>
                </tr>
                <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="{{url('assets/app/controllers/validation.js')}}"></script>
@endsection
