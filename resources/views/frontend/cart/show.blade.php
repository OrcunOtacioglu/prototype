@extends('frontend.layout')

@section('title', 'Your Order')

@section('content')
    <div style="
            background: url('/images/cover-images/coverBG.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            min-height: 450px;
            margin-bottom: 50px;
            ">
        <div style="
            background: rgba(0,0,0,0.4);
            display: block;
            z-index: 100;
            height: 100% !important;
            min-height: 450px;
        "></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Payment Details</h2>
                    </div>

                    <div class="panel-body">
                        @foreach($items as $item)
                            <p><strong>{{ $item->options->event }}</strong></p>
                            <p>{{ $item->name }} x {{ $item->qty }}</p>
                            <a href="{{ action('CartController@deleteItem', ['id' => $item->rowId]) }}" class="text-danger">Remove</a>
                        @endforeach

                        <hr>
                        <p><strong>Subtotal {{ Cart::subtotal() }}</strong></p>
                        <p><strong>Tax {{ Cart::tax() }}</strong></p>
                    </div>
                    
                    <div class="panel-footer text-center">
                        <p><strong>TOTAL {{ Cart::total() }}</strong></p>
                        <a href="{{ action('CartController@proceed') }}" class="btn btn-block btn-success">Proceed Checkout</a>
                        <a href="{{ action('CartController@destroyCart') }}" class="text-danger" style="font-size: 12px;">Destroy Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Attendee Information</h2>
                    </div>

                    <div class="panel-body">
                        <form action="#" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="control-label">Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                     </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="control-label">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop