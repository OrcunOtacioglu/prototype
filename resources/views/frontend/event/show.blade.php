@extends('frontend.layout')

@section('custom.meta')
    <meta name="eventID" content="{{ $event->id }}">
    <meta property="og:url" content="{{ env('APP_URL') . '/event/' . $event->slug }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $event->title }}">
    <meta property="og:description" content="{{ $event->description }}">
    <meta property="og:image" content="{{ env('APP_URL') . '/images/cover-images/' . $event->bg_cover_image }}">
    <meta property="og:locale" content="tr_TR">
@stop

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
@stop

@section('title')
    {{ $event->title }}
@stop

@section('social.code')
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v2.10&appId=1686105115002751";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <script>
        window.twttr = (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0],
                t = window.twttr || {};
            if (d.getElementById(id)) return t;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js, fjs);

            t._e = [];
            t.ready = function(f) {
                t._e.push(f);
            };

            return t;
        }(document, "script", "twitter-wjs"));
    </script>
@stop

@section('content')
    <div class="coverPhoto">
        <div style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/cover-images/{{$event->bg_cover_image}}'); background-repeat: no-repeat; background-size: cover">
            <div class="container">
                <div class="row">
                    <div class="coverPhotoImage">
                        <img src="/images/cover-images/{{$event->cover_image}}" alt="">
                        <div class="coverTitle">
                            <h1 class="eventTitle">{{ $event->title }}</h1>
                            <div class="eventLocation">{{ $event->location }}</div>
                            <div class="eventDate">{{ \Acikgise\Helpers\Helpers::getTurkishTime($event->start_date) }}</div>
                        </div>
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
                                        <input class="BuyButton__tickets__button button" type="submit" value="SATIN AL">
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="social-sharing">
                        <div class="fb-share-button"
                             data-href="{{ env('APP_URL') . '/event/' . $event->slug }}"
                             data-layout="button"
                             data-size="large"
                        >
                        </div>
                        <a class="twitter-share-button"
                           href="https://twitter.com/intent/tweet?text={{ $event->description }}"
                           data-size="large"
                           data-hashtags="neredeysenorada">
                            Tweet</a>
                    </div>
                </div>
            </div>
            @include('frontend.ticketType.show')
        </div>
    </div>
@stop

@section('footer.scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@stop