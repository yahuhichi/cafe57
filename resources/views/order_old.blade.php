@extends('layouts.app')



@section('content')


<!--
<!--注文表画面-->
<div class="table-responsive">
    <p>注文申請</p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>型番</th>
            <th>品目</th>
            <th>数量</th>
            <th>従業員名</th>

        </tr>
        </thead>
        <tbody id="tbl">
        @foreach ($products as $product)
            <tr>
                <form action="insert" id="new_order" method="POST">
                    {{ csrf_field()}}
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_name }}</td>
                <td><input type="hidden" name="product_id" value="{{ $product->id  }}" /></td>
                <td><input type="text" name="new_order" id="new_order" class="form-control"></td>
                <td><input type="text" name="staff" id="staff" class="form-control"></td>
                <td><div>
                    <input type="submit" id="check" name="check" value="注文">
                    <form action="delete{{$product->product_id}}" method="POST">
                        {{ csrf_field() }}
                        <input type="submit" value="削除" class="btn btn-danger btn-sm btn-dell">
                    </form>
                    </div>
                </td>
                </form>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('form') }}">注文メール作成</a>
</div>
@endsection -->

