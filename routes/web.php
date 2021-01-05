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

Route::middleware('auth')->group(function () {

    Route::get('/tweets', 'TweetsController@index')->name('home');
    Route::post('/tweets', 'TweetsController@store');
    Route::post('/tweets/{tweet}/liked', 'LikesController@store')->name('like');

    Route::post('/profiles/{user}/follow', 'FollowsController@store')->name('follow');
    Route::post('/profiles/{user}/unfollow', 'FollowsController@delete')->name('unfollow');
    Route::post('/profiles/{user}/toggle-follow', 'FollowsController@update')->name('toggle_follow');

    Route::get('/profiles/{user}/edit', 'ProfilesController@edit')
        ->name('edit_profile')
        ->middleware('can:edit,user');

    Route::patch('/profiles/{user}', 'ProfilesController@update')
        ->name('update_profile')
        ->middleware('can:edit,user');

    Route::get('/explore', 'ExploreController')->name('explore');
    Route::get('/notifications', 'UserNotificationsController@show')->name('notifications');
});

Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');

Auth::routes();
