@extends('dashboard.base')

@section('title', 'Sales')

@section('content')
    <div class="col-md-12">
        @if(count($sales) <= 0)
            <p>There are no accounts to show!</p>
        @else
            <table id="accounts" class="dataTable" style="width: 100%">
                <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Reference</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($sales as $sale)
                    <tr>
                        <td>{{ $sale->transaction_id }}</td>
                        <td>{{ $sale->reference }}</td>
                        <td>{{ $sale->total }}</td>
                        <td>
                            <a href="{{ action('OrderController@edit', ['id' => $sale->id]) }}" class="btn btn-primary btn-xs">Edit</a>
                            <form action="{{ action('OrderController@destroy', ['id' => $sale->id]) }}" method="post">
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