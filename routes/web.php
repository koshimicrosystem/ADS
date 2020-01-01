<?php

/*
 Route::get('/', function () {
    return view('welcome');
 });
*/


// welcome
Route::get('/', 'WelcomeController@welcome')->name('welcome');
Route::get('/contactus', 'WelcomeController@contactus')->name('contactus');

// contactus
Route::post('/contactus/store', 'ContactusController@store')->name('contactus.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{route?}', 'HomeController@index')->where('route', '([0-9]+(\/){0,1})*');
