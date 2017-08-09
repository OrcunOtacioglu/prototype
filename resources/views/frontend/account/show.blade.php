@extends('frontend.layout')

@section('title', 'Account')

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
            <div class="col-md-8">
                <h1>{{ $attendee->name }}</h1>
                <p>{{ $attendee->email }}</p>
            </div>

            <div class="col-md-4">
                @if(\Gloudemans\Shoppingcart\Facades\Cart::count() > 0)
                    <h2>Your Order</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Etkinlik</th>
                                <th>Kategori</th>
                                <th>Adet</th>
                                <th>Fiyat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $item)
                                <tr>
                                    <td>{{ $item->options->event }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ $item->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"></td>
                                <td>ARA TOPLAM</td>
                                <td>{{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td>VERGİ</td>
                                <td>{{ \Gloudemans\Shoppingcart\Facades\Cart::tax() }}</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td>TOPLAM</td>
                                <td>{{ \Gloudemans\Shoppingcart\Facades\Cart::total() }}</td>
                            </tr>
                        </tfoot>
                    </table>
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
                @endif
            </div>
        </div>
    </div>
@stop