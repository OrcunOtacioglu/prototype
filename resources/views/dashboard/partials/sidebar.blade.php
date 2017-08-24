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
            <li>
                <a href="#">
                    <i class="fa fa-file-word-o"></i> Pages<span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ action('Util\PageController@index') }}">All Pages</a>
                    </li>
                    <li>
                        <a href="{{ action('Util\PageController@create') }}">Create Page</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-calculator"></i> Sales<span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ action('OrderController@index') }}">All Sales</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-credit-card-alt"></i> Invoices<span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ action('Finance\InvoiceController@index') }}">All Invoices</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>