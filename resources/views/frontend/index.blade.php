@extends('frontend.layout')

@section('title', 'Ticketing Solutions')

@section('content')
    <main>
        @include('frontend.partials.banner')

        <div class="white_bg">
            <div class="container margin_60">
                <div class="main_title">
                    <h2>@yield('main.title', 'Popular Upcoming') <span>@yield('main.title.span', 'Events')</span></h2>
                </div>

                <div class="row">
                    @foreach($events as $event)
                        <div class="col-md-4 col-sm-6">
                            <div class="tour_container">
                                <div class="ribbon_3 "><span>{{ $event->eventCategory->name }}</span></div>
                                <div class="img_container">
                                    <a href="{{ action('EventController@show', ['slug' => $event->slug]) }}">
                                        <img src="images/cover-images/{{ $event->cover_image }}" class="img-responsive" alt="Image">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                                <div class="tour_title tcenter">
                                    <h3>{{ $event->title }}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="white_bg">
            <div class="container margin_60">
                @include('frontend.partials.allEvents')
            </div>
        </div>
    </main>
@stop

@section('footer.scripts')
    <script src="{{ asset('frontend/js/common_scripts_min.js') }}"></script>
    <script src="{{ asset('frontend/js/functions.js') }}"></script>

    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script src="{{ asset('frontend/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('frontend/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('frontend/js/revolution_func.js') }}"></script>

    <script src="{{ asset('frontend/js/tabs.js') }}"></script>
    <script>new CBPFWTabs(document.getElementById('tabs'));</script>
@stop