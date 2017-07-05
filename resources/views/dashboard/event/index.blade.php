@extends('dashboard.base')

@section('title', 'Events')

@section('page.top')
    <div class="pull-right">
        <a href="{{ action('EventController@create') }}" class="btn btn-success">Create New Event</a>
    </div>
@stop

@section('content')
    <div class="col-md-12">
        @if(count($events) <= 0)
            <p>There are no events to show!</p>
        @else
            <table id="events" class="dataTable" style="width: 100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
                </thead>

                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->slug }}</td>
                        <td>{{ $event->start_date }}</td>
                        <td>{{ $event->status }}</td>
                        <td>
                            <a href="{{ action('AccountController@edit', ['id' => $event->id]) }}" class="btn btn-primary btn-xs">Edit</a>
                            <a href="#" class="btn btn-default btn-xs">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@stop

@section('footer.scripts')
    <script src="{{ asset('js/plugins/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#events').DataTable();
        });
    </script>
@stop