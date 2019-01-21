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
/* Show Index Page */
Route::get('/', 'FlatController@ShowIndex');
Route::get('/home', 'FlatController@ShowIndex');
Route::get('contactus', 'FlatController@Contact');
Route::post('register', 'UsersController@RegisterUser');

Route::group(['middleware' => ['guest']], function () {
    Route::post('login', 'Auth\LoginController@login');
});

Route::get('logout', 'UsersController@Logout');
Route::get('landlord', 'FlatController@Landlords');
Route::post('upload', 'FlatController@UploadImages');
Route::post('insert_description', 'FlatController@InsertDescription');
Route::get('flats', 'FlatController@Flats');
Route::get('single/{id}', 'FlatController@Single');
Route::get('account', 'UsersController@Account');
