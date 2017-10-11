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
            <div class="row" style="background: #fff;">
                <div class="col-md-4">
                    <h2>Profil Bilgileri</h2>

                    <form action="{{ action('AttendeeController@update', ['id' => $attendee->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="name">Ad</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $attendee->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Soyad</label>
                            <input type="text" name="surname" id="surname" class="form-control" value="{{ $attendee->surname }}" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Telefon</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ $attendee->phone }}" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $attendee->email }}" required>
                        </div>

                        <input type="submit" value="BİLGİLERİ GÜNCELLE" class="btn btn-block btn-primary">
                    </form>
                </div>
                
                <div class="col-md-8">
                    <h2>Biletlerim</h2>

                    @if($attendee->orders->count() < 1)
                        <div class="alert alert-info" role="alert">
                            Satın almış olduğunuz bir yayın bulunmamaktadır!
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><h4>Yayın Adı</h4></div>
                            <div class="col-md-3"><h4>Başlangıç Saati</h4></div>
                            <div class="col-md-3"><h4>İşlemler</h4></div>
                        </div>

                        @foreach($attendee->orders as $order)
                        <div class="row orders">
                            <div class="col-md-3">
                                <img src="images/small-images/{{ $order->event->small_image }}" class="img-rounded" alt="">
                            </div>
                            <div class="col-md-3">
                                <p>{{ $order->event->title }}</p>
                            </div>
                            <div class="col-md-3">
                                <p>{{ \Acikgise\Helpers\Helpers::getTurkishTime($order->event->start_date) }}</p>
                            </div>
                            <div class="col-md-3">
                                <a href="#" class="btn btn-sm btn-default">Şimdi İzle</a>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop