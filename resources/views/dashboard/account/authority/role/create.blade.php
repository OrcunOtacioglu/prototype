@extends('layouts.dashboard')

@section('title', 'Create New Role')

@section('content')
    <form action="{{ action('Authority\RoleController@store') }}" method="POST">
        {{ csrf_field() }}
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="roleName">Name</label>
                        <input type="text" name="roleName" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="roleLevel">Level</label>
                        <input type="text" name="roleLevel" class="form-control">
                    </div>

                    <input type="submit" value="Create" class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>
@stop