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
                                <i class="fa fa-user"></i> View User Location Report</div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <div ng-app="emp_leave" ng-controller="form-validation">
                             <table class="table table-bordered table-striped">
                                 <tr>
                                     <th>User Name</th>
                                     <td>{{$info->name}}</td>
                                     <th>Location</th>
                                     <td colspan="3">{{$info->country}},{{$info->city}},{{$info->area}}</td>
                                     
                                    
                                 </tr>
                                 <tr>
                                     <th>Geo Point</th>
                                     <td>Latitude: {{$info->latitude}} Longitude: {{$info->longitude}}</td>
                                     <th>Happen Date</th>
                                     <td>{{$info->location_date}}</td>
                                     <th>User IP</th>
                                     <td>{{$info->user_ip}}</td>
                                 </tr>
                                 <tr>
                                     <th>Explanation</th>
                                     <td cols="5">{{$info->note_of_location}}</td>
                                 </tr>
                             </table>
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
