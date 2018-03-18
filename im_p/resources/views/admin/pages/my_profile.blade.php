@extends('admin.layouts.app')
@section('content')
<div class="page-content">
    <div class="row">
    <div class="col-md-12">
        <div class="tabbable-line boxless tabbable-reversed">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab_0" data-toggle="tab"> Update my profile</a>
                </li>
            </ul>

            
        </div>
        <br>
        <div class="col-md-12" style="background-color: #ffffff;">
          <br />
          @if(Session('success'))
          <h4 class="alert alert-success">{{Session('success')}}</h4>
          @endif
          <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{url('update-user-info')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Full Name<span class="">*</span>
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" id="first-name"  class="form-control col-md-7 col-xs-12" placeholder="Full Name" name="name" value="{{old('name') ? old('name'): Auth::user()->name}}" disabled>
                @if($errors->has('name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="">*</span>
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" id="first-name"  class="form-control col-md-7 col-xs-12" placeholder="Email" name="email" value="{{old('email') ? old('email'): Auth::user()->email}}" disabled>
                @if($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <!-- <div class="form-group {{ $errors->has('pre_password') ? 'has-error' : '' }}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Current Password<span class="">*</span>
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="password" id="first-name"  class="form-control col-md-7 col-xs-12" placeholder="*******" name="pre_password" value="" >
                @if($errors->has('pre_password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('pre_password') }}</strong>
                    </span>
                @endif
              </div>
            </div> -->
           <!--  <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">New Password<span class="">*</span>
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="password" id="first-name"  class="form-control col-md-7 col-xs-12" placeholder="*******" name="password"  >
                @if($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group {{ $errors->has('con_password') ? 'has-error' : '' }}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Confirm New Password<span class="">*</span>
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="password" id="first-name"  class="form-control col-md-7 col-xs-12" placeholder="*******" name="con_password"  >
                @if($errors->has('con_password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('con_password') }}</strong>
                    </span>
                @endif
              </div>
            </div> -->
            <div class="form-group {{ $errors->has('user_picture') ? 'has-error' : '' }}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User Picture
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="file" id="first-name"  class="form-control col-md-7 col-xs-12"  name="user_picture"  >
                @if($errors->has('user_picture'))
                    <span class="help-block">
                      <strong>{{ $errors->first('user_picture') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <a href="{{URL::previous()}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                <button type="submit" class="btn btn-success">Update Information <i class="fa fa-info-circle"></i></button>
              </div>
            </div>
          </form>
      </div>
    </div>
</div>
</div>
<script type="text/javascript" src="{{url('assets/app/controllers/validation.js')}}"></script>
@endsection
