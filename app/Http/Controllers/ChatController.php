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

    /**
     * user_id、title、messageの受け渡し
     * 
     */
    public function chat(Request $request)
    {
        $chats = Chat::orderBy('created_at', 'desc')->get();
        return view('chat.home_screen', ['chats' => $chats]);
    }

}
