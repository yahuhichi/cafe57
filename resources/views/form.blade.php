@extends('layouts.app')

@section('content')

<!-- 送信メールフォームパネル… -->
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->
    @include('common.errors')


        <!-- 備品データ名 -->
        <div class="form-group">
            <label for="product-name" class="col-sm-3 control-label">注文メール送信フォーム</label>


            <div class="col-sm-6">
              <label>送信先</label>
                <input type="text" name="company_name" id="company_name" class="form-control">
            </div>
            <div>
                発注依頼<br>
                平素は大変お世話になっております。<br>
                下記の商品を注文します。ご手配のほど、宜しくお願い致します。
            </div>
            <div class="col-sm-6">
              <label>希望納期</label>
                <input type="text" name="due_date" id="due_date" class="form-control">
            </div>
            <div class="col-sm-6">
              <label>納品先</label>
                <input type="text" name="ship_to" id="ship_to" class="form-control">
            </div>
            <div class="col-sm-6">
              <label>担当名</label>
                <input type="text" name="attend" id="attend" class="form-control">
            </div>
        </div>
        <!--注文表表示-->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                <th>型番</th>
                <th>品目</th>
                <th>数量</th>
            </tr>
            </thead>
            <tbody id="tbl">
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->product_id }}</td>
                    <td>{{ $order->product_name}}</td>
                    <td>{{ $order->new_order  }}</td>


                </tr>
                @endforeach
                </tbody>
             </table>
     </div>
</div>
@endsection
