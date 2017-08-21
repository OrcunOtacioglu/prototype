@extends('frontend.layout')

@section('title')
    {{ $organizer->name }}
@stop

@section('content')
    <div class="coverPhoto">
        <div class="coverPhotoContainer" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('/images/profile-images/blur.jpeg');">
            <div class="coverPhotoImage" style="background-image: linear-gradient(rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.15) 70%, rgba(0, 0, 0, 0.8) 100%), url('/images/profile-images/acikgise.png'), linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5));">
                <div class="coverTitle">
                    <h2 class="eventOrganizer">{{ $organizer->name }}</h2>
                    <h1 class="eventTitle">{{ $organizer->website }}</h1>
                    <div class="eventLocation">{{ $organizer->city }}</div>
                    <div class="eventDate">{{ $organizer->phone }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="padding-top: 30px;">
            <div class="col-md-8">
                <h1 class="page-title">Organizatör Hakkında</h1>
                <p>{{ $organizer->about }}</p>
                <hr>
            </div>
            <div class="col-md-4">
                <h2>Etkinlikler</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Etkinlik Adı</th>
                            <th>Mekan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($organizer->events as $event)
                            <tr>
                                <td>
                                    <a href="{{ action('EventController@show', ['slug' => $event->slug]) }}">{{ $event->title }}</a>
                                </td>
                                <td>
                                    {{ $event->location }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop