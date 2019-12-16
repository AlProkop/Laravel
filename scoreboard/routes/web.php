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

Route::get('/', 'BoardController@selectMatch');
Route::get('/userForm', 'BoardController@selectMatch');

Route::post('/fetch', 'BoardController@fetch');
Route::post('/checkLogin', 'BoardController@checkLogin');
Route::post('/addResult', 'BoardController@addResult');
Route::delete('/delResults', 'BoardController@delResults');

Route::get('/loginForm', function() //надо проверить без этого маршрута
{
    return view('loginForm');
});

Route::get('/logout', 'BoardController@logout');
Route::get('/adminForm', 'BoardController@adminForm')->middleware('login');
