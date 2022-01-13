<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//追加
use Illuminate\Support\Facades\Validator;
use App\Mail\TestMail;      //Mailableクラス
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function form(Request $request)

    {

    return view('form', [

    ]);
}
    public function send(Request $request)
    {
        $rules = [
            'company_name' => 'required|',
            'order_id' => 'required|',
            'due_date' => 'required|',
            'ship_to' => 'required|',
            'attend' => 'required|',
        ];


        /* Mail::send('mail',['orders' => 'order'],function($msg){
            $msg->to('hntake@me.com')->subject('件名');
        }); */

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect('/mail')
            ->withErrors($validator)
            ->withInput();
        }

        $data = $validator->validate();

        Mail::to('hntake@me.com')->send(new TestMail($data));

        session()->flash('success', '送信しました！');
        return back();
    }
}
