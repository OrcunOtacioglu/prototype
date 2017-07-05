<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-address-card-o"></i> Accounts<span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ action('AccountController@index') }}">All Accounts</a>
                    </li>
                    <li>
                        <a href="{{ action('AccountController@create') }}">Create Account</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-calendar"></i> Events<span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ action('EventController@index') }}">All Events</a>
                    </li>
                    <li>
                        <a href="{{ action('EventController@create') }}">Create Event</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>