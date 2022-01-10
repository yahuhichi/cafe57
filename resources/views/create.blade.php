@extends('layouts.app')

@section('content')

<!-- 備品登録用パネル… -->
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->
    @include('common.errors')

    <!-- 新備品フォーム -->
    <form action="{{ url('update') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- 備品データ名 -->
        <div class="form-group">
            <label for="product-name" class="col-sm-3 control-label">備品登録画面</label>

          
            <div class="col-sm-6">
              <label>品目</label>
                <input type="text" name="product_name" id="product_name" class="form-control">
            </div>
            <div class="col-sm-6">
              <label>登録数</label>
                <input type="text" name="stock" id="stock" class="form-control">
            </div>
            <div class="col-sm-6">
              <label>発注ライン</label>
                <input type="text" name="order" id="order" class="form-control">
            </div>
        </div>

        <!-- 備品登録ボタン -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> 登録する
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
