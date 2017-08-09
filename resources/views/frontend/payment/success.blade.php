@extends('frontend.layout')

@section('title', 'Order Completed!')

@section('content')
    <div style="
            background: url('/images/cover-images/{{ $order->event->cover_image }}');
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
        <div class="row item">
            <div class="col-md-12">
                <h3>Your Payment Successful! Order Reference: {{ $results['orderRef'] }}</h3>
                <p>Thank you for purchasing tickets for online streaming {{ $order->event->title }} event!</p>
                <p>An email has been sent to your account regarding to this purchase. You will find all the information you need about your purchase and steps that are explaining you how to watch your selected event.</p>
            </div>
        </div>
        @foreach($order->orderItems as $item)
            <div class="row item">
                <div class="col-md-2">
                    <img src="/images/cover-images/{{ $order->event->cover_image }}" alt="" class="img-responsive">
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-5">
                            <p>Etkinlik Adı: {{ $order->event->title }}</p>
                            <p>Etkinlik Tarihi: {{ $order->event->start_date }}</p>
                            <p>Etkinlik Mekanı: {{ $order->event->location }}</p>
                        </div>
                        <div class="col-md-3">
                            <p>Bilet Kategorisi: {{ $item->product_name }}</p>
                            <p>Bilet Adedi: {{ $item->quantity }}</p>
                        </div>
                        <div class="col-md-4">
                            <p>Toplam Tutar: {{ $item->unit_price * $item->quantity }}</p>
                            <a href="#" class="btn btn-block btn-default">Bu Sayfayı Yazdır</a>
                            <a href="#" class="btn btn-block btn default">Fatura Al</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop