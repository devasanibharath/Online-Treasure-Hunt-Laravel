<?php

namespace App\Http\Controllers;

use App\UserInfo;
use Auth;
use App\User;
use App\Level;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
class LevelController extends Controller
{

    public function newp(){
        if(Auth::user()->role > 1) {
            return view('admin.add_level');
        }else{
            return Redirect::route('home');
        }
    }

    public function create()
    {
        $p = new Level;

        $inputs = Input::all();

        $rules = array(
            'level' => 'required',
            'answer' => 'required',
            'success_image' => 'required',
        );
        $validation = Validator::make($inputs, $rules);
        if ($validation->fails()) {
            return var_dump($validation->errors());
        }
        else
        {
            $p->level = Input::get('level');
            $p->title = Input::get('title');
            $p->difficulty = Input::get('difficulty');
            if ($file = Input::file('background')) {
                //getting timestamp
                //$timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $name);

                $p->background = '/uploads/' . $name;
            } else {
                $p->background = null;
            }
            $p->answer = bcrypt(Input::get('answer'));
            $p->placeholder = Input::get('placeholder');
            $p->html_comment = Input::get('html_comment');
            if ($file = Input::file('success_image')) {
                //getting timestamp
                //$timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $name);

                $p->success_image = '/uploads/' . $name;
            } else {
                $p->success_image = null;
            }
            $p->status = Input::get('status');

            $p->save();

            return Redirect::route('home')
                ->with('alert','Successfully Added !');
        }

    }


    public function edit($id){
        if(Auth::user()->role > 1) {
            $level = Level::find($id);

            return view('admin.edit_level')
                ->with('level', $level);
        }else{
            return Redirect::route('home');
        }
    }

    public function refresh($id){
        $p = Level::find($id);

        $inputs = Input::all();

        $rules = array(
            'level' => 'required',
            'answer' => 'required',
//            'success_image' => 'required',
        );
        $validation = Validator::make($inputs, $rules);
        if ($validation->fails()) {
            return var_dump($validation->errors());
        }
        else
        {
            $p->level = Input::get('level');
            $p->title = Input::get('title');
            $p->difficulty = Input::get('difficulty');
            if ($file = Input::file('background')) {
                //getting timestamp
                //$timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $name);

                $p->background = '/uploads/' . $name;
            } else {
                //$p->background = null;
            }
            $p->answer = bcrypt(Input::get('answer'));
            $p->placeholder = Input::get('placeholder');
            $p->html_comment = Input::get('html_comment');
            if ($file = Input::file('success_image')) {
                //getting timestamp
                //$timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $name);

                $p->success_image = '/uploads/' . $name;
            } else {
                //$p->success_image = null;
            }
            $p->status = Input::get('status');

            $p->save();

            return Redirect::route('home')
                ->with('alert','Updated Successfully !');
        }

    }

    public function delete($id){

        if(Auth::user()->role > 1) {
            $p = Level::find($id)->delete();

            return Redirect::route('home')
                ->with('alert', 'Deleted Successfully');
        }else{
            return Redirect::route('home');
        }
    }

    public function show(){
        if (Auth::check())
        {
            $id = Auth::user()->level;

            $level = Level::find($id);

            if($level) {
                return view('welcome')
                    ->with('level', $level);
            }else{
                return view('highest');
            }
        }else{
            return view('auth.login');
        }

    }

    public function check(Request $request){
        if(Auth::check()){
            $level = Auth::user()->level;
            $answer = Level::find($level)->answer;

            $image = Level::find($level)->success_image;
            $input =  (Input::get('answer'));

            $ul = new UserInfo;

            $ul->user_id = Auth::user()->id;
            $ul->level = $level;
            $ul->answer = $input;
            $ul->ip = $request->ip();

            $ul->save();



            if (\Hash::check($input, $answer)){
                $level = $level + 1;
                $id = Auth::user()->id;
                $p = User::find($id);
                $p->level = $level;
                $p->save();
                return view('success')
                    ->with('image',$image);
            }else{
                return view('failure');
            }

        }else{
            return view('auth.login');
        }
    }

    public function userlog(){
        if(Auth::user()->role > 1) {
            $log = '';
            return view('admin.answerlog')
                ->with('log', $log);
        }else{
            return Redirect::route('home');
        }
    }

    public function getuserlog()
    {
        if (Auth::user()->role > 1) {
            $id = Input::get('id');
            $log = UserInfo::scopeGetUserData($id);
            return view('admin.answerlog')
                ->with('log', $log);
        }else{
            return Redirect::route('home');
        }
    }
}
