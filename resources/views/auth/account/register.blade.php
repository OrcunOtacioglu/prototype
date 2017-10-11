@extends('frontend.layout')

@section('title', 'Kayıt Ol')

@section('content')
    <div style="
            background: url('/frontend/img/loginImg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            min-height: 450px;
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
        <div class="row">
            <div class="col-md-12">
                <h3>Giriş Yap</h3>
                <p>Kayıtlı kullanıcı iseniz giriş yaparak, kayıtlı değilseniz kayıt olarak devam ediniz.</p>
                @include('frontend.partials.authentication')
            </div>
        </div>
    </div>
@stop