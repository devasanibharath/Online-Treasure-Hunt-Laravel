<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/leaderboard','UserController@leaderboard');

Route::get('/about','UserController@about');

Route::get('/rules','UserController@rules');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/




Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('admin/level/new', [
        'as' => 'newp',
        'uses' => 'LevelController@newp'
    ]);

    Route::get('home',[
        'as' => 'home',
        'uses' => 'HomeController@desktop'
    ]);

    Route::post('admin/level/new','LevelController@create');

    Route::get('admin/level/{id}/edit', 'LevelController@edit');

    Route::post('admin/level/{id}/refresh', 'LevelController@refresh');

    Route::get('admin/level/{id}/delete', 'LevelController@delete');

    Route::get('admin/users','HomeController@users');

    Route::get('/', 'LevelController@show');

    Route::post('/answer', 'LevelController@check');

    Route::get('admin/answerlog','LevelController@userlog');

    Route::post('admin/answerlog','LevelController@getuserlog');



});
