@extends('frontend.layout')

@section('title')
    {{ $event->title }}
@stop

@section('content')
    <div style="
            background: url({{ asset('images/' . $event->cover_image) }});
            min-height: 350px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: left;
            ">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title text-uppercase">{{ $event->title }}</h2>
                <hr>
            </div>
            <div class="col-md-8">
                <p>{{ $event->description }}</p>
            </div>
            <div class="col-md-4">
                @foreach($event->ticketTypes as $ticketType)
                    <div>
                        <p>{{ $ticketType->name }}</p>
                        <p>{{ $ticketType->price }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop