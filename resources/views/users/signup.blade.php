<!-- 新規登録画面のView -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}"> <!--「href=」でsignup.cssと連携-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録画面</title>
</head>
<body>
    <div class="signup">
        <div>
            <h1>新規登録画面</h1>
        </div>
            <div class="outer-signup-form">
                <section>
                    <form action="{{ route('signup') }}" method="post" enctype="multipart/form-data">
                        @csrf <!-- CSRF保護 -->
                        <p>どちらの役職ですか？</p>
                        <!-- ラジオボタン -->
                        <!-- name属性を統一する事により、2つの内、1つのラジオボタンしか反応しなくなるようにできる。 -->
                        <!-- p(段落)に「display:inline-block」のスタイルを指定することで、ラジオボタンが横並びになる。 -->
                        <p style="display:inline-block"><input type="radio" name="user-type" value="1" class="radio-buttom-1" >従業員</p>
                        <p style="display:inline-block"><input type="radio" name="user-type" value="2" class="radio-buttom-2" >管理者</p>
                        <p><input type="text" name="name" placeholder="名前を入力してください" style="width:250px; height:30px;"></P>
                        <p><input type="text" name="user-name" placeholder="ユーザー名を入力してください" style="width:250px; height:30px; margin-top:10px;"></P>
                        <p><input type="email" name="email" placeholder="メールアドレスを入力してください" style="width:250px; height:30px; margin-top:10px;"></p>
                        <p><input type="password" name="password" placeholder="パスワードを入力してください" style="width:250px; height:30px; margin-top:10px;"></p>
                        <p><input type="submit" value="登録する" style="width:200px; height:30px; margin-top:20px;"></p>
                        <p><input type="submit" value="ログイン画面に戻る" style="width:200px; height:30px; margin-top:20px;"></p>
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