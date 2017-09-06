@extends('dashboard.base')

@section('title')
    Edit {{ $role->title }}
@stop

@section('content')
    <div class="col-md-12">
        <form action="{{ action('Authority\RoleController@store') }}" method="POST">
            <div class="form-group">
                <label for="name">Role Name</label>
                <input type="text" name="name" id="roleName" class="form-control" value="{{ $role->name }}">
            </div>

            <div class="form-group">
                <label for="roleLevel">Role Level</label>
                <select name="roleLevel" id="roleLevel" class="form-control">
                    @for($i = 0; $i <= 5; $i++)
                        <option value="{{ $i }}"
                            @if($role->level === $i)
                                selected
                            @endif>{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <input type="submit" class="btn btn-primary" value="Update">
        </form>
    </div>
@stop