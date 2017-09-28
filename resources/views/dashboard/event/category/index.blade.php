@extends('layouts.dashboard')

@section('title', 'Manage Event Categories')

@section('page-header')
    <a href="{{ action('Util\EventCategoryController@create') }}" class="btn btn-outline btn-success" data-toggle="tooltip" data-original-title="Create New Category" data-container="body">
        <i class="icon wb-plus" aria-hidden="true"></i>
        <span class="hidden-sm-down">New Category</span>
    </a>
@stop

@section('content')
    <div class="panel panel-primary panel-line">

        <div class="panel-heading">
            <h3 class="panel-title">All Event Categories</h3>
        </div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th class="text-nowrap">Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td class="text-nowrap">
                            <a href="{{ action('Util\EventCategoryController@edit', ['id' => $category->id]) }}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                                <i class="icon wb-wrench" aria-hidden="true"></i>
                            </a>
                            <form action="{{ action('Util\EventCategoryController@destroy', ['id' => $category->id]) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit"
                                        class="btn btn-sm btn-icon btn-flat btn-default"
                                        data-toggle="tooltip"
                                        data-original-title="Delete"
                                >
                                    <i class="icon wb-close" aria-hidden="true"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop