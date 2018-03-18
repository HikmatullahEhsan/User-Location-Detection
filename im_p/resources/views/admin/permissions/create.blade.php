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
                                 <h1><i class='fa fa-key'></i> Add Permission</h1>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <div ng-app="emp_leave" ng-controller="form-validation">
                            <div class='col-lg-4 col-lg-offset-4'>

                               
                                <br>

                                {{ Form::open(array('url' => 'permissions')) }}

                                <div class="form-group">
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name', '', array('class' => 'form-control')) }}
                                </div><br>
                                @if(!$roles->isEmpty()) 
                                    <h4>Assign Permission to Roles</h4>

                                    @foreach ($roles as $role) 
                                        {{ Form::checkbox('roles[]',  $role->id ) }}
                                        {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                                    @endforeach
                                @endif
                                <br>
                                {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

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
