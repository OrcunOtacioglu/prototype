@extends('auth.layout')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard/pages/login.min.css') }}">
    <style>
        body {
            background: transparent;
        }
        .page-login-v2:before {
            background-image: url("{{ asset('assets/img/bg.jpg') }}");
        }
    </style>
@stop

@section('body.class', 'animsition page-login-v2 layout-full page-dark')

@section('content')
    @include('auth.forms.dashboard-login')
@endsection
