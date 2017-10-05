@extends('layouts.dashboard')

@section('title', 'Edit Featured Event')

@section('page-header')
    <a href="{{ action('EventController@edit', ['id' => $event->id]) }}" class="btn btn-outline btn-success" data-toggle="tooltip" data-original-title="Back To Event Edit" data-container="body">
        <i class="icon wb-calendar" aria-hidden="true"></i>
        <span class="hidden-sm-down">Back to Event Page</span>
    </a>
@stop

@section('content')
    <form action="{{ action('FeaturedEventController@update', ['id' => $event->id]) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="row">

            <div class="col-md-8">
                <div class="panel panel-primary panel-line">

                    <div class="panel-heading">
                        <h3 class="panel-title">Featured Event Info</h3>
                    </div>

                    <div class="panel-body">

                        <div class="form-group">
                            <label for="featured_title">Featured Event Title</label>
                            <input type="text" class="form-control" name="featured_title" id="featured_title" value="{{ $event->featured_title }}">
                        </div>

                        <img src="/images/featured-images/{{ $event->featured_image }}" alt="" class="img-thumbnail">

                        <div class="form-group">
                            <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                <input type="text" class="form-control" readonly value="{{ $event->featured_image }}">
                                <span class="input-group-btn">
                                    <span class="btn btn-primary btn-file">
                                        <i class="icon wb-upload"></i>
                                        <input type="file" name="featured-image" id="featured-image" value="{{ $event->featured_image }}">
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="panel panel-primary panel-line">
                    
                    <div class="panel-heading">
                        <h3 class="panel-title">Featured Event</h3>
                    </div>
                    
                    <div class="panel-body">

                        <div class="form-group">
                            <label for="is_featured">Is Fetured</label>
                            <select name="is_featured" id="is_featured" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <input type="submit" value="SAVE" class="btn btn-primary">
                    </div>

                </div>
            </div>

        </div>
    </form>
@stop

@section('footer.scripts')
    <script src="{{ asset('assets/js/dashboard/plugins/input-group-file.js') }}"></script>
@stop