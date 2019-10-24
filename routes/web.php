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

Auth::routes();

Route::get('/get-users', 'Auth1Controller@get_users');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login1','Auth1Controller@login_index');

Route::get('/register1','Auth1Controller@register_index');

Route::post('/register1','Auth1Controller@auth_user');

Route::post('/login1','Auth1Controller@login_user');

Route::get('/register2','Auth1Controller@register2_user');

Route::post('/register2','Auth1Controller@auth_register2');

Route::get('/login2','Auth1Controller@login2_user');

Route::post('/login2','Auth1Controller@auth_login2');

    
