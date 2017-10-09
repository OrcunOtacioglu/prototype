<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Custom Meta-->
    <title>@yield('title', 'Kayıt Ol') | Neredeysen Orada</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Lato:300,400|Montserrat:400,400i,700,700i" rel="stylesheet">
    <!--Favions-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('frontend/img/favicon/manifest.json') }}">
    <link rel="mask-icon" href="{{ asset('frontend/img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
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
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome-4.7.0/css/font-awesome.css') }}">

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
@include('frontend.partials.navbar')

<div class="coverPhoto">
    <div style="background-color: #a5a5a5;">
        <div class="container">
            <div class="row">
                <div class="coverPhotoImage">
                    <img src="{{ asset('frontend/img/loginImg.jpg') }}">
                    <div class="coverTitle">
                        <h1 class="eventTitle">@yield('title')</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-pb-40">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                @yield('form')
            </div>
        </div>
    </div>
</div>

@include('frontend.partials.footer')

<script src="{{ asset('frontend/js/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/common_scripts_min.js') }}"></script>
<script src="{{ asset('frontend/js/functions.js') }}"></script>
<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->

</body>
</html>