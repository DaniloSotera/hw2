<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('login', 'App\Http\Controllers\LoginController@login');
Route::post('login', 'App\Http\Controllers\LoginController@do_login');
Route::get('signup', 'App\Http\Controllers\LoginController@signup');
Route::post('signup', 'App\Http\Controllers\LoginController@do_signup');
Route::get('signup/check/{field}', 'App\Http\Controllers\LoginController@check');
Route::get('home', 'App\Http\Controllers\HomeController@home');
Route::get('search_content', 'App\Http\Controllers\HomeController@search_spotify');
Route::get('profile', 'App\Http\Controllers\HomeController@profile');
Route::post('save_song', 'App\Http\Controllers\HomeController@save_song');


Route::get('logout', function() {
    Session::flush();
    return redirect('login');
});
