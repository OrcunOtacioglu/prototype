@extends('layouts.dashboard')

@section('title', 'Manage Users')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-primary panel-line">

                <div class="panel-heading">
                    <h3 class="panel-title">Manage Users</h3>
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-nowrap">Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->title }}</td>
                                <td class="text-nowrap">
                                    <a href="#" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
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
        </div>

        <div class="col-md-4">
            @include('dashboard.account.user.create')
        </div>
    </div>
@stop