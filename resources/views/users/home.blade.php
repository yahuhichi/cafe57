<!-- ホーム画面のView -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}"> <!-- home.cssと連携 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム画面</title>
</head>
<body>
    <section>
        <div class="side">
            <p><h1>cafe57</h1></p>
            <nav class="sidebar">   
                <p><a href="{{ url('products') }}"><h3>在庫一覧画面</h3></a></p>
                <p><a href="{{ url('create') }}">・商品登録画面</a></p> 
                <p><a href="{{ url('order_table') }}"><h3>注文表画面</h3></a></p>
                <p><a href="{{ url('') }}"><h3>シフト申請画面</h3></a></p>
                <p><a href="{{ url('') }}">・シフト管理画面</a></p>
                <p><a href="{{ url('') }}">・勤怠一覧画面</a></p>
                <p><a href="{{ route('home_screen') }}">ホーム画面に戻る</a></p>
            </nav>
        </div>
        <div class="home">
            <p>メインコンテンツ</p>
        </div>
    </section>
</body>
</html>