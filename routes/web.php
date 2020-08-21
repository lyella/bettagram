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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//hierarchy

Route::post('/follow/{user}','FollowController@store'); 


Route::get('/','PostsController@index');
Route::post('/post','PostsController@store');
Route::get('/post/create','PostsController@create');
Route::get('/post/{post}','PostsController@show');


//user hierarchy
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.index');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
