@extends('frontend.layout')

@section('title', 'Ticketing Solutions')

@section('content')

    <div class="jumbotron">
        <div class="container">
            <h1>Events</h1>
            <p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Start Now</a>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach($events as $event)
                <div class="col-md-4">
                    <img src="{{ asset('/images/' . $event->cover_image) }}" alt="" class="img-responsive">
                    <h3>{{ $event->title }}</h3>
                    <p>{{ $event->description }}</p>
                    <a href="{{ action('EventController@show', ['slug' => $event->slug]) }}" class="btn btn-primary">See Details</a>
                </div>
            @endforeach
        </div>
    </div>
@stop