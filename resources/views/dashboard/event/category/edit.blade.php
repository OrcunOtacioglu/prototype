@extends('layouts.dashboard')

@section('title', 'EditCategory')

@section('content')
    <div class="panel panel-primary panel-line">
        <div class="panel-heading">
            <h3 class="panel-title">General Info</h3>
        </div>

        <div class="panel-body">
            <form action="{{ action('Util\EventCategoryController@update', ['id' => $category->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
                </div>

                <input type="submit" class="btn btn-primary" value="Update">
            </form>
        </div>
    </div>
@stop