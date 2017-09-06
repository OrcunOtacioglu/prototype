@extends('dashboard.base')

@section('title', 'Invoices')

@section('content')
    <div class="col-md-12">
        @if(count($invoices) <= 0)
            <p>There are no invoices to show!</p>
        @else
            <table id="events" class="table">
                <thead>
                <tr>
                    <th>Invoice ID</th>
                    <th>Attendee</th>
                    <th>Event</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->transaction_id }}</td>
                        <td>{{ $invoice->customer_name }}</td>
                        <td>{{ $invoice->event_name }}</td>
                        <td>{{ $invoice->total }}</td>
                        <td>
                            <a href="{{ action('Finance\InvoiceController@show', ['id' => $invoice->transaction_id]) }}" class="btn btn-primary btn-xs">Edit</a>
                            <a href="#" class="btn btn-default btn-xs">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@stop