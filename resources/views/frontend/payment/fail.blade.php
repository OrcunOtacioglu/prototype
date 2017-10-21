@extends('frontend.layout')

@section('title', 'Payment Error!')

@section('content')
    <div class="coverPhoto">
        <div style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/cover-images/{{$order->event->bg_cover_image}}'); background-repeat: no-repeat; background-size: cover">
            <div class="container">
                <div class="row">
                    <div class="coverPhotoImage">
                        <img src="/images/cover-images/{{$order->event->cover_image}}" alt="">
                    </div>
                </div>
            </div>
        </div>

    <div class="container">
        <div class="alert alert-danger">
            <p>{{ $results }}</p>
        </div>
    </div>
@stop