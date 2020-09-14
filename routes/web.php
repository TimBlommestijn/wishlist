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
    return view('welcome');
});

Route::get('/logout',function(){
    Auth::logout();
    return redirect('/');
});

Auth::routes();

Route::get('/home',function(){
    return redirect('/');
} );
// wishes stuff
Route::get('/wish/{wish}/edit','WishController@edit');
Route::get('/wish/create','WishController@create');
Route::delete('/wish/{wish}', 'WishController@destroy');
Route::put('/wish/{wish}', 'WishController@update');
Route::get('/wish/{wish}','WishController@show');
Route::get('/wish', 'WishController@index');
Route::post('/wish','WishController@store'); 