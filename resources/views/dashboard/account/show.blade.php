@extends('dashboard.base')

@section('title')
    {{ $account->name }}
@stop

@section('content')
    <div class="col-md-12">
        <p>{{ $account->name }}</p>
        <p>{{ $account->address }}</p>
    </div>
@stop