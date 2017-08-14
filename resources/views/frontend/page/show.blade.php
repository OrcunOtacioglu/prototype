@extends('frontend.layout')

@section('title')
    {{ $page->title }}
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! $page->content !!}
            </div>
        </div>
    </div>
@stop