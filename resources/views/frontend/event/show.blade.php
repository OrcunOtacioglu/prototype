@extends('frontend.layout')

@section('title')
    {{ $event->title }}
@stop

@section('content')
    <div style="
            background: url('/images/cover-images/{{ $event->cover_image }}');
            min-height: 350px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            ">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title text-uppercase">{{ $event->title }}</h2>
                <hr>
            </div>
            <div class="col-md-8">
                <p>{{ $event->description }}</p>
            </div>
            <div class="col-md-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($event->ticketTypes as $ticketType)
                            <tr>
                                <td>{{ $ticketType->name }}</td>
                                <td>{{ $ticketType->price }}</td>
                                <td>
                                    <select name="ticketCount" id="ticketCount" class="form-control">
                                        @for($i = $ticketType->min_allowed_per_purchase; $i <= $ticketType->max_allowed_per_purchase; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop