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
                                     <h1><i class='fa fa-envelope'></i> Recived Messages</h1>
                                </div>
                            </div>
                            <div class="container portlet-body form">
                                <div class="container">
                                    @if (Session::has('error_message'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ Session::get('error_message') }}
                                        </div>
                                    @endif
                                    @if($threads->count() > 0)
                                        @foreach($threads as $thread)
                                        <?php $class = $thread->isUnread(@$currentUserId) ? 'alert-info' : ''; ?>
                                        <div id="thread_list_{{$thread->id}}" class="media alert {{ $class }}">
                                            <h4 class="media-heading">{!! link_to('messages/' . $thread->id, $thread->subject) !!}</h4>
                                            <p id="thread_list_{{$thread->id}}_text">{{ $thread->latestMessage->body }}</p>
                                            <p><small><strong>Creator:</strong> {{ $thread->creator()->name }}</small></p>
                                            <p><small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id(), ['name']) }}</small></p>
                                        </div>
                                        @endforeach
                                    @else
                                        <p>Sorry, There is no any recived message.</p>
                                    @endif
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
