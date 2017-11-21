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
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <ul>
                                    <li>
                                        <div>
                                            <a href="http://neredeysenorada.com/spor/yelken/yelken.html" target="_blank">
                                                <figure><img src="assets/frontend/img/yelkenSmall.jpg" class="img-rounded"></figure>
                                                <h3>Yelken <br> <span class="small-description">America's Cup</span></h3>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <ul>
                                    <li>
                                        <div>
                                            <a href="http://neredeysenorada.com/spor/motospor/motospor.html" target="_blank">
                                                <figure><img src="assets/frontend/img/motosporSmall.jpg" class="img-rounded"></figure>
                                                <h3>Motospor <br> <span class="small-description">Balancpian Gt Series Asia 2017</span></h3>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <ul>
                                    <li>
                                        <div>
                                            <a href="http://neredeysenorada.com/spor/at-yarisi/at-yarisi.html" target="_blank">
                                                <figure><img src="assets/frontend/img/atyarisiSmall.jpg" class="img-rounded"></figure>
                                                <h3>At Yarışı <br> <span class="small-description">Breeders' Cup</span></h3>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <ul>
                                    <li>
                                        <div>
                                            <a href="http://neredeysenorada.com/spor/okculuk/okculuk.html" target="_blank">
                                                <figure><img src="assets/frontend/img/okculukSmall.jpg" class="img-rounded"></figure>
                                                <h3>Okçuluk <br> <span class="small-description">Hyundai Archery World Cup</span></h3>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <ul>
                                    <li>
                                        <div>
                                            <a href="http://neredeysenorada.com/spor/aticilik/aticilik.html" target="_blank">
                                                <figure><img src="assets/frontend/img/aticilikSmall.jpg" class="img-rounded"></figure>
                                                <h3>Atıcılık <br> <span class="small-description">ISSF World Championship Shotgun</span></h3>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <ul>
                                    <li>
                                        <div>
                                            <a href="http://neredeysenorada.com/spor/gures/gures.html" target="_blank">
                                                <figure><img src="assets/frontend/img/guresSmall.jpg" class="img-rounded"></figure>
                                                <h3>Güreş <br> <span class="small-description">Paris 2017 World Championship</span></h3>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <ul>
                                    <li>
                                        <div>
                                            <a href="http://neredeysenorada.com/spor/binicilik/binicilik.html" target="_blank">
                                                <figure><img src="assets/frontend/img/binicilikSmall.jpg" class="img-rounded"></figure>
                                                <h3>Binicilik <br> <span class="small-description">UIPM Modern Pentathlon World Cup 2017</span></h3>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <ul>
                                    <li>
                                        <div>
                                            <a href="http://neredeysenorada.com/spor/yuzme/yuzme.html" target="_blank">
                                                <figure><img src="assets/frontend/img/yuzmeSmall.jpg" class="img-rounded"></figure>
                                                <h3>Yüzme <br> <span class="small-description">UIPM Modern Pentathlon World Cup 2017</span></h3>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <ul>
                                    <li>
                                        <div>
                                            <a href="http://neredeysenorada.com/spor/eskrim/eskrim.html" target="_blank">
                                                <figure><img src="assets/frontend/img/eskrimSmall.jpg" class="img-rounded"></figure>
                                                <h3>Eskrim <br> <span class="small-description">UIPM Modern Pentathlon World Cup 2017</span></h3>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
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