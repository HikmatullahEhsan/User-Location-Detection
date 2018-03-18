@extends('admin.layouts.app')
@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-md-12">
            <!-- Begin: life time stats -->
            @if(Session('success'))
             <h4 class="alert alert-success"><i class="fa fa-check"></i> {{Session('success')}}</h4>
            @endif
            <div class="portlet light portlet-fit portlet-datatable ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">Users Location Event Management System</span>
                    </div>
                      
                    <div class="actions">

                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <label class="btn btn-transparent grey-salsa btn-outline btn-circle btn-sm active">
                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                            <label class="btn btn-transparent grey-salsa btn-outline btn-circle btn-sm">
                                <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                        </div>
                        <div class="btn-group">
                            <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                                <i class="fa fa-share"></i>
                                <span class="hidden-xs"> Report </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right" id="sample_3_tools">
                                <li>
                                    <a href="javascript:;" data-action="0" class="tool-action">
                                        <i class="icon-printer"></i> Print</a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-action="1" class="tool-action">
                                        <i class="icon-check"></i> Copy</a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-action="2" class="tool-action">
                                        <i class="icon-doc"></i> PDF</a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-action="3" class="tool-action">
                                        <i class="icon-paper-clip"></i> Excel</a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-action="4" class="tool-action">
                                        <i class="icon-cloud-upload"></i> CSV</a>
                                </li>
                                <li class="divider"> </li>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-container">
                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                            <thead>
                                <tr>
                                    <th> User Name</th>
                                    <th> Address </th>
                                    <th> Form Title </th>
                                    <th> IP Address </th>
                                    <th> Date </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users_info as $info)
                                <tr>
                                    <td> {{$info->name}}</td>
                                    <td> {{$info->country}} , {{$info->city}}, {{$info->area}}</td>
                                    <td> {{$info->form_title}}</td>
                                    <td> {{$info->user_ip}}</td>
                                    <td> {{$info->location_date}}</td>
                                    <td>
                                       

                                        <a href="{{url('/view-user-location-information'.'/'.$info->id)}}" class="btn green btn-outline"><i class="fa fa-info"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End: life time stats -->
        </div>
                    </div>
</div>
@endsection