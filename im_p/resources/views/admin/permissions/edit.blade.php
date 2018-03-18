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
                                      <h1><i class='fa fa-key'></i> Edit {{$permission->name}}</h1>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div ng-app="emp_leave" ng-controller="form-validation">
                                    <div class='col-lg-4 col-lg-offset-4'>
                                        <br>
                                        {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

                                        <div class="form-group">
                                            {{ Form::label('name', 'Permission Name') }}
                                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                                        </div>
                                        <br>
                                        {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

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
</div>
<script type="text/javascript" src="{{url('assets/app/controllers/validation.js')}}"></script>
@endsection
