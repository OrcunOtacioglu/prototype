@extends('dashboard.base')

@section('title', 'Edit Page')

@section('page.top')
    <div class="pull-right">
        <a href="{{ action('Util\PageController@show', ['slug' => $page->slug]) }}" class="btn btn-default">
            <span class="fa fa-eye"></span> See Page
        </a>
    </div>
@stop

@section('content')
    <div class="col-md-12">
        <form action="{{ action('Util\PageController@update', ['id' => $page->id]) }}" method="POST" >
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="form-group">
                <label for="title">Page Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $page->title }}">
            </div>

            <div class="form-group">
                <label for="pageContent">Page Content</label>
                <textarea name="pageContent" id="pageContent" cols="30" rows="10" class="form-control">{{ $page->content }}</textarea>
            </div>

            <input type="submit" class="btn btn-success" value="Update">
            <a href="{{ action('Util\PageController@index') }}">Cancel</a>
        </form>
    </div>
@stop