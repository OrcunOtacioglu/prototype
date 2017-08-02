@extends('frontend.layout')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
@stop

@section('title')
    {{ $event->title }}
@stop

@section('content')
    <div class="coverPhoto">
        <div class="coverPhotoContainer" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('/images/cover-images/{{$event->cover_image}}');">
            <div class="coverPhotoImage" style="background-image: linear-gradient(rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.15) 70%, rgba(0, 0, 0, 0.8) 100%), url('/images/cover-images/{{$event->cover_image}}'), linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5));">
                <div class="coverTitle">
                    <h2 class="eventOrganizer">{{ $event->account->name }}</h2>
                    <h1 class="eventTitle">{{ $event->title }}</h1>
                    <div class="eventLocation">{{ $event->location }}</div>
                    <div class="eventDate">{{ $event->start_date }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="padding-top: 30px;">
            <div class="col-md-8">
                <p>{{ $event->description }}</p>
                <hr>
                <div class="text-left">
                    <h3>Organizer</h3>
                    <p style="margin: 0;">
                        <a href="{{ action('AccountController@organizer', ['id' => $event->account->id]) }}">{{ $event->account->name }}</a>
                    </p>
                    <small>{{ substr($event->account->about, 0, 160) }}...</small>
                </div>
            </div>
            <div class="col-md-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($event->ticketTypes as $ticketType)
                            <tr>
                                <td>{{ $ticketType->name }}</td>
                                <td>{{ $ticketType->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#tickets">Select Your Ticket</button>
            </div>
        </div>
        @include('frontend.ticketType.show')
    </div>
@stop