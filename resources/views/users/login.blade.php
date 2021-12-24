<!-- ログイン画面のView -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"> <!--「href=」でlogin.cssと連携-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
</head>
<body>
    <div class="login">
        <div>
            <h1>cafe57</h1>
        </div>
        @csrf <!-- CSRF保護 -->
            <div class="outer-login-form">
                <section>
                    <form action="" method="post" enctype="multipart/form-data">
                        <p>ユーザー名</p>
                        <p><input type="text" name="user-name" placeholder="ユーザー名を入力してください" style="width:250px; height:30px;"></P>
                        <p>パスワード</P>
                        <p><input type="password" name="password" placeholder="パスワードを入力してください" style="width:250px; height:30px; margin-top:10px;"></P>
                        <p><input type="submit" value="ログイン" style="width:200px; height:30px; margin-top:20px;"></p>
                        <p><input type="submit" value="新規登録" style="width:200px; height:30px; margin-top:20px;"></p>
                    </form>
                </section>
            </div>
        </form>
        <div class="error-indication">
            @foreach ($errors->all() as $error) <!--入力ミスまたは重複している部分があれば、警告文で知らせてくれる処理-->
                <li>{{$error}}</li>
            @endforeach
        </div>
    </div>
</body>
</html>