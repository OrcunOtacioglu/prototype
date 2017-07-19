<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Açıkgişe</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body style="padding-top: 50px;">
<div id="app">
    @include('frontend.partials.navbar')

    @yield('content')
</div>

<!-- Scripts -->
@include('general-partials.footer-scripts')
@yield('footer.scripts')
</body>
</html>
