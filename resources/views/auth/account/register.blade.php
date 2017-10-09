@extends('auth.account.layout')

@section('title', 'Kayıt Ol')

@section('form')
    <form role="form" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Ad" tabindex="1">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="form-group">
                    <input type="text" name="surname" id="surname" class="form-control input-lg" placeholder="Soyad" tabindex="2">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="E-posta" tabindex="3">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="form-group">
                    <input type="text" name="phone" id="phone" class="form-control input-lg" placeholder="Telefon" tabindex="4">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Şifre" tabindex="6">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="form-group">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Şifre Tekrar" tabindex="7">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-9 col-sm-9 col-md-9">
                <input type="checkbox" name="gizlilik"> <a href="gizlilik.html" target="_blank">Gizlilik Sözleşmesini</a> okudum ve kabul ediyorum.
            </div>
        </div>
        <div class="row pt-15">
            <div class="col-xs-6 col-md-3"><input type="submit" value="Kayıt Ol" class="BuyButton__tickets__button button" tabindex="7"></div>
        </div>
    </form>

@stop