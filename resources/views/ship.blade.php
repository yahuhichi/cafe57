@extends('layouts.app')


@section('content')




<div class="table-responsive">
    <p>注文番号確認</p>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>注文番号</th>
                <th>品目</th>
                <th>注文数量</th>
                <th>注文日付</th>
            </tr>
        </thead>
        <tbody id="tbl">

            <tr>
                <td>{{ $ship->id }}</td>
                <td>{{ $ship->product_name }}</td>
                <td>{{ $ship->new_order }}</td>
                <td>{{ $ship->created_at}}</td>

                {{csrf_field()}}

            </tr>

        </tbody>
    </table>
    <a href="{{ route('form') }}">メール作成</a>

</div>
@endsection
