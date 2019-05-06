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

//Route comment
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

//Route profile
Route::get('/admin', 'HomeController@showPageAdmin')->name('admin.admin');
Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::prefix('/users')->group(function () {
        Route::get('/', 'UserController@index')->name('users.index');
        Route::get('/create', 'UserController@create')->name('users.create');
        Route::post('/create', 'UserController@store')->name('users.store');
        Route::get('/{id}/delete', 'UserController@destroy')->name('users.destroy');
        Route::get('/{id}/update', 'UserController@update')->name('users.update');
        Route::post('/{id}/update', 'UserController@edit')->name('users.edit');
    });
});
Route::prefix('/client')->group(function (){
    Route::get('/{id}/profile', 'UserController@profiles')->name('users.profiles');
    Route::post('/{id}/update', 'UserController@editProfile')->name('client.users.edit');

});

// Route search
Route::get('/search', 'HomeController@search')->name('search');
///
/// Route booking

Route::prefix('/booking')->group(function (){
    Route::get('/', 'BookingsController@index')->name('booking.index');
    Route::get('/{house_id}/create', 'BookingsController@create')->name('booking.create');
    Route::post('/{house_id}/{id}/store-booking','BookingsController@store')->name('booking.store');
});
