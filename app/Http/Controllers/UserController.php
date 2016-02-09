<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function leaderboard(){
        $users =  \DB::table('users')
                    ->orderby('level','desc')
                    ->orderby('updated_at','asc')
                    ->get();

        return view('leaderboard')
            ->with('users',$users);
    }

    public function rules(){
        return view('rules');
    }

    public function about(){
        return view('about');
    }
}
