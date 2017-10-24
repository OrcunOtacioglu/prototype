@extends('layouts.dashboard')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap-datetimepicker.min.css') }}">
@stop

@section('title', 'Edit Event')

@section('page-header')
    <a href="{{ action('EventController@show', ['slug' => $event->slug]) }}" target="_blank" class="btn btn-outline btn-success" data-toggle="tooltip" data-original-title="See Event Page" data-container="body">
        <i class="icon wb-eye" aria-hidden="true"></i>
        <span class="hidden-sm-down">See Event</span>
    </a>
    @if($event->is_featured)
        <a href="{{ action('FeaturedEventController@edit', ['id' => $event->id]) }}" class="btn btn-outline btn-success" data-toggle="tooltip" data-original-title="Manage Featured Options" data-container="body">
            <i class="icon wb-star-outline" aria-hidden="true"></i>
            <span class="hidden-sm-down">Manage Featured Event</span>
        </a>
    @endif
@stop

@section('content')

    <!-- EVENT FORM -->
    <form action="{{ action('EventController@update', ['id' => $event->id]) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">

            <!-- EVENT GENERAL INFO -->
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
                            <label for="slug">URL Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug" value="{{ $event->slug }}">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{ $event->description }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" name="location" id="location" value="{{ $event->location }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" name="price" id="price" value="{{ $event->price }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="startDate">Start Date</label>
                                    <div class="input-group">
                                        <input type="text" name="startDate" id="startDate" class="form-control" value="{{ $event->start_date }}">
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
                                        <input type="text" name="endDate" id="endDate" class="form-control" value="{{ $event->end_date }}">
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
                                        <input type="text" name="onSaleDate" id="onSaleDate" class="form-control" value="{{ $event->on_sale_date }}">
                                        <div class="input-group-addon">
                                            <i class="icon wb-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="submit" value="UPDATE" class="btn btn-sm btn-success">
                        <a class="text-danger" href="{{ action('EventController@index') }}">Cancel</a>
                    </div>

                </div>
            </div>
            <!-- END GENERAL INFO -->

            <!-- EVENT CONFIGURATION -->
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
                                        <option value="0" @if(!$event->is_featured)
                                            selected
                                                @endif>No</option>
                                        <option value="1" @if($event->is_featured)
                                            selected
                                        @endif>Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" @if($event->status)
                                            selected
                                        @endif>Published</option>
                                        <option value="0" @if(!$event->status)
                                            selected
                                        @endif>Draft</option>
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

                        <img src="/images/cover-images/{{ $event->cover_image }}" alt="" class="img-thumbnail">

                        <div class="form-group">
                            <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                <input type="text" class="form-control" readonly value="{{ $event->cover_image }}">
                                <span class="input-group-btn">
                                    <span class="btn btn-primary btn-file">
                                        <i class="icon wb-upload"></i>
                                        <input type="file" name="coverImage" id="coverImage" value="{{ $event->cover_image }}">
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
                            <input type="text" class="form-control" name="small_title" id="small_title" value="{{ $event->small_title }}">
                        </div>

                        <img src="/images/small-images/{{ $event->small_image }}" alt="" class="img-thumbnail">

                        <div class="form-group">
                            <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                <input type="text" class="form-control" readonly value="{{ $event->small_image }}">
                                <span class="input-group-btn">
                                    <span class="btn btn-primary btn-file">
                                        <i class="icon wb-upload"></i>
                                        <input type="file" name="small_image" id="small_image" value="{{ $event->small_image }}">
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END EVENT CONFIGURATION -->

        </div>
    </form>
    <!-- END EVENT FORM -->
    
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