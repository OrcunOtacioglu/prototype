<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('custom.meta')

        <title>@yield('title', 'Dashboard') | AçıkGişe</title>

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/plugins/metisMenu.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/admin.min.css') }}" rel="stylesheet">
        @yield('custom.css')

        <link href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        @yield('custom.fonts')

    </head>
    <body>
        <div id="wrapper">

            @include('dashboard.partials.navbar')

            <div id="page-wrapper">

                <div class="row">
                    <div class="col-lg-8">
                        <h1>@yield('title')</h1>
                    </div>
                    <div class="col-md-4" style="padding-top: 20px;">
                        @yield('page.top')
                    </div>
                </div>
                <hr>
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>

        @include('general-partials.footer-scripts')
        <script src="{{ asset('js/plugins/metisMenu.min.js') }}"></script>
        <script src="{{ asset('js/admin.min.js') }}"></script>
        @yield('footer.scripts')

    </body>
</html>
