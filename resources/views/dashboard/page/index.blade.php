@extends('dashboard.base')

@section('title', 'All Pages')

@section('page.top')
    <div class="pull-right">
        <a href="{{ action('Util\PageController@create') }}" class="btn btn-primary">
            Create New Page
        </a>
    </div>
@stop

@section('content')
    <div class="col-md-12">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $page)
                <tr>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->slug }}</td>
                    <td>
                        <a href="{{ action('Util\PageController@edit', ['id' => $page->id]) }}" class="btn btn-primary btn-xs">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop