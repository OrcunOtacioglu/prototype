<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('frontend/img/favicon/manifest.json') }}">
    <link rel="mask-icon" href="{{ asset('frontend/img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom Meta-->
    @yield('custom.meta')

    <title>@yield('title', 'Ana Sayfa') | Neredeysen Orada</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Lato:300,400|Montserrat:400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome-4.7.0/css/font-awesome.css') }}">
    @yield('custom.fonts')

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/rs-plugin/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/extralayers.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/tabs_home.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/color-orange.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/pop_up.css') }}">
    @yield('custom.css')

    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-107354536-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments)};
        gtag('js', new Date());

        gtag('config', 'UA-107354536-1');
    </script>
</head>
<body>

    <!-- Mobile menu overlay mask -->
    <div class="layer"></div>

    <div id="app">
        @include('frontend.partials.navbar')

        @yield('content')

        @include('frontend.partials.footer')

        <div id="toTop"></div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('frontend/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/functions.js') }}"></script>
    <script src="{{ asset('frontend/js/common_scripts_min.js') }}"></script>
    <script src="{{ asset('frontend/js/common_scripts_min.js') }}"></script>
    @yield('footer.scripts')
</body>
</html>
