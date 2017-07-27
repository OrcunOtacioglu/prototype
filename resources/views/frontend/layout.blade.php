<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Açıkgişe</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Lato:300,400|Montserrat:400,400i,700,700i" rel="stylesheet">
    @yield('custom.fonts')

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/rs-plugin/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/extralayers.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/tabs_home.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/color-orange.css') }}">
    @yield('custom.css')
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
    <script src="{{ asset('frontend/js/common_scripts_min.js') }}"></script>
    <script src="{{ asset('frontend/js/functions.js') }}"></script>
    @yield('footer.scripts')
</body>
</html>
