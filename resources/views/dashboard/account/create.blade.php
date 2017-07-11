@extends('dashboard.base')

@section('title', 'Create New Account')

@section('content')
    <div class="col-md-12">
        <form action="{{ action('AccountController@store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">
                        <label for="name">Account Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="address">Company Address</label>
                        <textarea name="address" id="address" cols="30" rows="2" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="city">Company City</label>
                        <input type="text" name="city" id="city" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="postalCode">Company Postal Code</label>
                        <input type="text" name="postalCode" id="postalCode" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="country">Company Country</label>
                        <input type="text" name="country" id="country" class="form-control">
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">
                        <label for="about">About Company</label>
                        <textarea name="about" id="about" cols="30" rows="2" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="website">Company Website</label>
                        <input type="text" name="website" id="website" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="facebookPage">Company Facebook Page</label>
                        <input type="text" name="facebookPage" id="facebookPage" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="twitterPage">Company Twitter Page</label>
                        <input type="text" name="twitterPage" id="twitterPage" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="phone">Company Phone Number</label>
                        <input type="text" name="phone" id="phone" class="form-control">
                    </div>

                    <img src="/images/profile-images/{{ $account->profile_image }}" alt="" class="img-responsive">
                    <div class="form-group">
                        <label for="profileImage">Company Profile Image</label>
                        <input type="file" name="profileImage" id="profileImage">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4">
                    <input type="submit" value="Create" class="btn btn-primary">
                    <a href="{{ action('AccountController@index') }}">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@stop