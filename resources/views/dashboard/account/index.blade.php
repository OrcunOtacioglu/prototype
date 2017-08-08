@extends('dashboard.base')

@section('title', 'Accounts')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('css/plugins/datatables.min.css') }}">
@stop

@section('page.top')
    <div class="pull-right">
        <a href="{{ action('AccountController@create') }}" class="btn btn-success">Create New Account</a>
    </div>
@stop

@section('content')
    <div class="col-md-12">
        @if(count($accounts) <= 0)
            <p>There are no accounts to show!</p>
        @else
            <table id="accounts" class="dataTable" style="width: 100%">
                <thead>
                <tr>
                    <th>Account Name</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($accounts as $account)
                    <tr>
                        <td>{{ $account->name }}</td>
                        <td>{{ $account->phone }}</td>
                        <td>
                            <a href="{{ action('AccountController@edit', ['id' => $account->id]) }}" class="btn btn-primary btn-xs">Edit</a>
                            <form action="{{ action('AccountController@destroy', ['id' => $account->id]) }}" method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-default btn-xs" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@stop

@section('footer.scripts')
    <script src="{{ asset('js/plugins/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#accounts').DataTable();
        });
    </script>
@stop