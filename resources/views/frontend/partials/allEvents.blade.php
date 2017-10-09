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
                    <ul>
                        @foreach(\App\Models\Event::listBasedOnCategory($eligibleEvents, $category->id) as $event)
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <li>
                                    <div>
                                        <a href="{{ action('EventController@show', ['slug' => $event->slug]) }}">
                                            <figure><img src="/images/small-images/{{ $event->small_image }}" class="img-rounded"></figure>
                                            <h3>{{ $event->small_title }} <br><span class="small-description">{{ Acikgise\Helpers\Helpers::getTurkishTime($event->start_date) }}</span></h3>
                                        </a>
                                    </div>
                                </li>
                            </div>
                        @endforeach
                    </ul>
                </div>
            </section>
        @endforeach
    </div>
</div>