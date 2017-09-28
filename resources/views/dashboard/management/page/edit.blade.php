@extends('layouts.dashboard')

@section('title', 'Edit Page')

@section('content')

    <form action="{{ action('Util\PageController@update', ['id' => $page->id]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-primary panel-line">

                    <div class="panel-heading">
                        <h3 class="panel-title">General Info</h3>
                    </div>

                    <div class="panel-body">
                        <!-- Title Form Input -->
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $page->title }}">
                        </div>

                        <div class="form-group">
                            <label for="pageContent">Page Content</label>
                            <textarea name="pageContent" id="pageContent" cols="30" rows="10" class="form-control">{{ $page->content }}</textarea>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-primary panel-line">

                    <div class="panel-heading">
                        <h3 class="panel-title">Save Content</h3>
                    </div>

                    <div class="panel-body">
                        <input type="submit" value="Publish Page" class="btn btn-success">
                        <a href="{{ action('Util\PageController@index') }}">Cancel</a>
                    </div>

                </div>
            </div>
        </div>
    </form>

@stop