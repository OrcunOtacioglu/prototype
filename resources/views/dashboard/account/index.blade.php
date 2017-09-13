@extends('layouts.dashboard')

@section('title', 'Manage Account Settings')

@section('page-header')
    <a href="{{ action('Authority\RoleController@index') }}" class="btn btn-outline btn-success" data-toggle="tooltip" data-original-title="Manage Roles" data-container="body">
        <i class="icon wb-wrench" aria-hidden="true"></i>
        <span class="hidden-sm-down">Manage Roles</span>
    </a>
    <a href="{{ action('Authority\PermissionController@index') }}" class="btn btn-outline btn-success" data-toggle="tooltip" data-original-title="Manage Permissions" data-container="body">
        <i class="icon wb-hammer" aria-hidden="true"></i>
        <span class="hidden-sm-down">Manage Permissions</span>
    </a>
@stop

@section('content')
    <div class="panel panel-primary panel-line">

        <div class="panel-heading">
            <h3 class="panel-title">Manage Accounts</h3>
        </div>
        
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Website</th>
                    <th>Phone</th>
                    <th class="text-nowrap">Actions</th>
                </tr>
                </thead>
                
                <tbody>
                @foreach($accounts as $account)
                    <tr>
                        <td>{{ $account->name }}</td>
                        <td>{{ $account->website }}</td>
                        <td>{{ $account->phone }}</td>
                        <td class="text-nowrap">
                            <a href="{{ action('AccountController@edit', ['id' => $account->id]) }}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
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
        </div>
        
    </div>
@stop