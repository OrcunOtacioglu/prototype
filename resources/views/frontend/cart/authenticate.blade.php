@extends('frontend.layout')

@section('title', 'Siparişiniz')

@section('content')
    <div style="
            background: url('/frontend/img/loginImg.jpg');
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
        <div class="row" style="background: #fff;">
            <div class="col-md-8">
                <h3>Giriş Yap</h3>
                <p>Kayıtlı kullanıcı iseniz giriş yaparak, kayıtlı değilseniz kayıt olarak devam ediniz.</p>
                @include('frontend.partials.authentication')
            </div>

            <div class="col-md-4">
                <div>
                    <h3>Siparişiniz</h3>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Fiyat</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in items">
                            <td>{{ $order->event->title }}</td>
                            <td>{{ $order->total }}TL</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td><strong>TOPLAM</strong></td>
                            <td><strong>{{ $order->total }}TL</strong></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer.scripts')
    <script src="{{ asset('frontend/js/plugins/formatter.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/formValidation/validate-register.js') }}"></script>
    <script>
        $('#authenticate a').click(function (e) {
            e.preventDefault();
            $(this).tab('show')
        })
    </script>
@stop