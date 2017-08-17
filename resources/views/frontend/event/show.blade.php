@extends('frontend.layout')

@section('custom.meta')
    <meta name="eventID" content="{{ $event->id }}">
@stop

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
        <div class="row" style="background: #fff;">
            <div class="col-md-8">

                <h3>Etkinlik Detayı</h3>
                <p>{{ $event->description }}</p>
                <hr>

                <ticket-select></ticket-select>

            </div>

            <div class="col-md-4">

                <h3>Organizatör</h3>
                <p style="margin: 0;">
                    <a href="{{ action('AccountController@organizer', ['id' => $event->account->id]) }}">{{ $event->account->name }}</a>
                </p>
                <small>{{ substr($event->account->about, 0, 160) }}...</small>

                <hr>

                <shopping-cart></shopping-cart>
            </div>
        </div>
        @include('frontend.ticketType.show')
    </div>
@stop

@section('footer.scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@stop