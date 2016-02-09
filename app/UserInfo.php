<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    //protected $primaryKey = 'user_id';
    protected $table = 'log_answers';

    protected $fillable = [
        'user_id', 'level', 'answer', 'ip'
    ];

    public static function scopeGetUserData($uid){
        return \DB::table('log_answers')->where('user_id', '=', $uid)
            ->orderBy('created_at', 'desc')->get();
    }

}
