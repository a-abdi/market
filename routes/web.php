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

Route::get('/users/{user_id}/goods/create','UsersController@users_create_goods_index');
Route::post('/users/{user_id}/goods/create','UsersController@users_create_goods');

Route::get('/users/login','UsersAuthController@users_login_index')->name('login');
Route::post('/users/login','UsersAuthController@users_login');

Route::get('/users/register','UsersAuthController@users_register_index')->name('register');
Route::post('/users/register','UsersAuthController@users_register');

Route::get('/image/{image_id}','GoodsController@get_image_info');

Route::get('/users/{user_id}/exit','UsersController@user_exit');
Route::get('/users/{user_id}/profile','UsersController@user_profile');
Route::get('/users/{user_id}/ordering/new','UsersController@user_ordering_new');

Route::get('/users/{user_id}/goods','UsersController@get_user_goods');

Route::get('/admin/auth/login','AdminAuthController@login_index');
Route::post('/admin/auth/login','AdminAuthController@login');

Route::get('/admin','AdminController@admin_index');

Route::get('/admin/users','AdminController@admin_users');

Route::get('/admin/goods','AdminController@admin_goods');
Route::get('/admin/goods/js','AdminController@admin_goods_js');


Route::get('/admin/goods/search','AdminController@admin_good_search');

Route::delete('/admin/goods/delete','AdminController@admin_goods_delete');

Route::get('/admin/users/{user_id}','AdminController@admin_users_detail');