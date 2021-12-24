@extends('layouts.app')

@section('content')

<!-- 持ち出し申請用パネル… -->
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->
    @include('common.errors')

    <!-- 持ち出し申請フォーム -->
    <form action="{{ url('subtract') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- 備品データ名 -->
        <div class="form-group">
            <label for="product-name" class="col-sm-3 control-label">持ち出し申請</label>

            <div class="col-sm-6">
              <label>型番</label>
                <input type="text" name="product_id" id="product_id" class="form-control">
            </div>
            <!--エラー防止の為一時削除
             <div class="col-sm-6">
              <label>品目</label>
                <input type="text" name="product_name" id="product_name" class="form-control">
            </div> -->
            <div class="col-sm-6">
              <label>数量</label>
                <input type="text" name="out_amount" id="out_amount" class="form-control">
            </div>
            <div class="col-sm-6">
              <label>従業員名</label>
                <input type="text" name="staff" id="staff" class="form-control">
            </div>

        </div>

        <!-- 備品登録ボタン -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> 申請する
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
