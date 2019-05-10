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
Route::post('/house/rate', 'HomeController@rateHouse')->name('rate');
Route::get('/search', 'HomeController@search')->name('search');

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
Route::get('{id}/update-status', 'HouseController@updateStatusRented')->name('house.status');
Route::get('{id}/update-status-house', 'HouseController@updateStatusDestroy')->name('house.destroystatus');
Route::get('{id}/show-status-house', 'HouseController@showRentalSchedule')->name('house.show');
Route::get('{id}/show-status-house-pending', 'HouseController@showStatusPending')->name('house.show-pending');
Route::get('total-money', 'HouseController@totalMoneyByBooking')->name('house.total');

//Route comment
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

//Route profile
Route::get('/profile/{id}', 'ProfileController@showProfile')->name('user.show');
Route::get('/edit/{id}', 'ProfileController@edit')->name('user.edit');
Route::post('/update/{id}', 'ProfileController@update')->name('user.update');
Route::get('/cancel-booking/{id}', 'ProfileController@cancelBooking')->name('user.cancel');

//Route booking
Route::post('create/booking/{id}', 'BookingController@store')->name('booking.store');
Route::post('payment/booking/{id}', 'BookingController@payment')->name('booking.payment');

//Route send email
Route::get('/sendemail', 'SendEmailController@index')->name('send-email');
Route::post('/sendemail/send/', 'SendEmailController@send');



