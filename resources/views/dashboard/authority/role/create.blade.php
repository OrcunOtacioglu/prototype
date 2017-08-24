@extends('dashboard.base')

@section('title', 'Create New Role')

@section('content')
    <div class="col-md-12">
        <form action="{{ action('Authority\RoleController@store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="roleName">Role Name</label>
                <input type="text" name="roleName" id="roleName" class="form-control">
            </div>

            <div class="form-group">
                <label for="roleLevel">Role Level</label>
                <select name="roleLevel" id="roleLevel" class="form-control">
                    @for($i = 0; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <input type="submit" class="btn btn-primary" value="Create">
        </form>
    </div>
@stop