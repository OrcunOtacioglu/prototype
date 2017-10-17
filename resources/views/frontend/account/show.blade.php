@extends('frontend.layout')

@section('title', 'Hesabım')

@section('content')
    <div class="coverPhoto">
        <div style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/frontend/img/loginImg.jpg'); background-repeat: no-repeat; background-size: cover">
            <div class="container">
                <div class="row">
                    <div class="coverPhotoImage">
                        <img src="/frontend/img/loginImg.jpg" alt="">
                        <div class="coverTitle">
                            <h1 class="eventTitle">{{ $attendee->name }}  {{ $attendee->surname }}</h1>
                            <div class="eventLocation">{{ $attendee->email }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row" style="background: #fff; padding: 40px;">
                <div class="col-md-4">
                    <h2>Profil Bilgileri</h2>

                    <form action="{{ action('AttendeeController@update', ['id' => $attendee->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Ad</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $attendee->name }}" required maxlength="100">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('surname') ? ' has-error' : '' }}">
                            <label for="surname">Soyad</label>
                            <input type="text" name="surname" id="surname" class="form-control" value="{{ $attendee->surname }}" required maxlength="100">

                            @if ($errors->has('surname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('surname') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone">Telefon</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ $attendee->phone }}" required maxlength="25">

                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $attendee->email }}" required maxlength="100">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Parola</label>
                            <input type="password" name="password" id="password" class="form-control" maxlength="25" minlength="6">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="control-label">Parola Doğrulama</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required maxlength="25">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block" style="background-color: #fcb131; border: none; padding: 6px 25px;">
                            Bilgileri Güncelle
                        </button>
                    </form>
                </div>
                
                <div class="col-md-8">
                    <h2>Biletlerim</h2>

                    @if(\App\Models\Attendee::getCompletedOrders($attendee->orders)->count() < 1)
                        <div class="alert alert-warning" role="alert">
                            Satın almış olduğunuz bir yayın bulunmamaktadır!
                        </div>
                    @else
                        <div style="overflow-x: auto;">
                            <table class="order-table">
                                <thead>
                                <tr>
                                    <th class="first-th"></th>
                                    <th class="default-th">Etkinlik</th>
                                    <th class="default-th">Tarih</th>
                                    <th class="default-th">Tutar</th>
                                    <th class="default-th text-center">Durum</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach(\App\Models\Attendee::getCompletedOrders($attendee->orders) as $order)
                                    <tr>
                                        <td class="img-td">
                                            <img src="/images/small-images/{{ $order->event->small_image }}" alt="" class="img-responsive">
                                        </td>
                                        <td class="default-td">{{ $order->event->title }}</td>
                                        <td class="default-td">{{ \Acikgise\Helpers\Helpers::getTurkishTime($order->event->start_date) }}</td>
                                        <td class="default-td">{{ $order->total }} TL</td>
                                        <td class="default-td text-center">
                                            @if(Acikgise\Helpers\Helpers::checkVideoAvailability($order))
                                                <a href="{{ $order->video_link }}" class="btn btn-sm btn-primary">Şimdi İzle</a>
                                            @else
                                                <a href="#" class="btn btn-sm btn-default disabled not-active">Yayın Saati Bekleniyor</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop