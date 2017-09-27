<div class="white_bg">
    <div class="container margin_60">
        <div class="main_title">
            <h2>Tüm <span>Etkinlikler</span></h2>
        </div>

        <div id="tabs" class="tabs">
            <nav>
                <ul>
                    <li><a href="#section-1"><span>MÜZİK</span></a></li>
                    <li><a href="#section-2"><span>SANAT</span></a></li>
                    <li><a href="#section-3"><span>SPOR</span></a></li>
                    <li><a href="#section-4"><span>GALA</span></a></li>
                </ul>
            </nav>

            <div class="content">
                <section id="section-1">
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
                </section>
                <section id="section-2">
                    <div class="row list_tours_tabs">
                        <div class="col-md-4">
                            <ul>
                                @foreach(\App\Models\Event::listBasedOnCategory($events, 2) as $event)
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
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                    </div>
                </section>
                <section id="section-3">
                    <div class="row list_tours_tabs">
                        <div class="col-md-4">
                            <ul>
                                @foreach(\App\Models\Event::listBasedOnCategory($events, 3) as $event)
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
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                    </div>
                </section>
                <section id="section-4">
                    <div class="row list_tours_tabs">
                        <div class="col-md-4">
                            <ul>
                                @foreach(\App\Models\Event::listBasedOnCategory($events, 4) as $event)
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
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>