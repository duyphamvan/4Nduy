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

//Route::get('/', function () {
//    return view('home.viewhome');
//});

Route::get('/viewhome','HomeController@index')->name('viewhome');

Route::get('/changepassword','HomeController@showChangePasswordForm')->name('showchangepassword');
Route::post('/changepassword','HomeController@changePassword')->name('changePassword');
Auth::routes();
//Route::get('/viewhome', 'HomeController@showPageGuest');

Route::get('/admin', 'HomeController@showPageAdmin');


//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile','HomeController@profile')->name('profile');


//Route categories
Route::get('/list-categories','CategoryHousesController@index')->name('category.index');
Route::get('/houses','CategoryHousesController@display')->name('category.houses');
Route::get('/create-category','CategoryHousesController@create')->name('category.create');
Route::post('/store-categories','CategoryHousesController@store')->name('category.store');
Route::get('{id}/edit-categories','CategoryHousesController@edit')->name('category.edit');
Route::post('{id}/update-categories','CategoryHousesController@update')->name('category.update');
Route::get('{id}/delete-categories', 'CategoryHousesController@destroy')->name('category.delete');

