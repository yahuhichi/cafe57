<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Chat; // Chat.php(Models)にアクセス
class ChatController extends Controller
{
    /**
     * ホーム画面の表示
     * 
     */
    public function home_screen()
    {
        $chats = Chat::orderBy('created_at', 'desc')->get();
        return view('users.home', ['chats' => $chats]);
    }

    public function logout() // ログアウトの処理(post)
    {
        return redirect('users.login'); //「ログアウト」ボタンを押すとログイン画面へリダイレクト
    }

    /**
     * user_id、title、messageの受け渡し
     * 
     */
    public function chat(Request $request)
    {
        $chat = new Chat; // $chatの変数に、Chatモデルを定義

        $chat->user_id = 1; // 仮にuser_idを1とする
        $chat->title = $request->title; // $chatにtitleをセット
        $chat->message = $request->message; // $chatにmessageをセット

        $chat->save(); // $chatに格納されている情報を保存。

        // $chats = Chat::orderBy('created_at', 'desc')->get();
        // return view('chat.home_screen', ['chats' => $chats]);

        return redirect('home_screen'); // ホーム画面にリダイレクト(ChatControllerの14行目のhome_screen関数を呼び出して表示)
    }

}
