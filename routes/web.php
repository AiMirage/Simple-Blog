<?php

use Illuminate\Support\Facades\Route;

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

//Route::resource('posts', 'PostsController');
//Route::resource('users', 'UsersController');

//Route::get('/posts', 'BlogController@showPosts');
//Route::get('/posts/{id}', 'BlogController@showPost');

Route::resource('posts', 'BlogController');