@extends('dashboard.base')

@section('content')
    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h2 class="panel-title">Total Sales Volume</h2>
            </div>
            <div class="panel-body">
                <p><strong>{{ $total }} TL</strong></p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="panel-title">Latest Sales</h2>
            </div>

            <div class="panel-body">
                <p>Here you can see the latest sales!</p>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Event</th>
                        <th>Attendee</th>
                        <th>Operation Date</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td>{{ $sale->transaction_id }}</td>
                            <td>{{ $sale->event->title }}</td>
                            <td>{{ $sale->attendee->name }}</td>
                            <td>{{ $sale->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop