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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/','ShortLinkController@index');

Route::get('/new','ShortLinkController@create');
//Route::get('/new','ShortLinkController@index');
Route::post('/save','ShortLinkController@store');
Route::get('/gt/{code}','ShortLinkController@check');


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
