@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('body.class', 'site-menubar-fold site-menubar-keep')

@section('content')
    <div class="row">

        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="icon wb-users" aria-hidden="true"></i> Customers
                    </h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group list-group-dividered list-group-full">

                        @foreach(\App\Models\Attendee::all() as $attendee)
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="media-body">
                                        <div class="float-right">
                                            <small>{{ $attendee->created_at }}</small>
                                        </div>
                                        <div><a class="name" href="javascript:void(0)">{{ $attendee->name }}</a></div>
                                        <small>{{ $attendee->email }}</small>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="icon wb-calendar" aria-hidden="true"></i> Events
                    </h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group list-group-dividered list-group-full">

                        @foreach(\App\Models\Event::paginate(10) as $event)
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="pr-20">
                                        <a class="avatar @if($event->status)
                                                avatar-online
                                                @else
                                                avatar-away
                                                @endif" href="javascript:void(0)">
                                            <img src="/images/small-images/{{ $event->small_image }}" alt="">
                                            <i></i>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="float-right">
                                            <a href="{{ action('EventController@edit', ['id' => $event->id]) }}" class="btn btn-outline btn-default btn-sm">Edit</a>
                                        </div>
                                        <div><a class="name" href="javascript:void(0)">{{ $event->title }}</a></div>
                                        <small>{{ Acikgise\Helpers\Helpers::getTurkishTime($event->start_date) }}</small>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>

        </div>

    </div>
@stop