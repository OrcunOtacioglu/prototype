@extends('frontend.layout')

@section('title', 'Complete Your Order')

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
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @include('checkout-forms.'. $paymentGateway)
            </div>
        </div>
    </div>
@stop

@section('footer.scripts')
    {!! $paymentForm !!}
@stop