@extends('layouts.dashboard')

@section('title', 'Manage Your Events')

@section('page-header')
    <a href="{{ action('EventController@create') }}" class="btn btn-outline btn-success" data-toggle="tooltip" data-original-title="Create New Event" data-container="body">
        <i class="icon wb-plus" aria-hidden="true"></i>
        <span class="hidden-sm-down">New Event</span>
    </a>
    <a href="#" class="btn btn-outline btn-success" data-toggle="tooltip" data-original-title="Featured Events" data-container="body">
        <i class="icon wb-star" aria-hidden="true"></i>
        <span class="hidden-sm-down">Featured Events</span>
    </a>
@stop

@section('content')
    <div class="panel panel-primary panel-line">

        <div class="panel-heading">
            <h3 class="panel-title">All Your Events</h3>
        </div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th class="text-nowrap">Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->start_date }}</td>
                        <td>{{ $event->status }}</td>
                        <td class="text-nowrap">
                            <a href="{{ action('EventController@edit', ['id' => $event->id]) }}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                                <i class="icon wb-wrench" aria-hidden="true"></i>
                            </a>
                            <form action="{{ action('EventController@destroy', ['id' => $event->id]) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" href="{{ action('EventController@destroy', ['id' => $event->id]) }}"
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