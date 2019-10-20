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

use Illuminate\Support\Facades\Route;


Route::get('/', 'IndexController@index')->name('home');
Route::get('/how-to-start', 'IndexController@howToStart')->name('how-to-start');

Route::prefix('/donate')->as('donate')->group(function () {
    Route::get('/', 'DonateController@index');
    Route::get('/i{donate}/confirm', 'DonateController@confirm')->name('.confirm');
    Route::post('/i{donate}/confirm', 'DonateController@buy')->name('.buy');
    Route::get('/code', 'DonateController@promo')->name('.promo');
    Route::post('/code', 'DonateController@activate')->name('.promo');
    Route::get('/addfunds', 'DonateController@addfunds')->name('.addfunds');
});
Route::prefix('/s{server}')->group(function () {
   Route::get('/id{user}', 'ProfileController@index')->middleware('auth')->name('profile');
   Route::as('stats')->group(function () {
       Route::get('/online', 'StatsController@online')->name('.online');
       Route::get('/fraction/{fraction}', 'StatsController@fraction')->name('.fraction');
       Route::get('/leaders', 'StatsController@leaders')->name('.leaders');
       Route::get('/ban-list', 'StatsController@banList')->name('.banlist');
       Route::get('/change-name', 'StatsController@changeNames')->name('.change_names');
   });
});
Route::prefix('/minigames')->namespace('Games')->as('games')->group(function () {
    Route::get('/chests', 'ChestsController@index')->name('.chests');
});
Route::middleware('auth')->prefix('/v{version}/api')->group(function () {
    Route::post('/minigames.chests', 'Games\ChestsController@load');
});
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
