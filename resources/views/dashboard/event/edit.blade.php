@extends('layouts.dashboard')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap-datetimepicker.min.css') }}">
@stop

@section('title', 'Edit Event')

@section('page-header')
    <a href="{{ action('EventController@show', ['slug' => $event->slug]) }}" class="btn btn-outline btn-success" data-toggle="tooltip" data-original-title="See Event Page" data-container="body">
        <i class="icon wb-eye" aria-hidden="true"></i>
        <span class="hidden-sm-down">See Event</span>
    </a>
@stop

@section('content')

    <form action="{{ action('EventController@update', ['id' => $event->id]) }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" name="title" id="title" value="{{ $event->title }}">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{ $event->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="location" id="location" value="{{ $event->location }}">
                        </div>

                        <input type="submit" value="UPDATE" class="btn btn-success">
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
                                            <option value="{{ $category->id }}"
                                                @if($category->id === $event->event_category_id)
                                                    selected
                                                @endif
                                            >{{ $category->name }}</option>
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
                                        <option value="0">Draft</option>
                                        <option value="1">Published</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="listing">Listing</label>
                                    <select name="listing" id="listing" class="form-control">
                                        <option value="0">Private</option>
                                        <option value="1">Public</option>
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

                        <div class="form-group">
                            <label for="startDate">Start Date</label>
                            <div class="input-group">
                                <input type="text" name="startDate" id="startDate" class="form-control" value="{{ $event->start_date }}">
                                <div class="input-group-addon">
                                    <i class="icon wb-calendar"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="endDate">End Date</label>
                            <div class="input-group">
                                <input type="text" name="endDate" id="endDate" class="form-control" value="{{ $event->end_date }}">
                                <div class="input-group-addon">
                                    <i class="icon wb-calendar"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="onSaleDate">On Sale Date</label>
                            <div class="input-group">
                                <input type="text" name="onSaleDate" id="onSaleDate" class="form-control" value="{{ $event->on_sale_date }}">
                                <div class="input-group-addon">
                                    <i class="icon wb-calendar"></i>
                                </div>
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