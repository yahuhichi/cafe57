@extends('layouts.app')


@section('script')
<script>
    $(function() {
        $(".btn-dell").click(function() {
            if (confirm("本当に削除しますか？")) {
                //そのままsubmit（削除）
            } else {
                //cancel
                return false;
            }
        });
    });
</script>
@endsection

@section('content')



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
