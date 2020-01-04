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

// faculty
Route::post('/faculty/store', 'FacultyController@store')->name('faculty.store');
Route::get('/faculty/show/{id}', 'FacultyController@show')->name('faculty.show');

// contact
Route::post('/contact/store', 'ContactController@store')->name('contact.store');
Route::get('/contact/destroy/{user_id}/{contact_id}', 'ContactController@destroy')->name('contact.destroy');
Route::get('/contact/default/{user_id}/{contact_id}', 'ContactController@default')->name('contact.default');


// default
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get("{any}", 'HomeController@index')->where("any", ".*");