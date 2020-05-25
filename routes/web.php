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

Auth::routes();
Route::group(['middleware' => 'auth'], function()
{
    Route::resource('tweets', 'TweetController', [ 'except' => ['index', 'show']]);
});
Route::get('/', 'TweetController@index')->name('root');
Route::get('/tweets', 'TweetController@index')->name('tweets.index');
Route::get('tweets/{id}', 'TweetController@show')->name('tweets.show');

Route::get('/home', 'HomeController@index')->name('home');
