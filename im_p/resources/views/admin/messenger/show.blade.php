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
                                     <h1><i class='fa fa-envelope'></i> Reading Message</h1>
                                </div>
                            </div>
                            <div class="container portlet-body form">
                                 <div class="col-md-6">
                                <h1>{!! $thread->subject !!}</h1>

                                <div id="thread_{{$thread->id}}">
                                    @foreach($thread->messages()->latest()->get() as $message)
                                        @include('admin.messenger.html_message', $message)
                                    @endforeach
                                </div>

                                <h2>Add a new message</h2>
                                {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
                                <!-- Message Form Input -->
                                <div class="form-group">
                                    {!! Form::textarea('message', null, ['class' => 'form-control','required']) !!}
                                </div>

                               <!--  @if($users->count() > 0)
                                <div class="checkbox">
                                    @foreach($users as $user)
                                        <label title="{{ $user->first_name }} {{ $user->last_name }}"><input type="checkbox" name="recipients[]" value="{{ $user->id }}">{{ $user->first_name }}</label>
                                    @endforeach
                                </div>
                                @endif -->
                                @if($users->count() > 0)
                                <div class="mt-checkbox-inline">
                                    @foreach($users as $user)
                                    <label class="mt-checkbox">
                                        <input type="checkbox" id="inlineCheckbox1" name="recipients[]" value="{{ $user->id }}"> {{ $user->name }}
                                        <span></span>
                                    </label>
                                    @endforeach
                                </div>
                                @endif

                                <!-- Submit Form Input -->
                                <div class="form-group">
                                    {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                                </div>
                                {!! Form::close() !!}
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
