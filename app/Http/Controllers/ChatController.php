<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ChatController extends Controller
{
    /**
     * ホーム画面の表示
     * 
     */
    public function home_screen()
    {
        return view('users.home');
    }
}
