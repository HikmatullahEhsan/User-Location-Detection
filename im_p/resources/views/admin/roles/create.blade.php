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

    <h1><i class='fa fa-key'></i> Add Role</h1>
    <hr>

    {{ Form::open(array('url' => 'roles')) }}

    <div class="form-group <?php if($errors->has('name')){ echo 'has-error'; } ?>">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
        @if($errors->has('name'))
        <span class="text text-danger">{{$errors->first('name')}}</span>
        @endif
    </div>

    <h5><b>Assign Permissions</b></h5>

        @foreach ($permissions as $permission)
             <div class=' col-md-4 form-group'>
                {{ Form::checkbox('permissions[]',  $permission->id ) }}
                {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>
            </div>
        @endforeach
    <div class="form-group col-md-12">
         <br>
        @if($errors->has('permissions'))
        <span class="text text-danger">{{$errors->first('permissions')}}</span>
        @endif
    </div>
    <br>
    <div class="col-md-12">
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}
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
