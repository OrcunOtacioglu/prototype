@extends('frontend.layout')

@section('title', 'Ana Sayfa')

@section('content')
    <main>
        @include('frontend.partials.banner')

        <div class="white_bg">
            <div class="container margin_60">
                <div class="main_title">
                    <h2>@yield('main.title', 'Popüler') <span>@yield('main.title.span', 'Etkinlikler')</span></h2>
                </div>

                <div class="row">
                    @foreach($eligibleEvents as $event)
                        @if($event->is_featured)
                            <div class="col-md-4 col-sm-6">
                                <a href="{{ action('EventController@show', ['slug' => $event->slug]) }}">
                                    <div class="tour_container">
                                        <div class="ribbon_3 "><span>{{ $event->eventCategory->name }}</span></div>
                                        <div class="img_container">
                                            <img src="images/featured-images/{{ $event->featured_image }}" class="img-responsive" alt="Image">
                                            <div class="short_info"></div>
                                        </div>
                                        <div class="tour_title tcenter">
                                            <h3>{{ $event->featured_title }} <br><br> {{ \Acikgise\Helpers\Helpers::getTurkishTime($event->start_date) }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        @include('frontend.partials.exciting-dialogs')

        <section id="all-events" name="all-events">
            <div class="wide-grey">
                <div class="wide">
                    <div class="container">
                        @include('frontend.partials.allEvents')
                    </div>
                </div>
            </div>
        </section>
    </main>
@stop

@section('footer.scripts')
    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script src="{{ asset('frontend/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('frontend/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('frontend/js/revolution_func.js') }}"></script>

    <script src="{{ asset('frontend/js/tabs.js') }}"></script>
    <script>new CBPFWTabs(document.getElementById('tabs'));</script>
    <script>new CBPFWTabs(document.getElementById('tabs-1'));</script>
@stop