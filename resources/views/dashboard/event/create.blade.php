@extends('layouts.dashboard')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap-datetimepicker.min.css') }}">
@stop

@section('title', 'Create New Event')

@section('content')

    <form action="{{ action('EventController@store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-primary panel-line">

                    <div class="panel-heading">
                        <h3 class="panel-title">General Info</h3>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>

                        <div class="form-group">
                            <label for="slug">URL Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="Can be left blank if the event-title is unique.">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" name="location" id="location">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" name="price" id="price">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="startDate">Start Date</label>
                                    <div class="input-group">
                                        <input type="text" name="startDate" id="startDate" class="form-control">
                                        <div class="input-group-addon">
                                            <i class="icon wb-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endDate">End Date</label>
                                    <div class="input-group">
                                        <input type="text" name="endDate" id="endDate" class="form-control">
                                        <div class="input-group-addon">
                                            <i class="icon wb-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="onSaleDate">On Sale Date</label>
                                    <div class="input-group">
                                        <input type="text" name="onSaleDate" id="onSaleDate" class="form-control">
                                        <div class="input-group-addon">
                                            <i class="icon wb-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="submit" value="CREATE" class="btn btn-success">
                        <a class="text-danger" href="{{ action('EventController@index') }}">Cancel</a>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-primary panel-line">

                    <div class="panel-heading">
                        <h3 class="panel-title">Event Configuration</h3>
                    </div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control">
                                        @foreach(\App\Models\Util\EventCategory::all() as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="featured">Featured Event</label>
                                    <select name="featured" id="featured" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Published</option>
                                        <option value="0">Draft</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="listing">Listing</label>
                                    <select name="listing" id="listing" class="form-control">
                                        <option value="0">Public</option>
                                        <option value="1">Private</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                <input type="text" class="form-control" readonly>
                                <span class="input-group-btn">
                                    <span class="btn btn-primary btn-file">
                                        <i class="icon wb-upload"></i>
                                        <input type="file" name="coverImage" id="coverImage">
                                    </span>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="panel panel-primary panel-line">

                    <div class="panel-heading">
                        <h3 class="panel-title">Event HomePage Info</h3>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="small_title">HomePage Title</label>
                            <input type="text" class="form-control" name="small_title" id="small_title">
                        </div>

                        <div class="form-group">
                            <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                <input type="text" class="form-control" readonly>
                                <span class="input-group-btn">
                                    <span class="btn btn-primary btn-file">
                                        <i class="icon wb-upload"></i>
                                        <input type="file" name="small_image" id="small_image">
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>

@stop

@section('footer.scripts')
    <script src="{{ asset('assets/js/dashboard/plugins/input-group-file.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/plugins/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/plugins/bootstrap-datetimepicker.tr.js') }}" charset="UTF-8"></script>
    <script>
        $('#startDate').datetimepicker({
            weekStart: 0,
            autoclose: true,
            startView: 'month',
            minView: 'hour',
            maxView: 'decade',
            todayBtn: true,
            todayHighlight: true,
            language: 'tr',
            minuteStep: 15,
            showMeridian: false
        });
        $('#endDate').datetimepicker({
            weekStart: 0,
            autoclose: true,
            startView: 'month',
            minView: 'hour',
            maxView: 'decade',
            todayBtn: true,
            todayHighlight: true,
            language: 'tr',
            minuteStep: 15,
            showMeridian: false
        });
        $('#onSaleDate').datetimepicker({
            weekStart: 0,
            autoclose: true,
            startView: 'month',
            minView: 'hour',
            maxView: 'decade',
            todayBtn: true,
            todayHighlight: true,
            language: 'tr',
            minuteStep: 15,
            showMeridian: false
        });
    </script>
@stop