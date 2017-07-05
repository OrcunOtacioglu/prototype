@extends('dashboard.base')

@section('title', 'Create New Event')

@section('content')
    <div class="col-md-12">
        <form action="{{ action('EventController@store') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="accountID" value="{{ $account }}">

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="title">Event Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">Event Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="location">Event Location</label>
                        <input type="text" name="location" id="location" class="form-control">
                    </div>

                    <div class="pull-left">
                        <input type="submit" value="CREATE" class="btn btn-primary">
                        <a href="{{ action('EventController@index') }}">Cancel</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="coverImage">Event Cover Image</label>
                        <input type="file" name="coverImage" id="coverImage">
                    </div>

                    <div class="form-group">
                        <label for="category">Event Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="1">Music</option>
                            <option value="2">Theatre</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="type">Event Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="1">Match</option>
                            <option value="2">Race</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Event Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Draft</option>
                                    <option value="2">Published</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="listing">Event Listing</label>
                                <select name="listing" id="listing" class="form-control">
                                    <option value="1">Public</option>
                                    <option value="2">Special</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for=""startDate>Event Start Date</label>
                        <input type="text" name="startDate" id="startDate" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="endDate">Event End Date</label>
                        <input type="text" name="endDate" id="endDate" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="onSaleDate">Event On Sale Date</label>
                        <input type="text" name="onSaleDate" id="onSaleDate" class="form-control">
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop