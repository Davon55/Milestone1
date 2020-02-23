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

Route::get('/index', function () {
    return view('index');
});
Route::get('/index2', function () {
		return view('index2');
	});

Route::get('/login2', function()
	{
		return view('login2');
	});
Route::post('/dologin2', 'Login2Controller@dologin2');


Route::get('/Register2', function()
{
	return view('Register2');
});
Route::post('/RegisterUser', 'newUserController@RegisterUser');

Route::get('/Admin', function()
{
	return view('Admin');
});
Route::post('Admin', 'AdminController@Admin');

