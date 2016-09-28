<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::group(['name' => 'app', 'prefix' => 'app', 'middleware' => 'auth'], function(){
	Route::get('react', 'AppController@getReact');
});

Route::group(['name' => 'api', 'prefix' => 'api/v1', 'middleware' => 'auth'], function(){
	Route::get('user', 'UserApi@get');
	Route::get('user/{id}', 'UserApi@show');
	Route::post('user', 'UserApi@create');
	Route::put('user/{id}', 'UserApi@update');
	Route::delete('user/{id}', 'UserApi@delete');
});