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

Route::get('/viewhome', function () {
    return view('home.viewhome');
});

Route::get('/changepassword','HomeController@showChangePasswordForm')->name('showchangepassword');
Route::post('/changepassword','HomeController@changePassword')->name('changePassword');
Auth::routes();
Route::get('/','HomeController@index')->name('viewhome');
Route::get('/viewhome','HomeController@index')->name('viewhome');
Route::get('/admin', 'HomeController@showPageAdmin');
Route::get('/profile','HomeController@profile')->name('profile');
Route::get('/categories/{id}', 'HomeController@filterByCategory')->name('filter');
Route::get('/house/{id}', 'HomeController@showHouse')->name('show');

//Route categories
Route::get('/list-categories','CategoryHousesController@index')->name('category.index');
Route::get('/create-category','CategoryHousesController@create')->name('category.create');
Route::post('/store-category','CategoryHousesController@store')->name('category.store');
Route::get('{id}/edit-category','CategoryHousesController@edit')->name('category.edit');
Route::post('{id}/update-category','CategoryHousesController@update')->name('category.update');
Route::get('{id}/delete-category', 'CategoryHousesController@destroy')->name('category.delete');


//Route house
Route::get('/list-houses','HouseController@index')->name('house.index');
Route::get('/create-house','HouseController@create')->name('house.create');
Route::post('/store-house','HouseController@store')->name('house.store');
Route::get('{id}/edit-house','HouseController@edit')->name('house.edit');
Route::post('{id}/update-house','HouseController@update')->name('house.update');
Route::get('{id}/delete-house', 'HouseController@destroy')->name('house.delete');




