@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('body.class', 'site-menubar-fold site-menubar-keep')

@section('content')
    <div class="row">

        <div class="col-md-6">
            @if($sales->count() > 0)
                <div class="widget">
                    <div class="widget-content padding-25 bg-blue-600">
                        <div class="counter counter-lg counter-inverse">
                            <div class="counter-label text-uppercase">TOTAL SALES</div>
                            <span class="counter-number">220₺</span>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-danger">
                    <p>There are no sales yet!</p>
                </div>
            @endif
        </div>

        <div class="col-md-6">

        </div>

    </div>
@stop