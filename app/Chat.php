<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'user_id', 'title', 'message',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id'); // usersテーブルと紐づけ
    }
}


