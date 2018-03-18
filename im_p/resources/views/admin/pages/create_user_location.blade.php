@extends('admin.layouts.app')
@section('content')
<div class="page-content">
    <div class="row">
    <div class="col-md-12">
        <div class="tabbable-line boxless tabbable-reversed">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab_0" data-toggle="tab"> Users Location Event Management System</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_0">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-user"></i> Add User Location Report</div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <div ng-app="emp_leave" ng-controller="form-validation">
                             <form name="employee-leave"   action="{{route('user-location.store')}}" class="form-horizontal" method="post" >
                             {{csrf_field()}}
                             <div class="col-md-offset-1 col-md-10">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group  {{$errors->has('form_title') ? 'has-error' : ''}}">
                                           <label>Form Title</label>
                                           <input type="text" name="form_title" class="form-control" placeholder="write form title" value="{{old('form_title')}}">
                                           @if($errors->has('form_title'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('form_title') }}</strong>
                                            </span>
                                           @endif
                                        </div>
                                        <div class="form-group">
                                           <label>Note or Information about form</label>
                                          <textarea class="form-control" name="note_of_location" placeholder="note about form">{{old('note_of_location')}}</textarea>  
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-green green" ng-click="ValidateForm()">Save and Continue</button>
                                            <button type="button" class="btn grey-salsa btn-outline">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
