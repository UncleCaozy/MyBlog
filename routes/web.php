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

Route::get('/','PostsController@index');
Route::post('/post/upload','PostsController@upload');
Route::resource('discussions','PostsController');
Route::resource('comment','CommentsController');

Route::get('/user/register','UsersController@register');
Route::get('/user/avatar','UsersController@avatar');
Route::get('/user/my_discussions','UsersController@my_discussions');
Route::get('/user/my_comments','UsersController@my_comments');
Route::post('/user/avatar','UsersController@changeAvatar');
Route::post('/user/register','UsersController@store');
Route::get('/user/login','UsersController@login');
Route::post('/user/login','UsersController@signin');
Route::get('/logout','UsersController@logout');