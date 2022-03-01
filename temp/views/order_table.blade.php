@extends('layouts.app')


@section('script')

@endsection

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

<!--注文表一覧画面-->
<div class="table-responsive">
    <p>注文一覧表</p>
    <!--  //formからmailにそして、shipに名前変更// -->
    <form action="{{ route('ship') }}" method="GET">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>型番</th>
                    <th>品目</th>
                    <th>数量</th>
                    <th>従業員名</th>
                    <th>注文済</th>


                </tr>
            </thead>
            <tbody id="tbl">
                @foreach ($orders as $order)
                <tr>

                    <td>{{ $order->product_id }}</td>
                    <td>{{ $order->product_name }}</td>
                    <td>{{ $order->new_order }}</td>
                    <td>{{ $order->staff }}</td>
                    <td>
                        <div>

                            <p style="display:inline-block"><input type="radio" name="order[{{ $order->product_id }}][status]" value="1" class="radio-buttom-1">送信済み</p>
                            <p style="display:inline-block"><input type="radio" name="order[{{ $order->product_id }}][status]" value="2" class="radio-buttom-1">保留</p>
                            <input type="hidden" name="order[{{ $order->product_id }}][product_id]" value="{{ $order->product_id }}">
                        </div>
                    </td>

                    </td>
                </tr>
                @endforeach
                <!-- //formからmailにそしてshipに名前変更// -->
                <input type="submit" href="{{ route('ship') }}" value="注文番号確認" class="btn btn-danger btn-sm btn-dell">
            </tbody>
            @yield('script')
        </table>
    </form>

</div>
@endsection
