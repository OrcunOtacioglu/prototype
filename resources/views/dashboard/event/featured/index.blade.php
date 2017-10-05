@extends('layouts.dashboard')

@section('title', 'Manage Featured Events')

@section('content')
    <div class="panel panel-primary panel-line">

        <div class="panel-heading">
            <h3 class="panel-title">Manage Featured Events</h3>
        </div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Featured Image</th>
                    <th>Related Event</th>
                    <th class="text-nowrap">Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td width="250">
                            <img src="/images/featured-images/{{ $event->featured_image }}" alt="" class="img-thumbnail">
                        </td>
                        <td>{{ $event->title }}</td>
                        <td>
                            <a href="{{ action('FeaturedEventController@edit', ['id' => $event->id]) }}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                                <i class="icon wb-wrench" aria-hidden="true"></i>
                            </a>
                            <form action="{{ action('FeaturedEventController@edit', ['id' => $event->id]) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" href="{{ action('FeaturedEventController@destroy', ['id' => $event->id]) }}"
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