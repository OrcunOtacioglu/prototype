<div class="main_title">
    <h2>Tüm <span>Etkinlikler</span></h2>
</div>

<div id="tabs" class="tabs">
    <nav>
        <ul>
            @foreach($categories as $category)
                <li><a href="#section-{{ $category->id }}"><span>{{ $category->name }}</span></a></li>
            @endforeach
        </ul>
    </nav>

    <div class="content">
        @foreach($categories as $category)
            <section id="section-{{ $category->id }}">
                <div class="row list_tours_tabs">
                    <ul>
                        @if($category->id === 2)
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <li>
                                    <div>
                                        <p class="text-center">Tiyatro, opera ve usta sanatçıların yer aldığı daha birçok sanatsal etkinliğin canlı yayınlarına yakında buradan ulaşabilirsiniz.</p>
                                    </div>
                                </li>
                            </div>
                        @elseif($category->id === 3)
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <li>
                                    <div>
                                        <p class="text-center">Futbol, basketbol ve ünlü sporcuların izlemekten keyif alacağınız etkinlikleri ile birlikte daha birçok alanda gerçekleştirilecek müsabakaların canlı yayınlarını yakında buradan izleyebilirsiniz.</p>
                                    </div>
                                </li>
                            </div>
                        @elseif($category->id === 5)
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <li>
                                    <div>
                                        <p class="text-center">Sosyal aktiviteler, kişisel gelişim ve en güncel konular üzerine merakla izleyeceğiniz canlı yayınlarımız, birbirinden renkli içerikleriyle çok yakında burada olacak.</p>
                                    </div>
                                </li>
                            </div>
                        @else
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
                        @endif
                    </ul>
                </div>
            </section>
        @endforeach
    </div>
</div>