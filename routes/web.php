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



Route::get('/','HomeController@index')->name('home');
Route::get('/goods','HomeController@goods');

Route::get('/profile','ProfileController@profile_index');
Route::post('/profile','ProfileController@profile');

Route::get('/login','AuthController@login_index')->name('login');
Route::post('/login','AuthController@login');

Route::get('/register','AuthController@register_index')->name('register');
Route::post('/register','AuthController@register');

Route::get('/infoimage','InfoimageController@info_image');
