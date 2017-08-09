@extends('frontend.layout')

@section('title', 'Payment Error!')

@section('content')
    <div style="
            background: url('/images/cover-images/coverBG.jpg');
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
        <div class="alert alert-danger">
            <p>{{ $results }}</p>
        </div>
    </div>
@stop