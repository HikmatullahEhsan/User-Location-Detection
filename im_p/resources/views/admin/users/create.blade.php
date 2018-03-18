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
            <div class="tab-content">
                <div class="tab-pane active" id="tab_0">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                 <h1><i class='fa fa-user-plus'></i> Add User</h1>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <div ng-app="emp_leave" ng-controller="form-validation">
                               <div class='col-lg-8 col-lg-offset-2'>
                                <hr>


                                {{ Form::open(array('url' => 'users')) }}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} ">
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name', '', array('class' => 'form-control','placeholder'=>'name of user','value'=>old('name'))) }}
                                    @if($errors->has('name'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                    @endif
                                </div>

                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    {{ Form::label('email', 'Email') }}
                                    {{ Form::email('email', '', array('class' => 'form-control', 'placeholder'=>'email of user')) }}
                                    @if($errors->has('email'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                    @endif
                                </div>

                                @foreach ($roles as $role)
                                  <div class="col-lg-4 form-group ">
                                    {{ Form::checkbox('roles[]',  $role->id ) }}
                                    {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                                  </div>
                                @endforeach
                                </br>
                               

                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    {{ Form::label('password', 'Password') }}<br>
                                    {{ Form::password('password', array('class' => 'form-control', 'placeholder'=>'**********')) }}
                                    @if($errors->has('password'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                    @endif

                                </div>
                                <br>

                                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                    {{ Form::label('password', 'Confirm Password') }}<br>
                                    {{ Form::password('password_confirmation', array('class' => 'form-control','placeholder'=>'**********')) }}
                                    @if($errors->has('title'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                      </span>
                                    @endif
                                </div>

                                {{ Form::submit('Register User', array('class' => 'btn btn-primary')) }}

                                {{ Form::close() }}
                            </div>
                            <!-- END FORM-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="{{url('assets/app/controllers/validation.js')}}"></script>
@endsection
