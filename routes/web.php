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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('home','NewsController@index');
Route::get('manage/news','NewsController@index');
Route::resource('manage/news','NewsController');
Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/tech', 'HomeController@index');

Route::get('/about', 'HomeController@index');

Route::get('/news', 'HomeController@index');

Route::get('/solution', 'HomeController@index');

Route::get('/job', 'HomeController@index');
