@extends('dashboard.base')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-datetimepicker.min.css') }}">
@stop

@section('title')
    {{ $event->title }}
@stop

@section('page.top')
    <div class="pull-right">
        <a href="{{ action('EventController@show', ['slug' => $event->slug]) }}" class="btn btn-default">
            <span class="fa fa-eye"></span> See Event Page
        </a>
    </div>
@stop

@section('content')
    <div class="col-md-12">
        <form action="{{ action('EventController@update', ['id' => $event->id]) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="title">Event Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Event Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $event->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="location">Event Location</label>
                        <input type="text" name="location" id="location" class="form-control" value="{{ $event->location }}">
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="startDate">Event Start Date</label>
                                <div class="input-group">
                                    <input type="text" name="startDate" id="startDate" class="form-control" value="{{ $event->start_date }}">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="endDate">Event End Date</label>
                                <div class="input-group">
                                    <input type="text" name="endDate" id="endDate" class="form-control" value="{{ $event->end_date }}">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="onSaleDate">Event On Sale Date</label>
                                <div class="input-group">
                                    <input type="text" name="onSaleDate" id="onSaleDate" class="form-control" value="{{ $event->on_sale_date }}">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pull-left">
                        <input type="submit" value="UPDATE" class="btn btn-primary">
                        <a href="{{ action('EventController@index') }}">Cancel</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <img src="/images/cover-images/{{ $event->cover_image }}" alt="" class="img-responsive">
                    <div class="form-group">
                        <label for="coverImage">Event Cover Image</label>
                        <input type="file" name="coverImage" id="coverImage" value="{{ $event->cover_image }}">
                    </div>

                    <div class="form-group">
                        <label for="category">Event Category</label>
                        <select name="category" id="category" class="form-control">
                            @foreach(\App\Models\Util\EventCategory::all() as $category)
                                <option
                                        @if($event->event_category_id == $category->id)
                                            selected
                                        @endif
                                        value="{{ $category->id }}">{{ $category->name }}</option>
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
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-12">
        <hr>
    </div>

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                @if(count($event->ticketTypes) <= 0)
                    <div class="alert alert-danger" role="alert">
                        <p>There are no rates! Please create on right</p>
                    </div>
                @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Availability</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($event->ticketTypes as $ticketType)
                                <tr>
                                    <td>{{ $ticketType->name }}</td>
                                    <td>{{ $ticketType->price }}</td>
                                    <td>{{ $ticketType->quantity_available }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <div class="col-md-4">
                <button type="button" class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#ticketType">
                    Create Rate
                </button>
            </div>
        </div>
    </div>

    @include('dashboard.ticketType.create')
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
        $('#rateStartDate').datetimepicker({
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1,
            minuteStep: 10
        });
        $('#rateEndDate').datetimepicker({
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
    <script>
        $('#ticketType').modal({
            show: false
        });
    </script>
@stop