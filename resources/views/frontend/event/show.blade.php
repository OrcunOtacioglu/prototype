@extends('frontend.layout')

@section('title')
    {{ $event->title }}
@stop

@section('content')
    <div style="
            background: url('/images/cover-images/{{ $event->cover_image }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            min-height: 450px;
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