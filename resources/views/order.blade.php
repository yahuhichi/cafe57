@extends('layouts.app')

@section('content')

<!-- 注文申請用パネル… -->
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->
    @include('common.errors')

    <!-- 注文申請フォーム -->
    <form action="{{ url('insert') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- 備品データ名 -->
        <div class="form-group">
            @foreach ($products as $product)
            <label for="product-name" class="col-sm-3 control-label">注文申請</label>
            <form action="insert" id="new_order" method="POST">
                {{ csrf_field()}}
                <div class="col-sm-6">
                    <label>型番</label>
                    {{ $product->id  }}
                    <input type="hidden" name="product_id" value="{{ $product->id  }}" />
                </div>

                <div class="col-sm-6">
                    <label>品目</label>
                    {{ $product->product_name }}
                    <input type="hidden" name="product_name" value="{{ $product->product_name  }}" />
                </div>
                <div class="col-sm-6">
                    <label>数量</label>
                    <input type="text" name="new_order" id="new_order" class="form-control">
                </div>
                <div class="col-sm-6">
                    <label>従業員名</label>
                    <input type="text" name="staff" id="staff" class="form-control">
                </div>
                @endforeach
        </div>

        <!-- 注文登録ボタン -->
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
