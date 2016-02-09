<?php

namespace App\Http\Controllers;

use Auth;
use App\Level;
use App\Http\Requests;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function desktop(){
        if(Auth::user()->role > 1) {
            $levels = \DB::table('levels')->orderBy('id', 'desc')->paginate(15);
            return view('home')
                ->with('levels', $levels);
        }else{
            $id = Auth::user()->level;

            $level = Level::find($id);


            return view('welcome')
                ->with('level',$level);
        }
    }

    public function index()
    {
        return view('home');
    }

    public function users(){
        $users = \DB::table('users')->orderBy('id', 'desc')->paginate(15);
        return view('admin.users')
            ->with('users',$users);
    }
}
