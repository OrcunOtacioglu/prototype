<!DOCTYPE html>
<html class="no-js js-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('custom.meta')

    <title>@yield('title', 'Login') | Scrabit</title>

    @include('dashboard.partials.css.base')

    @include('dashboard.partials.css.plugins')

<!-- Custom Styles -->
    @yield('custom.css')

<!-- Icon Styles -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/web-icons/web-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/brand-icons/brand-icons.min.css') }}">
    @yield('custom.fonts')

<!-- Header Scripts -->
    <script src="{{ asset('assets/js/dashboard/breakpoints.min.js') }}"></script>
    <script>
        Breakpoints();
    </script>
    @yield('header.scripts')
</head>
<body class="@yield('body.class')">

<div class="page" data-animsition-in="fade-in" data-animsition-out="fade-out">

    <!-- Page Content -->
    <div class="page-content">
        <div class="page-brand-info">
            <div class="brand">
                <img class="brand-img" src="{{ asset('assets/img/scrabit-light.png') }}" alt="Scrabit" style="width: 50px;">
                <h2 class="brand-text font-size-40">{{ env('APP_NAME') }}</h2>
            </div>
            <p class="font-size-20">
                Ticketing Solutions
            </p>
        </div>
        <div class="page-login-main animation-slide-right animation-duration-1">
            <div class="brand hidden-md-up">
                <img class="brand-img" src="{{ asset('assets/img/logo.png') }}" alt="Scrabit">
                <h3 class="brand-text font-size-40">AçıkGişe</h3>
            </div>
            <h3 class="font-size-24">Sign In</h3>
            <p>Please Sign In.</p>

            @yield('content')

            <footer class="page-copyright">
                <p>WEBSITE BY AçıkGişe</p>
                <p>© 2017. All RIGHT RESERVED.</p>
                <div class="social">
                    <a class="btn btn-icon btn-round social-twitter mx-5" href="javascript:void(0)">
                        <i class="icon bd-twitter" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-icon btn-round social-facebook mx-5" href="javascript:void(0)">
                        <i class="icon bd-facebook" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-icon btn-round social-google-plus mx-5" href="javascript:void(0)">
                        <i class="icon bd-google-plus" aria-hidden="true"></i>
                    </a>
                </div>
            </footer>
        </div>
    </div>
    <!-- End Page Content -->
</div>

@include('dashboard.partials.js.core')

@include('dashboard.partials.js.template')

@include('dashboard.partials.js.template-config')

@include('dashboard.partials.js.initialize')

<script src="{{ asset('assets/js/app.js') }}"></script>
@yield('footer.scripts')
</body>
</html>