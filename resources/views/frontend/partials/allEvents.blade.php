<div class="main_title">
    <h2>Tüm <span>Etkinlikler</span></h2>
</div>

<div id="tabs" class="tabs">
    <nav>
        <ul>
            @foreach(\App\Models\Util\EventCategory::all() as $category)
                <li><a href="#section-{{ $category->id }}"><span>{{ $category->name }}</span></a></li>
            @endforeach
        </ul>
    </nav>

    <div class="content">
        @foreach(\App\Models\Util\EventCategory::all() as $category)
            <section id="section-{{ $category->id }}">
                <div class="row list_tours_tabs">
                    <div class="col-md-4">
                        <ul>
                            @foreach(\App\Models\Event::listBasedOnCategory($events, $category->id) as $event)
                                <li>
                                    <div>
                                        <a href="{{ action('EventController@show', ['slug' => $event->slug]) }}">
                                            <figure><img src="/images/cover-images/{{ $event->cover_image }}" class="img-rounded"></figure>
                                            <h3>{{ $event->title }} <br><span class="small-description">{{ Acikgise\Helpers\Helpers::getTurkishTime($event->start_date) }}</span></h3>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>
        @endforeach
    </div>
        {{--<section id="section-1">--}}
            <div class="row list_tours_tabs">
                <div class="col-md-4">
                    <ul>
                        @foreach(\App\Models\Event::listBasedOnCategory($events, 1) as $event)
                            <li>
                                <div>
                                    <a href="{{ action('EventController@show', ['slug' => $event->slug]) }}">
                                        <figure><img src="/images/cover-images/{{ $event->cover_image }}" class="img-rounded"></figure>
                                        <h3>{{ $event->title }} <br><span class="small-description">{{ Acikgise\Helpers\Helpers::getTurkishTime($event->start_date) }}</span></h3>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        {{--</section>--}}
        {{--<section id="section-2">--}}
            {{--<div class="row list_tours_tabs">--}}
                {{--<div class="col-md-4">--}}
                    {{--<ul>--}}
                        {{--@foreach(\App\Models\Event::listBasedOnCategory($events, 2) as $event)--}}
                            {{--<li>--}}
                                {{--<div>--}}
                                    {{--<a href="{{ action('EventController@show', ['slug' => $event->slug]) }}">--}}
                                        {{--<figure><img src="/images/cover-images/{{ $event->cover_image }}" class="img-rounded"></figure>--}}
                                        {{--<h3>{{ $event->title }} <br><span class="small-description">{{ Acikgise\Helpers\Helpers::getTurkishTime($event->start_date) }}</span></h3>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="col-md-4"></div>--}}
                {{--<div class="col-md-4"></div>--}}
            {{--</div>--}}
        {{--</section>--}}
        {{--<section id="section-3">--}}
            {{--<div class="row list_tours_tabs">--}}
                {{--<div class="col-md-4">--}}
                    {{--<ul>--}}
                        {{--@foreach(\App\Models\Event::listBasedOnCategory($events, 3) as $event)--}}
                            {{--<li>--}}
                                {{--<div>--}}
                                    {{--<a href="{{ action('EventController@show', ['slug' => $event->slug]) }}">--}}
                                        {{--<figure><img src="/images/cover-images/{{ $event->cover_image }}" class="img-rounded"></figure>--}}
                                        {{--<h3>{{ $event->title }} <br><span class="small-description">{{ Acikgise\Helpers\Helpers::getTurkishTime($event->start_date) }}</span></h3>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="col-md-4"></div>--}}
                {{--<div class="col-md-4"></div>--}}
            {{--</div>--}}
        {{--</section>--}}
        {{--<section id="section-4">--}}
            {{--<div class="row list_tours_tabs">--}}
                {{--<div class="col-md-4">--}}
                    {{--<ul>--}}
                        {{--@foreach(\App\Models\Event::listBasedOnCategory($events, 4) as $event)--}}
                            {{--<li>--}}
                                {{--<div>--}}
                                    {{--<a href="{{ action('EventController@show', ['slug' => $event->slug]) }}">--}}
                                        {{--<figure><img src="/images/cover-images/{{ $event->cover_image }}" class="img-rounded"></figure>--}}
                                        {{--<h3>{{ $event->title }} <br><span class="small-description">{{ Acikgise\Helpers\Helpers::getTurkishTime($event->start_date) }}</span></h3>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="col-md-4"></div>--}}
                {{--<div class="col-md-4"></div>--}}
            {{--</div>--}}
        {{--</section>--}}
</div>