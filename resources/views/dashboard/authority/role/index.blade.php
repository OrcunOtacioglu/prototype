@extends('dashboard.base')

@section('title', 'Roles')

@section('page.top')
    <div class="pull-right">
        <a href="{{ action('Authority\RoleController@create') }}" class="btn btn-success">Create New Role</a>
    </div>
@stop

@section('content')
    <div class="col-md-12">
        @if(count($roles) <= 0)
            <p>There are no accounts to show!</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Level</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->title }}</td>
                        <td>{{ $role->level }}</td>
                        <td>
                            <a href="{{ action('Authority\RoleController@edit', ['id' => $role->id]) }}" class="btn btn-primary btn-xs">Edit</a>
                            <form action="{{ action('Authority\RoleController@destroy', ['id' => $role->id]) }}" method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-default btn-xs" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@stop