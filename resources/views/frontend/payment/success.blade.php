@extends('frontend.layout')

@section('title', 'Order Completed!')

@section('content')
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