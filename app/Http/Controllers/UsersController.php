<?php // このファイルに、新規登録画面、ログイン画面、ホーム画面(チャット機能含む)、チャット編集画面のControllerを記述。

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // User.phpを使用
use Illuminate\Support\Facades\Hash; // パスワードを乱数にする設定

class UsersController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';// Admin(管理者)でログインした後のリダイレクト先をホーム画面に設定

    /**
     * 新規登録画面の表示
     * 
     */
    public function signup_form() 
    {
        return view('users.signup');
    }

    public function signup(Request $request) // 新規登録の処理(post)
    {
        // バリデーション = 「入力チェック」
        $request->validate([
            'name' => 'required',
            'user_name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', 'max:255', 'alpha_num']
        ]);

        // DBインサート(usersテーブルに行を追加)
        $user = new User();
        $user->fill($request->all())->save(); // fillを使い、モデルの全カラムを更新し、保存。

        //「登録する」ボタンを押すとログイン画面に遷移
        return view('users.login');
    }


    /**
     * ログイン画面の表示
     * 
     */
    public function login_form() 
    {
        return view('users.login');
    }

    public function login(Request $request) // ログインの処理(post)
    {
        // バリデーション = 「入力チェック」
        $request->validate([
            'user_name' => 'required',
            'password' => ['required', 'min:8', 'max:255', 'alpha_num']
        ]);

        //「ログイン」ボタンを押すとホーム画面に遷移
        return view('users.home');
    }

    public function home() // ホーム画面の処理(post)
    {
        // サイドバーの「ログアウト」ボタンを押すとログイン画面に戻る
        return view('users.');
    }
}


