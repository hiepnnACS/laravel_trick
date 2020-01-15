<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    $user = request()->user()->roles[0]; //lấy kèm với role của user (dùng cho vue router sau này)
    return view('welcome', ['user' => $user]);
})->middleware('auth');

Route::resource('/tasks', 'TaskController');

Route::get('/users', 'UserController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');