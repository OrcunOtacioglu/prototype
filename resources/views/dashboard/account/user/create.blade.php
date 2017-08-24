@extends('dashboard.base')

@section('title', 'Create New User')

@section('content')
    <div class="col-md-12">
        <form action="{{ action('UserController@store') }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="username">Name</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" id="password" class="form-control">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="accountID">Account</label>
                        <select name="accountID" id="accountID" class="form-control">
                            @foreach($accounts as $account)
                                <option value="{{ $account->id }}">{{ $account->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="roleID">Role</label>
                        <select name="roleID" id="roleID" class="form-control">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <input type="submit" class="btn btn-primary" value="Create">
        </form>
    </div>
@stop