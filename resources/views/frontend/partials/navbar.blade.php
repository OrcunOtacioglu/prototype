<header>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div id="logo_home">
                    <h1><a href="/" title="AçıkGişe">FBB Online Logo</a></h1>
                </div>
            </div>
            <nav class="col-md-9 col-sm-9 col-xs-9">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Mobil Menu</span></a>
                <div class="main-menu">
                    <div id="header_menu">
                        <img src="{{ asset('frontend/img/logo_sticky.png') }}" width="160" height="34" alt="City tours" data-retina="true">
                    </div>
                    <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                    <ul>
                        @if(!request()->user('account'))
                            <li class="submenu">
                                <a href="{{ route('login') }}">GİRİŞ YAP</a>
                            </li>
                            <li class="submenu">
                                <a href="{{ route('register') }}">KAYIT OL</a>
                            </li>
                        @else
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    {{ request()->user('account')->name }} <i class="glyphicon glyphicon-menu-down"></i>
                                </a>
                                
                                <ul class="dropdown-menu">
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
                            <a href="http://fbbentertainment.com" target="_blank" class="dropdown-toggle" style="border: 1px solid #d3712c;
                                                                                                                 border-radius: 3px;
                                                                                                                 padding: 5px 20px;">
                                KURUMSAL
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>