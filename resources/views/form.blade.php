@extends('layouts.app')

@section('content')

<!-- 送信メールフォームパネル… -->
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->
    @include('common.errors')

        @if (Session::has('success'))
        <div id="sample">
        <p>{{ Session::get('success') }}</p>
        </div>
        @endif

        <div class="form-group">
            <label for="product-name" class="col-sm-3 control-label">注文メール送信フォーム</label>

            <form action="{{ url('form') }}" method="POST">
            @csrf
                <p>送信先:<input type="text" name="company_name" value="{{old('company_name')}}" placeholder="担当業者名を入力してください"></p>
                @if ($errors->has('company_name'))
                <p>{{$errors->first('company_name')}}</p>
                @endif

                <p>発注依頼<br>
                平素は大変お世話になっております。<br>
                注文表番号:
                <input type="text" name="order_id" value="{{old('order_id')}}"></p>
                @if ($errors->has('order_id'))
                <p>{{$errors->first('order_id')}}</p>
                @endif

                <p>希望納期:<input type="text" name="due_date" value="{{old('due_date')}}"placeholder="例:01-01-2022"></p>
                @if ($errors->has('due_date'))
                <p>{{$errors->first('due_date')}}</p>
                @endif

                <p>納品先:<input type="text" name="ship_to"  value="{{old('ship_to')}}"placeholder="店舗名を入力してください"></p>
                @if ($errors->has('ship_to'))
                <p>{{$errors->first('ship_to')}}</p>
                @endif
                <p>担当名:<input type="text" name="attend"  value="{{old('attend')}}"placeholder="担当者の名前を入力してください"></p>
                @if ($errors->has('attend'))
                <p>{{$errors->first('attend')}}</p>
                @endif

                  <p>注文致します。ご手配のほど、宜しくお願い致します。</p>





             <p>
                <input type="submit" name="send" value="送信">
            </p>
        </form>
      </div>
     </div>
</div>
@endsection
