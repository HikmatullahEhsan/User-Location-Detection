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
                                 <h1><i class='fa fa-user-plus'></i> Edit User</h1>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <div class='col-lg-8 col-lg-offset-2'>
                            
                                <hr>

                                {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}

                                <div class="form-group">
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                                    @if($errors->has('name'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    {{ Form::label('email', 'Email') }}
                                    {{ Form::email('email', null, array('class' => 'form-control')) }}
                                    @if($errors->has('email'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                    @endif
                                </div>

                                <h5><b>Give Role</b></h5>

                                <div class='form-group'>
                                    @foreach ($roles as $role)
                                        {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
                                        {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                                    @endforeach
                                </div>

                               

                                <div class="form-group">
                                    {{ Form::label('password', 'Password') }}<br>
                                    {{ Form::password('password', array('class' => 'form-control','placeholder'=>'**********')) }}
                                    @if($errors->has('password'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    {{ Form::label('password', 'Confirm Password') }}<br>
                                    {{ Form::password('password_confirmation', array('class' => 'form-control','placeholder'=>'**********')) }}
                                    @if($errors->has('password_confirmation'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                      </span>
                                    @endif
                                </div>

                                {{ Form::submit('Update', array('class' => 'btn btn-success')) }}

                                {{ Form::close() }}

                            </div>
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
