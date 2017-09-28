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
        <div class="coverPhotoContainer" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('/images/cover-images/{{$event->bg_cover_image}}');">
            <div class="coverPhotoImage" style="background-image: linear-gradient(rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.15) 70%, rgba(0, 0, 0, 0.8) 100%), url('/images/cover-images/{{$event->cover_image}}'), linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5));">
                <div class="coverTitle">
                    <h1 class="eventTitle">{{ $event->title }}</h1>
                    <div class="eventLocation">{{ $event->location }}</div>
                    <div class="eventDate">{{ \Acikgise\Helpers\Helpers::getTurkishTime($event->start_date) }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="background: #fff; margin-bottom: 50px;">
            <div class="col-md-8">

                <h3>Etkinlik Detayı</h3>
                <p>{{ $event->description }}</p>

            </div>

            <div class="col-md-4">

                <div class="BuyButton">
                    <div>
                        <div class="BuyButton__container">
                            <div class="BuyButton__price">
                                <div class="BuyButton__price__label">
                                    <span>Fiyat</span>
                                </div>
                                <div class="BuyButton__price__amount">
                                    <div>
                                        <span>{{ $event->price }} TL</span>
                                    </div>
                                </div>
                            </div>
                            <div class="BuyButton__tickets">
                                <div class="BuyButton__details__container">

                                </div>

                                <form action="{{ action('OrderController@store') }}" method="POST" style="width: 100%;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="eventID" value="{{ $event->id }}">
                                    <input class="BuyButton__tickets__button button" type="submit" value="ŞİMDİ İZLE">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @include('frontend.ticketType.show')
    </div>
@stop

@section('footer.scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@stop