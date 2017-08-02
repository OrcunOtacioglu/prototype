@extends('dashboard.base')

@section('title', 'Edit Account')

@section('content')

    <form action="{{ action('AccountController@update', ['id' => $account->id]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                    <label for="name">Account Name</label>
                    <input type="text" name="name" id="name" value="{{ $account->name }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="address">Company Address</label>
                    <textarea name="address" id="address" cols="30" rows="2" class="form-control">{{ $account->address }}</textarea>
                </div>

                <div class="form-group">
                    <label for="city">Company City</label>
                    <input type="text" name="city" id="city" value="{{ $account->city }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="postalCode">Company Postal Code</label>
                    <input type="text" name="postalCode" id="postalCode" value="{{ $account->postal_code }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="country">Company Country</label>
                    <input type="text" name="country" id="country" value="{{ $account->country }}" class="form-control">
                </div>

            </div>
            <div class="col-md-6">

                <div class="form-group">
                    <label for="about">About Company</label>
                    <textarea name="about" id="about" cols="30" rows="2" class="form-control">{{ $account->about }}</textarea>
                </div>

                <div class="form-group">
                    <label for="website">Company Website</label>
                    <input type="text" name="website" id="website" value="{{ $account->website }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="facebookPage">Company Facebook Page</label>
                    <input type="text" name="facebookPage" id="facebookPage" value="{{ $account->facebook_page }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="twitterPage">Company Twitter Page</label>
                    <input type="text" name="twitterPage" id="twitterPage" value="{{ $account->twitter_page }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="phone">Company Phone Number</label>
                    <input type="text" name="phone" id="phone" value="{{ $account->phone }}" class="form-control">
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <input type="submit" value="Update" class="btn btn-primary">
                <a href="{{ action('AccountController@index') }}">Cancel</a>
            </div>
        </div>
    </form>
    <hr>
    <div class="row">
        <div class="col-md-6">
            @if(empty($gateways))
                <div class="alert alert-danger" role="alert">
                    <p>There is no defined payment gateway!</p>
                </div>
            @else
                @foreach($gateways as $gateway)
                    <p>{{ $gateway->provider_name }}</p>
                @endforeach
            @endif
        </div>
        <div class="col-md-6">
            <!-- @TODO Refactor the code -->
            <form action="{{ action('AccountController@addGateway') }}" method="POST">
                {{ csrf_field() }}
                @foreach(\App\Models\PaymentGateway::all() as $paymentGateway)
                    <div class="form-group">
                        <label for="provider">Select Your Provider</label>
                        <select name="provider" id="provider" class="form-control">
                            <option value="{{ $paymentGateway->id }}">{{ $paymentGateway->provider_name }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="apiKey">Set Your API Key</label>
                        <input type="text" name="apiKey" id="apiKey" class="form-control" value="{{ $paymentGateway->default_config }}">
                    </div>
                @endforeach

                <input type="hidden" name="accountId" value="{{ $account->id }}">
                <input type="submit" class="btn btn-success" value="Save Changes">
            </form>
        </div>
    </div>
@stop