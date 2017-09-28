@extends('layouts.dashboard')

@section('title', 'Manage Content Pages')

@section('page-header')
    <a href="{{ action('Util\PageController@create') }}" class="btn btn-outline btn-success" data-toggle="tooltip" data-original-title="Create New Page" data-container="body">
        <i class="icon wb-plus" aria-hidden="true"></i>
        <span class="hidden-sm-down">New Page</span>
    </a>
@stop

@section('content')
    <div class="panel panel-primary panel-line">

        <div class="panel-heading">
            <h3 class="panel-title">Manage Content Pages</h3>
        </div>

        <div class="panel-body">
            @if($pages->count() <= 0)
                <div class="alert alert-alt alert-danger alert-dismissable" role="alert">
                    <p>There are no pages to show!</p>
                </div>
            @else
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th class="text-nowrap">Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <td>{{ $page->id }}</td>
                            <td>{{ $page->title }}</td>
                            <td>{{ $page->slug }}</td>
                            <td>
                                <a href="{{ action('Util\PageController@edit', ['id' => $page->id]) }}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                                    <i class="icon wb-wrench" aria-hidden="true"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Delete">
                                    <i class="icon wb-close" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>
@stop