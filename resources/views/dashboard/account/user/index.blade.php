@extends('dashboard.base')

@section('title', 'Manage Users and Permissions')

@section('page.top')
    <div class="pull-right">
        <a href="{{ action('Authority\RoleController@create') }}" class="btn btn-default">Create New Role</a>
        <a href="{{ action('UserController@create') }}" class="btn btn-default">Create New User</a>
    </div>
@stop

@section('content')
    <div class="col-md-12">
        @if(count($users) <= 0)
            <p>There are no accounts to show!</p>
        @else
            <table id="accounts" class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Account</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->account->name }}</td>
                        <td>{{ $user->role->title }}</td>
                        <td>
                            <a href="{{ action('UserController@edit', ['id' => $user->id]) }}" class="btn btn-primary btn-xs">Edit</a>
                            <form action="{{ action('AccountController@destroy', ['id' => $user->id]) }}" method="post">
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