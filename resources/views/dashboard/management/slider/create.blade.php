@extends('layouts.dashboard')

@section('title', 'Create New Slider')

@section('content')

    <form action="{{ action('SliderController@store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-primary panel-line">

                    <div class="panel-heading">
                        <h3 class="panel-title">General Info</h3>
                    </div>

                    <div class="panel-body">

                        <div class="form-group">
                            <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                <input type="text" class="form-control" readonly>
                                <span class="input-group-btn">
                                    <span class="btn btn-primary btn-file">
                                        <i class="icon wb-upload"></i>
                                        <input type="file" name="slider_bg" id="slider_bg">
                                    </span>
                                </span>
                            </div>
                        </div>

                        <input type="submit" value="CREATE" class="btn btn-success">
                        <a class="text-danger" href="{{ action('SliderController@index') }}">Cancel</a>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-primary panel-line">

                    <div class="panel-heading">
                        <h3 class="panel-title">Slider Configuration</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="event_id">Related Event</label>
                                <select name="event_id" id="event_id" class="form-control">
                                    @foreach(\App\Models\Event::all() as $event)
                                        <option value="{{ $event->id }}">{{ $event->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="x_placement">Horizontal Position</label>
                                    <select name="x_placement" id="x_placement" class="form-control">
                                        <option value="center">Center</option>
                                        <option value="left">Left</option>
                                        <option value="right">Right</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="y_placement">Vertical Position</label>
                                    <select name="y_placement" id="y_placement" class="form-control">
                                        <option value="bottom">Bottom</option>
                                        <option value="center">Middle</option>
                                        <option value="top">Top</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="x_offset">Horizontal Offset</label>
                                    <input type="text" name="x_offset" id="x_offset" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="y_offset">Vertical Offset</label>
                                    <input type="text" name="y_offset" id="y_offset" class="form-control" value="-50">
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
@stop