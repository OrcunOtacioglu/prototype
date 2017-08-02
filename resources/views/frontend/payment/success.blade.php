@extends('frontend.layout')

@section('title', 'Order Completed!')

@section('content')
    <div style="
            background: url('/images/cover-images/acikgise.png');
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
            <div class="alert alert-success" role="alert">
                <p>Your Payment Successful!</p>
                <strong>{{ $results['orderRef'] }}</strong>
                @foreach($order->orderItems as $item)
                    <p>{{ $item->product_name }}</p>
                    <p>{{ $item->quantity }}</p>
                    <p>{{ $item->unit_price }}</p>
                @endforeach
            </div>
        </div>
    </div>
@stop