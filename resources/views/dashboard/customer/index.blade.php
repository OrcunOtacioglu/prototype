@extends('layouts.dashboard')

@section('title', 'All Customers')

@section('content')
    <div class="panel panel-primary panel-line">

        <div class="panel-heading">
            <h3 class="panel-title">All customers</h3>
        </div>

        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th class="text-nowrap">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->name . ' ' . $customer->surname }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td class="text-nowrap text-center">
                            <div class="row">
                                <a href="#" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                                    <i class="icon wb-wrench" aria-hidden="true"></i>
                                </a>
                                <form action="{{ action('AttendeeController@destroy', ['id' => $customer->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit"
                                            class="btn btn-sm btn-icon btn-flat btn-default"
                                            data-toggle="tooltip"
                                            data-original-title="Delete"
                                    >
                                        <i class="icon wb-close" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop