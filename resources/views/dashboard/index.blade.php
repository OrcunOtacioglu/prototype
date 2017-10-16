@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('body.class', 'site-menubar-fold site-menubar-keep')

@section('content')
    <div class="row">

        <div class="col-md-4">
            <div class="card card-shadow">
                <div class="card-block bg-white p-20">
                    <button type="button" class="btn btn-floating btn-sm btn-warning">
                        <i class="icon wb-shopping-cart"></i>
                    </button>
                    <span class="ml-15 font-weight-400">ORDERS</span>
                    <div class="content-text text-center mb-0">
                        <span class="font-size-40 font-weight-100">{{ $sales->count() }}</span>
                        <p class="blue-grey-400 font-weight-100 m-0">Total sales count on previous month</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-shadow">
                <div class="card-block bg-white p-20">
                    <button type="button" class="btn btn-floating btn-sm btn-danger">
                        <i class="icon wb-stats-bars"></i>
                    </button>
                    <span class="ml-15 font-weight-400">INCOME</span>
                    <div class="content-text text-center mb-0">
                        <span class="font-size-40 font-weight-100">{{ \Acikgise\Helpers\Helpers::calculateTotalIncome($sales) }} TL</span>
                        <p class="blue-grey-400 font-weight-100 m-0">Total income on previous month</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-shadow">
                <div class="card-block bg-white p-20">
                    <button type="button" class="btn btn-floating btn-sm btn-success">
                        <i class="icon wb-user"></i>
                    </button>
                    <span class="ml-15 font-weight-400">CUSTOMERS</span>
                    <div class="content-text text-center mb-0">
                        <span class="font-size-40 font-weight-100">{{ $customers->count() }}</span>
                        <p class="blue-grey-400 font-weight-100 m-0">Total signed up customers on previous month</p>
                        <small><a href="{{ action('AttendeeController@index') }}">See All</a></small>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-shadow table-row">
                <div class="card-header card-header-transparent py-20">
                    <h4>Recent Orders</h4>
                </div>
                <div class="card-block bg-white table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Event</th>
                            <th>Customer</th>
                            <th>Purchased On</th>
                            <th>Transaction ID</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sales->forPage(1, 10) as $sale)
                            <tr>
                                <td>
                                    <img src="/images/small-images/{{ $sale->event->small_image }}" alt="">
                                </td>
                                <td>{{ $sale->event->title }}</td>
                                <td>{{ $sale->attendee->name }}</td>
                                <td>{{ \Acikgise\Helpers\Helpers::getTurkishTime($sale->updated_at) }}</td>
                                <td>{{ $sale->reference }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-shadow table-row">
                <div class="card-header card-header-transparent py-20">
                    <h4>Recent Events</h4>
                </div>
                <div class="card-block bg-white table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Event</th>
                            <th>On Sale Date</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events->forPage(1, 10) as $event)
                            <tr>
                                <td>
                                    <img src="/images/small-images/{{ $event->small_image }}" alt="">
                                </td>
                                <td>{{ $event->title }}</td>
                                <td>{{ \Acikgise\Helpers\Helpers::getTurkishTime($event->on_sale_date) }}</td>
                                <td>{{ $event->price }} TL</td>
                                <td>
                                    <a href="{{ action('EventController@edit', ['id' => $event->id]) }}" class="btn btn-xs btn-default">
                                        <i class="icon wb-wrench"></i> Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop