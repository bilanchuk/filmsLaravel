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

Route::get('/', 'FilmController@show');

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/info','UserInfoController@show')->name('user-info');
Route::get('/infoname','UserInfoController@changeInfo');
Route::get('/infomail','UserInfoController@changeInfo');
Route::get('/infotel','UserInfoController@changeInfo');
Route::get('/infodate','UserInfoController@changeInfo');
Route::post('/changename','UserInfoController@change');
Route::post('/changemail','UserInfoController@change');
Route::post('/changetel','UserInfoController@change');
Route::post('/changedate','UserInfoController@change');
Route::get('/changePassword','UserInfoController@showChangePasswordForm');
Route::get('/category/{currentCategory}','FilmController@categoryShow');
Route::get('/film/{id}','FilmController@showCurrentFilm');
Route::get('/favorite/{id}','FilmController@addFavorite');
Route::get('/delete/{id}','FilmController@deleteFavorite');
