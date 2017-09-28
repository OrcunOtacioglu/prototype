@extends('layouts.dashboard')

@section('title', 'Create New Category')

@section('content')
    <div class="panel panel-primary panel-line">
        <div class="panel-heading">
            <h3 class="panel-title">General Info</h3>
        </div>

        <div class="panel-body">
            <form action="{{ action('Util\EventCategoryController@store') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <input type="submit" class="btn btn-primary" value="Save">
            </form>
        </div>
    </div>
@stop