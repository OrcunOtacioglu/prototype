@extends('frontend.layout')

@section('title', 'Siparişiniz')

@section('content')
    <div class="coverPhoto">
        <div class="coverPhotoContainer" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('/images/cover-images/{{$order->event->cover_image}}');">
            <div class="coverPhotoImage" style="background-image: linear-gradient(rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.15) 70%, rgba(0, 0, 0, 0.8) 100%), url('/images/cover-images/{{$order->event->cover_image}}'), linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5));">
                <div class="coverTitle">
                    <h2 class="eventOrganizer">{{ $order->event->account->name }}</h2>
                    <h1 class="eventTitle">{{ $order->event->title }}</h1>
                    <div class="eventLocation">{{ $order->event->location }}</div>
                    <div class="eventDate">{{ $order->event->start_date }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row" style="background: #fff;">
            <div class="col-md-8">

                <h3>Etkinlik Detayı</h3>
                <p>{{ $order->event->description }}</p>
                <hr>

                @include('frontend.partials.order')
            </div>

            <div class="col-md-4">
                <h3>Ödeme Seçenekleri</h3>
                <p>"Ödeme Yap" butonuna basarak veya bu siteyi kullanarak, Kullanım Koşulları'nı da kabul etmiş sayılırsınız.</p>
                <form action="https://entegrasyon.asseco-see.com.tr/fim/est3Dgate" method="POST">
                    <input type="hidden" name="clientid" value="{{ $paymentInfo['clientid'] }}">
                    <input type="hidden" name="amount" value="{{ $paymentInfo['amount'] }}">
                    <input type="hidden" name="oid" value="{{ $paymentInfo['oid'] }}">
                    <input type="hidden" name="okUrl" value="{{ $paymentInfo['okUrl'] }}">
                    <input type="hidden" name="failUrl" value="{{ $paymentInfo['failUrl'] }}" >
                    <input type="hidden" name="islemtipi" value="{{ $paymentInfo['islemtipi'] }}" >
                    <input type="hidden" name="taksit" value="{{ $paymentInfo['taksit'] }}">
                    <input type="hidden" name="rnd" value="{{ $paymentInfo['rnd'] }}" >
                    <input type="hidden" name="hash" value="{{ $hash }}" >

                    <input type="hidden" name="storetype" value="3d_pay_hosting" >

                    <input type="hidden" name="refreshtime" value="10" >
                    <input type="hidden" name="lang" value="tr">
                    <input type="hidden" name="currency" value="949">
                    <input type="submit" class="btn btn-success btn-block" value="Ödeme Yap">
                </form>
            </div>
        </div>
    </div>
@stop