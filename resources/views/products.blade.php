@extends('layouts.app')


@section('content')

<div class="side"> <!-- サイドバー -->
            <p><h1>cafe57</h1></p>
            <nav class="sidebar">
                <p><a href="{{ url('products') }}"><h3>在庫一覧画面</h3></a></p>
                <p><a href="{{ url('order_table') }}"><h3>注文表画面</h3></a></p>
                <p><a href="{{ url('') }}"><h3>シフト申請画面</h3></a></p>
                <p><a href="{{ url('') }}">・シフト管理画面</a></p>
                <p><a href="{{ url('') }}">・勤怠一覧画面</a></p>
                <p><a href="{{ route('home_screen') }}">ホーム画面に戻る</a></p>
            </nav>
            <div class="logout_buttom">
                <form action="{{ route('logout') }}" method="post">
                    @csrf <!-- CSRF保護 -->
                    <input type="submit" value="ログアウト"> <!-- ログアウトしてログイン画面に戻る -->
                </form>
            </div>
</div>


<div class="table-responsive">
    <p>在庫一覧表</p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>型番</th>
            <th>品目</th>
            <th>在庫数</th>
            <th>発注ライン</th>
            <th>アラート</th>
        </tr>
        </thead>
        <tbody id="tbl">
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->order }}</td>
                <!-- <アラートボタン表示> -->
               <td> @if( $product->stock < $product->order )
               <a href="/order/{{ $product->id }}">{{$product->id}}</a>
                {{csrf_field()}}
               <!-- <input type="hidden" name="id" value="{{ $product->id }}" />
               <input type="hidden" name="product_name" value="{{ $product->product_name }}" /> -->
               <!-- <input type="submit"> -->
                @endif</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('create') }}">登録</a>
    <a href="{{ route('store') }}">持ち出し</a>
</div>
@endsection


