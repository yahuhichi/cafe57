<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    // use HasFactory;

    protected $fillable = ['id', 'date','work_time'];
    
    public function User()
    {
        return $this->hasMany(User::class);
    }
   
}
