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
    return view('layout.skeleton');
});

Route::group(['middleware'=>['guest']],function(){
    Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
    Route::post('/auth', 'Auth\LoginController@login')->name('auth');

    Route::get('/select/estado-civil', 'MritalStatusController@getMaritalStatus');
    Route::get('/select/genero', 'GenderController@getGender');
    Route::get('/select/interes', 'InterestController@getInterest');

    Route::get('/registro', 'UserController@index')->name('register');
    Route::post('registrar/usuario', 'UserController@store');
});

Route::group(['middleware'=>['auth']],function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});