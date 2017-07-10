@extends('frontend.layout')

@section('title', 'Your Order')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Your Shopping Cart</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Ticket</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->options->event }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->qty * $item->price }}</td>
                            <td>
                                <a href="{{ action('CartController@deleteItem', ['id' => $item->rowId]) }}" class="text-danger">Remove Item</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="4"></td>
                        <td>SUBTOTAL</td>
                        <td>{{ Cart::subtotal() }}</td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td>TAX</td>
                        <td>{{ Cart::tax() }}</td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td>TOTAL</td>
                        <td>{{ Cart::total() }}</td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a href="{{ action('CartController@destroyCart') }}" class="text-danger">Destroy Cart</a>
                    <a href="{{ url('/') }}" class="btn btn-default">Continue Shopping</a>
                    <a href="{{ action('AttendeeController@create') }}" class="btn btn-success">Proceed Checkout</a>
                </div>
            </div>
        </div>
    </div>
@stop