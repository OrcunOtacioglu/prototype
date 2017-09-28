<div class="site-menubar">
    <div class="site-menubar-body scrollable scrollable-inverse scrollable-vertical hoverscorll-disabled">
        <div class="scrollable-container">
            <div class="scrollable-content">
                <ul class="site-menu" data-plugin="menu">

                    <li class="site-menu-category">General</li>
                    <li class="site-menu-item">
                        <a href="{{ url('/dashboard') }}">
                            <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                            <span class="site-menu-title">Dashboard</span>
                        </a>
                    </li>

                    <!-- Events -->
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon wb-calendar" aria-hidden="true"></i>
                            <span class="site-menu-title">Events</span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item active">
                                <a class="animsition-link" href="{{ action('EventController@create') }}">
                                    <span class="site-menu-title">Create New Event</span>
                                </a>
                            </li>
                            <li class="site-menu-item active">
                                <a class="animsition-link" href="{{ action('EventController@index') }}">
                                    <span class="site-menu-title">Manage Events</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Site Management -->
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon wb-wrench" aria-hidden="true"></i>
                            <span class="site-menu-title">Management</span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item active">
                                <a class="animsition-link" href="{{ action('Util\PageController@index') }}">
                                    <span class="site-menu-title">Page Management</span>
                                </a>
                            </li>
                            <li class="site-menu-item active">
                                <a class="animsition-link" href="{{ action('SliderController@index') }}">
                                    <span class="site-menu-title">Slider Management</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Sales and Reporting -->
                    <li class="site-menu-category">Sales & Reporting</li>

                    <!-- Sales -->
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon wb-stats-bars" aria-hidden="true"></i>
                            <span class="site-menu-title">Sales</span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item active">
                                <a class="animsition-link" href="{{ action('OrderController@index') }}">
                                    <span class="site-menu-title">All Sales</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Invoices -->
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon wb-order" aria-hidden="true"></i>
                            <span class="site-menu-title">Invoices</span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item active">
                                <a class="animsition-link" href="{{ action('Finance\InvoiceController@index') }}">
                                    <span class="site-menu-title">Manage Invoices</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <div class="scrollable-bar scrollable-bar-vertical scrollable-bar-hide" draggable="false">
            <div class="scrollable-bar-handle"></div>
        </div>
    </div>
    <div class="site-menubar-footer">
        <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip" data-original-title="Settings">
            <span class="icon wb-settings" aria-hidden="true"></span>
        </a>
        <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
            <span class="icon wb-eye-close" aria-hidden="true"></span>
        </a>
        <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
            <span class="icon wb-power" aria-hidden="true"></span>
        </a>
    </div>
</div>