@extends('frontend.layout')

@section('title')
    {{ $page->title }}
@stop

@section('content')
    <div class="coverPhoto">
        <div style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/frontend/img/loginImg.jpg'); background-repeat: no-repeat; background-size: cover">
            <div class="container">
                <div class="row">
                    <div class="coverPhotoImage">
                        <img src="/frontend/img/loginImg.jpg" alt="">
                        <div class="coverTitle">
                            <h1 class="eventTitle">{{ $page->title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row" style="background: #fff">
                <div class="col-md-12">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </div>
@stop