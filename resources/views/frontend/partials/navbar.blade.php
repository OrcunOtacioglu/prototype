<header>
    <div class="container pdt-5">
        <div class="row">
            <div class="col-md-3">
                <div id="logo_home">
                    <h1><a href="{{ url('/') }}" title="NeredeysenOrada">Neredeysen Orada</a></h1>
                </div>
            </div>
            <nav class="col-md-9 col-sm-9 col-xs-9">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Mobil Menu</span></a>
                <div class="main-menu">
                    <div id="header_menu">
                        <img src="{{ asset('frontend/img/logo.png') }}" alt="Neredeysen Orada" data-retina="true">
                    </div>
                    <a href="#" class="open_close" id="close_in">
                        <i class="icon_set_1_icon-77"></i>
                    </a>
                    <ul>
                        <li class="submenu">
                            <h4>Online <span style="color: #f22c29">Canlı Yayın</span> İzleme Portalı&nbsp;&nbsp;&nbsp;&nbsp;|</h4>
                        </li>
                        @if(!request()->user('account'))
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer">
                                    GİRİŞ YAP <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" style="min-width: 260px;">
                                    <form role="form" action="{{ route('login') }}" method="POST">

                                        {{ csrf_field() }}

                                        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 10px;">
                                            <div class="form-group">
                                                <input type="text" name="email" id="email" class="form-control input-lg" placeholder="E-posta">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Şifre">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <input type="checkbox" name="beni-hatirla" value="Beni Hatırla" style="position: relative; vertical-align: middle; bottom: 3px;"> Beni Hatırla
                                            </div>
                                        </div>
                                        <div class="pt-15">
                                            <div class="col-xs-12 col-md-12">
                                                <input type="submit" value="GİRİŞ YAP" class="BuyButton__tickets__button button"></div>
                                        </div>
                                    </form>
                                    <div class="col-xs-12 col-md-12 pt-15 text-center">
                                        <a href="sifremi-unuttum.html">Şifremi Unuttum</a>
                                    </div>
                                </div>
                            </li>
                            <li class="submenu">
                                <a href="{{ route('register') }}">KAYIT OL</a>
                            </li>
                        @else
                            <li class="dropdown custom-nav-dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="glyphicon glyphicon-user"></i> {{ strtoupper(request()->user('account')->name) }} <i class="glyphicon glyphicon-menu-down"></i>
                                </a>

                                <ul class="dropdown-menu custom-nav-dropdown-menu">
                                    <li>
                                        <a href="{{ action('AttendeeController@show') }}">Profil</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout').submit();">
                                            Çıkış Yap
                                        </a>

                                        <form action="{{ route('logout') }}" id="logout" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li class="submenu">
                            <a href="http://fbbentertainment.com" target="_blank" class="dropdown-toggle" style="border-radius: 3px; padding: 5px 20px;">
                                KURUMSAL
                            </a>
                        </li>
                        <li class="submenu display-none-sm">
                            <a href="https://www.facebook.com/neredeysenoradacom/" target="_blank" class="display-inherit pr-0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li class="submenu display-none-sm">
                            <a href="https://twitter.com/neredeysenorada" target="_blank" class="display-inherit pr-0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li class="submenu display-none-sm">
                            <a href="https://www.instagram.com/neredeysenorada/" target="_blank" class="display-inherit pr-0"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                    <div class="social-icons-sub pt-15">
                        <a href="https://www.facebook.com/neredeysenoradacom/" target="_blank" class="display-inherit pr-15 pl-15 display-none-md font-size-20"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="https://twitter.com/neredeysenorada" target="_blank" class="display-inherit pr-15 display-none-md font-size-20"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="https://www.instagram.com/neredeysenorada/" target="_blank" class="display-inherit pr-0 display-none-md font-size-20"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>