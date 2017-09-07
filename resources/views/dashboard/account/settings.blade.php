@extends('dashboard.base')

@section('title', 'Account Settings')

@section('content')
    <form action="{{ action('AccountController@update', ['id' => $account->id]) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="col-md-6">
            <h3>General Settings</h3>

            <div class="form-group">
                <label for="name">Company Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $account->name }}">
            </div>

            <div class="form-group">
                <label for="address">Company Address</label>
                <textarea name="address" id="address" cols="30" rows="2" class="form-control">{{ $account->address }}</textarea>
            </div>

            <div class="form-group">
                <label for="postalCode">Company Postal Code</label>
                <input type="text" name="postalCode" id="postalCode" class="form-control" value="{{ $account->postal_code }}">
            </div>

            <div class="form-group">
                <label for="country">Company Country</label>
                <select name="country" id="country" class="form-control">
                    @foreach($countries as $country)
                        <option @if($account->country === $country['cca3']) selected @endif
                                value="{{ $country['cca3'] }}">{{ $country['name']['common'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="about">About The Company</label>
                <textarea name="about" id="about" cols="30" rows="3" class="form-control">{{ $account->about }}</textarea>
            </div>

            <div class="form-group">
                <label for="website">Company Website</label>
                <input type="text" name="website" id="website" class="form-control" value="{{ $account->website }}">
            </div>

            <div class="form-group">
                <label for="facebook">Company Facebook Page</label>
                <input type="text" name="facebook" id="facebook" class="form-control" value="{{ $account->facebook_page }}">
            </div>

            <div class="form-group">
                <label for="twitter">Company Twitter Page</label>
                <input type="text" name="twitter" id="twitter" class="form-control" value="{{ $account->twitter_page }}">
            </div>

            <div class="form-group">
                <label for="phone">Company Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $account->phone }}">
            </div>

            <img src="/images/profile-images/{{ $account->profile_image }}" alt="" class="img-responsive">
            <div class="form-group">
                <label for="profileImage">Company Profile Image</label>
                <input type="file" name="profileImage" id="profileImage">
            </div>
        </div>
        <div class="col-md-6">
            <h3>Payment Settings</h3>
        </div>
    </form>
@stop