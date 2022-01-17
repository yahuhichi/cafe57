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
                <input type="submit" value="ログアウト">
            </div>
        </div>
        <div class="home"> <!-- チャット画面 -->
            <form action="{{ route('chat') }}" method="post" autocomplete="off">
                @csrf <!-- CSRF保護 -->
                <div class="outer-title-form">
                    <p><h3>件名</h3></p>
                    <input type="text" name="title" placeholder="件名を入力してください" autocomplete="off" style="height:30px;">
                </div>
                <div class="outer-message-form">
                    <p><h3>メッセージ</h3></P>
                    <textarea name="message" placeholder="ここにメッセージを入力してください" autocomplete="off" rows="30" cols="20"></textarea><br> <!-- rows =「高さ」, cols =「幅」-->
                    <input type="submit" value="投稿">
                </div>
            </form>
            <div class="chatarea">
                <table> <!-- chatテーブルのデータを全て表示させる処理 -->
                    @foreach ($chats as $chat)
                    <tr>
                        <td>{{ $chat->user->name}}</td> <!-- Chat.phpのuser関数(Method)を参照して、usersテーブルの情報が紐づけられる -->
                        <td>{{ $chat->user_id }}</td>
                        <td>{{ $chat->title }}</td>
                        <td>{{ $chat->message }}</td>
                        <td>{{ $chat->created_at}}</td>
                        <td>{{ $chat->updated_at}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
</body>
</html>