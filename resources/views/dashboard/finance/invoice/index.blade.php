@extends('layouts.dashboard')

@section('title', 'Manage All Invoices')

@section('content')
    <div class="panel panel-primary panel-line">

        <div class="panel-heading">
            <h3 class="panel-title">All Your Invoices</h3>
        </div>

        <div class="panel-body">
            @if($invoices->count() <= 0)
                <div class="alert alert-alt alert-danger alert-dismissible" role="alert">
                    <p>There are no invoices yet!</p>
                </div>
            @else
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th class="text-nowrap">Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->transaction_id }}</td>
                            <td>{{ $invoice->updated_at }}</td>
                            <td>{{ $invoice->attendee->name }}</td>
                            <td>
                                <a href="{{ action('Finance\InvoiceController@edit', ['id' => $invoice->id]) }}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                                    <i class="icon wb-wrench" aria-hidden="true"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Delete">
                                    <i class="icon wb-close" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>
@stop