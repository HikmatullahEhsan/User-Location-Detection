@extends('admin.layouts.app')
@section('content')
<div class="page-content">
    <div class="row">
    <div class="col-md-12">
        <div class="tabbable-line boxless tabbable-reversed">
            <ul class="nav nav-tabs">
               <!--  <li class="active">
                    <a href="#tab_0" data-toggle="tab"> Create Employee Contract</a>
                </li> -->
            </ul>
            <div class='col-lg-10 col-lg-offset-1'>
                <h1><i class='fa fa-key'></i> Edit Role: {{$role->name}}</h1>
                <hr>

                {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

                <div class="form-group <?php if($errors->has('name')){echo 'has-error'; } ?>">
                    {{ Form::label('name', 'Role Name') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                    @if($errors->has('name'))
                    <span class="help-block">
                        {{$errors->first('name')}}
                    </span>
                    @endif
                </div>

                <h5><b>Assign Permissions</b></h5>
                @foreach ($permissions as $permission)
                  <div class="col-md-4 form-group">
                      {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                    {{Form::label($permission->name, ucfirst($permission->name)) }}<br>
                  </div>
                    
                @endforeach
                <div class="col-md-12">
                    @if($errors->has('permissions'))
                    <span class="help-block">
                        {{$errors->first('permissions')}}
                    </span>
                    @endif
                </div>
                <br>
                <div class="form-group">
                {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                </div>

                {{ Form::close() }}    
            </div>
            
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="{{url('assets/app/controllers/validation.js')}}"></script>
@endsection
