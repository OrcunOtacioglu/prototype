@extends('frontend.layout')

@section('title', 'Account')

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{ $attendee->name }}</h1>
        </div>
    </div>
@stop