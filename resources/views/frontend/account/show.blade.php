@extends('frontend.layout')

@section('title', 'Account')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $attendee->name }}</h1>
                <p>{{ $attendee->email }}</p>
            </div>

            <div class="col-md-4">
                @if(\Gloudemans\Shoppingcart\Facades\Cart::count() > 0)
                    <h2>Your Order</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Event</th>
                                <th>Ticket</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $item)
                                <tr>
                                    <td>{{ $item->options->event }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ $item->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"></td>
                                <td>SUBTOTAL</td>
                                <td>{{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td>TAX</td>
                                <td>{{ \Gloudemans\Shoppingcart\Facades\Cart::tax() }}</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td>TOTAL</td>
                                <td>{{ \Gloudemans\Shoppingcart\Facades\Cart::total() }}</td>
                            </tr>
                        </tfoot>
                    </table>
                    <a href="#" class="btn btn-block btn-success">Pay Now</a>
                @endif
            </div>
        </div>
    </div>
@stop