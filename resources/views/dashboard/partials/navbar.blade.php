<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided" data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
            <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
            <img class="navbar-brand-logo" src="{{ asset('assets/img/ag-small-logo.png') }}" title="Scrabit">
            <span class="navbar-brand-text hidden-xs-down"> AçıkGişe</span>
        </div>
    </div>
    <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <!-- Navbar Toolbar -->
            <ul class="nav navbar-toolbar">
                <li class="nav-item hidden-float" id="toggleMenubar">
                    <a class="nav-link" data-toggle="menubar" href="#" role="button">
                        <i class="icon hamburger hamburger-arrow-left">
                            <span class="sr-only">Toggle menubar</span>
                            <span class="hamburger-bar"></span>
                        </i>
                    </a>
                </li>
            </ul>
            <!-- End Navbar Toolbar -->
            <!-- Navbar Toolbar Right -->
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
                      <span class="avatar avatar-online">
                        <img src="{{ asset('assets/img/ag-small-logo-dark.png') }}" alt="{{ request()->user()->name }}">
                        <i></i>
                      </span>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        @if(\Acikgise\Helpers\Helpers::minimumUserLevel(request()->user(), 0))
                            <a class="dropdown-item" href="{{ action('AccountController@index') }}" role="menuitem">
                                <i class="icon wb-users" aria-hidden="true"></i> Accounts
                            </a>
                        @endif
                        <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                            <i class="icon wb-settings" aria-hidden="true"></i> Settings
                        </a>
                        <div class="dropdown-divider" role="presentation"></div>
                        <a class="dropdown-item" role="menuitem" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="icon wb-power" aria-hidden="true"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
            <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->
    </div>
</nav>