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

Route::get('/followers', 'App\Http\Controllers\TweetApiController@followers');
Route::get('/tweets', 'App\Http\Controllers\TweetApiController@tweets');
Route::get('/likes', 'App\Http\Controllers\TweetApiController@likes');

Route::get('/scrap', 'App\Http\Controllers\ScrapController@scrap');
