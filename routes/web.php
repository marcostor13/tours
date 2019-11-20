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


Route::get('/home/{page}', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index2')->name('home');


Route::post('/get-forms', 'Partials\FormsController@getForms');

Route::get('logout', 'Auth\LoginController@logout');

Auth::routes();


