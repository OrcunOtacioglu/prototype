@extends('dashboard.base')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-datetimepicker.min.css') }}">
@stop

@section('title', 'Create New Event')

@section('content')
    <div class="col-md-12">
        <form action="{{ action('EventController@store') }}" method="POST" enctype="multipart/form-data">
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
                            @foreach(\App\Models\Util\EventCategory::all() as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
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
                        <label for="startDate">Event Start Date</label>
                        <div class="input-group">
                            <input type="text" name="startDate" id="startDate" class="form-control">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="endDate">Event End Date</label>
                        <div class="input-group">
                            <input type="text" name="endDate" id="endDate" class="form-control">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="onSaleDate">Event On Sale Date</label>
                        <div class="input-group">
                            <input type="text" name="onSaleDate" id="onSaleDate" class="form-control">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop

@section('footer.scripts')
    <script src="{{ asset('js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $('#startDate').datetimepicker({
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1,
            minuteStep: 10
        });
        $('#endDate').datetimepicker({
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1,
            minuteStep: 10
        });
        $('#onSaleDate').datetimepicker({
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1,
            minuteStep: 10
        });
    </script>
@stop