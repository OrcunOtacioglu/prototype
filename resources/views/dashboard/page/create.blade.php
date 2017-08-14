@extends('dashboard.base')

@section('title', 'Create New Page')

@section('content')
    <div class="col-md-12">
        <form action="{{ action('Util\PageController@store') }}" method="POST" >
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Page Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="pageContent">Page Content</label>
                <textarea name="pageContent" id="pageContent" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <input type="submit" class="btn btn-success" value="Create">
            <a href="{{ action('Util\PageController@index') }}">Cancel</a>
        </form>
    </div>
@stop