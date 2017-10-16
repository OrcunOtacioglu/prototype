<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="">
    <title>@yield('title') | Neredeysen Orada</title>
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
    <link rel="stylesheet" href="{{ asset('frontend/css/errors.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome-4.7.0/css/font-awesome.css') }}">
</head>
<body>
<div class="container pt-80 acm text-center">
    <div class="row">
        <a class="lb" href="{{ url('/') }}">
            <img src="{{ asset('frontend/img/logo.png') }}">
        </a>
    </div>
</div>
<section class="pt-40 text-center">
    <div class="mw-800">
        <div class="row mrl0">
            <div class="col-md-12 mt-50 pl-0">
                <h1 style="font-size: 175px">@yield('title')</h1>
                <span class="br3" style="font-size: 20px">@yield('message')</span>
            </div>
            <div class="col-md-12 mt-250">
                <a href="http://www.fbbentertainment.com/" target="_blank"><img src="{{ asset('frontend/img/logo-fbb-error.png') }}"></a>
            </div>
            <div class="col-md-12">
                <span>Bizi Takip Edin!</span>
                <a href="https://www.facebook.com/neredeysenoradacom/" target="_blank" class="pl-15 pr-15 csi"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="https://twitter.com/neredeysenorada" target="_blank" class="pr-15 csi"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/neredeysenorada/" target="_blank"  class="pr-15 csi"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
            <div class="col-md-12">
                <p class="cop">© 2017 NeredeysenOrada. Tüm hakları saklıdır.</p>
            </div>
        </div>
    </div>
</section>
</body>
</html>