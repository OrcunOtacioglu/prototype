@extends('frontend.layout')

@section('title', 'Complete Your Order')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div id="iyzipay-checkout-form" class="responsive"></div>
            </div>
        </div>
    </div>
@stop

@section('footer.scripts')
    {!! $paymentForm !!}
@stop