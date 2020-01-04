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

Route::get('/image/{user_id}','ImageController@get_image_info');

Route::get('/exit', 'ExitController@exit');

Route::get('/user/{user_id}/goods','GoodsController@get_user_goods');

Route::get('/admin/auth/login','AdminAuthController@adminlogin_index');
Route::post('/admin/auth/login','AdminAuthController@adminlogin');

Route::get('/admin','AdminController@adminindex');

Route::get('/admin/users','AdminController@admin_users');

Route::get('/admin/goods','AdminController@admin_goods');

Route::get('/admin/goods/search','AdminController@good_search');

Route::delete('/admin/goods/delete','AdminController@admin_goods_delete');

Route::get('/admin/users/{user_id}','AdminController@admin_users_detail');