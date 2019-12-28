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
