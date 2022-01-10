@extends('layouts.app')

@section('content')

<!-- 送信メールフォームパネル… -->
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->
    @include('common.errors')

<form action="{{ url('send') }}" method='POST'>
    @csrf
    <div class="form-group">
    <label for="product-name" class="col-sm-3 control-label">注文メール送信フォーム</label>


        <p>送信先</p>
        <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control">
        @if ($errors->has('company_name'))
        <p class="bg-danger">{{ $errors->first('company_name') }}</p>
        @endif
        <div>
            発注依頼<br>
            平素は大変お世話になっております。<br>
            下記の商品を注文します。ご手配のほど、宜しくお願い致します。
        </div>

        <p>希望納期</p>
        <input type="text" name="due_date" value="{{ old('due_date') }}" class="form-control">
        @if ($errors->has('due_date'))
        <p class="bg-danger">{{ $errors->first('due_date') }}</p>
        @endif
        <p>納品先</p>
        <input type="text" name="ship_to" value="{{ old('ship_to') }}" class="form-control">
        @if ($errors->has('ship_to'))
        <p class="bg-danger">{{ $errors->first('ship_to') }}</p>
        @endif
        <p>担当名</p>
        <input type="text" name="attend" value="{{ old('attend') }}" class="form-control">
        @if ($errors->has('attend'))
        <p class="bg-danger">{{ $errors->first('attend') }}</p>
        @endif

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
        <p><input type="submit" value="送信" class="btn"></p>

    </div>
</form>


@if (Session::has('succsss'))
<div>
    <p class="bg-warning text-center">{{ Session::get('success')}}</p>
</div>
@endif
