<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // User.phpを使用
use Illuminate\Support\Facades\Hash; // パスワードを乱数にする設定

class UsersController extends Controller
{
    public function index()
    {
        // ここにDB内(usersテーブル)の中身を引っ張ってくるコードを書く。
        $users = User::all(); // $usersという変数を定義し、その中に入れる値を記述。(今回はユーザーの情報を全て取得)
        return view('users.signup', ['users' => $users]); // 新規登録画面の表示
        return view('users.login', ['users' => $users]); // ログイン画面の表示
    }

    public function signup_form()
    {
        return view('users.signup'); // 新規登録画面の表示
    }

    public function login_form()
    {
        return view('users.login'); // ログイン画面の表示
    }
}


