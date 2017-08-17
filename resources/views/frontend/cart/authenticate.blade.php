@extends('frontend.layout')

@section('title', 'Siparişiniz')

@section('content')
    <div style="
            background: url('/images/cover-images/coverBG.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            min-height: 450px;
            margin-bottom: 50px;
            ">
        <div style="
            background: rgba(0,0,0,0.4);
            display: block;
            z-index: 100;
            height: 100% !important;
            min-height: 450px;
        "></div>
    </div>

    <div class="container">
        <div class="row" style="background: #fff;">
            <div class="col-md-8">
                <h3>Giriş Yap</h3>
                <p>Kayıtlı kullanıcı iseniz giriş yaparak, kayıtlı değilseniz kayıt oalrak devamediniz.</p>
                @include('frontend.partials.authentication')
            </div>

            <div class="col-md-4">
                <order></order>
            </div>
        </div>
    </div>
@stop

@section('footer.scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $('#authenticate a').click(function (e) {
            e.preventDefault();
            $(this).tab('show')
        })
    </script>
@stop