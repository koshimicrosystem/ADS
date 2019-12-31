<?php

/*
 Route::get('/', function () {
    return view('welcome');
 });
*/


// welcome
Route::get('/', 'WelcomeController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{route?}', 'HomeController@index')->where('route', '([0-9]+(\/){0,1})*');
