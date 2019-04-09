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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('home.viewhome');
});

Route::get('/viewhome','HomeController@index')->name('viewhome');

Route::get('/changepassword','HomeController@showChangePasswordForm')->name('showchangepassword');
Route::post('/changepassword','HomeController@changePassword')->name('changePassword');
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile','HomeController@profile')->name('profile');
