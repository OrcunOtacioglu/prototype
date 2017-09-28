@extends('layouts.dashboard')

@section('title', 'Manage Your Slider')

@section('page-header')
    <a href="{{ action('SliderController@create') }}" class="btn btn-outline btn-success" data-toggle="tooltip" data-original-title="Create New Slider" data-container="body">
        <i class="icon wb-plus" aria-hidden="true"></i>
        <span class="hidden-sm-down">New Slider</span>
    </a>
@stop

@section('content')
    <div class="panel panel-primary panel-line">

        <div class="panel-heading">
            <h3 class="panel-title">All Your Sliders</h3>
        </div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Event</th>
                    <th class="text-nowrap">Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($slides as $slide)
                    <tr>
                        <td>
                            <img src="{{ env('APP_URL') }}/images/slider-images/{{ $slide->img_path }}" alt="" class="img-thumbnail">
                        </td>
                        <td>{{ $slide->event->title }}</td>
                        <td class="text-nowrap">
                            <a href="{{ action('SliderController@edit', ['id' => $slide->id]) }}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                                <i class="icon wb-wrench" aria-hidden="true"></i>
                            </a>
                            <form action="{{ action('SliderController@destroy', ['id' => $slide->id]) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit"
                                        class="btn btn-sm btn-icon btn-flat btn-default"
                                        data-toggle="tooltip"
                                        data-original-title="Delete"
                                >
                                    <i class="icon wb-close" aria-hidden="true"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop