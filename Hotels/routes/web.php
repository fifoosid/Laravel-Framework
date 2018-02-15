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
Route::get('/', function() {
    return redirect('/home');
});
Route::get('/home','HotelsController@index')
    ->name('home');

Route::get('/hotels/random', 'HotelsController@random');
Route::get('/hotels/create', 'HotelsController@create');
Route::get('/hotels/all', 'HotelsController@all')
    ->name('allHotels');
Route::get('/hotels/search', 'HotelsController@search');
Route::post('/hotels', 'HotelsController@store');
Route::get('/hotels/{hotel}', 'HotelsController@show');

Route::get('/about', function()
{
    return view('layouts.about');
});

Route::post('/comment', 'CommentsController@add');

Route::get('/profile/main', 'Auth\ProfileController@main');
Route::post('/profile/updateMain', 'Auth\ProfileController@updateMain');
Route::get('/profile/password', 'Auth\ProfileController@password');
Route::post('/profile/updatePassword', 'Auth\ProfileController@updatePassword');


Auth::routes();
Route::get('/logout', 'Auth\LogoutController@logout');

// Route::get('/home', 'HomeController@index');
