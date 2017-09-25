@extends('layouts.dashboard')

@section('title', 'Edit User')

@section('content')
    <form action="{{ action('UserController@update') }}" method="POST">
        {{ csrf_field() }}
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" value="{{ $user->password }}">
                    </div>

                    <div class="form-group">
                        <label for="role_id">Role</label>
                        <select name="role_id" id="role_id" class="form-control">
                            @foreach(\App\Models\Authority\Role::all() as $role)
                                <option value="{{ $role->id }}">$role->title</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="submit" value="Create" class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>
@stop