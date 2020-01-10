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
Route::get('/faculty/index', 'FacultyController@index')->name('faculty.index');

// student 
Route::post('/student/store', 'StudentController@store')->name('student.store');
Route::get('/student/show/{id}', 'StudentController@show')->name('student.show');
Route::get('/student/index', 'StudentController@index')->name('student.index');

// contact
Route::post('/contact/store', 'ContactController@store')->name('contact.store');
Route::get('/contact/destroy/{user_id}/{contact_id}', 'ContactController@destroy')->name('contact.destroy');
Route::get('/contact/default/{user_id}/{contact_id}', 'ContactController@default')->name('contact.default');


//STD
Route::get('/std/index', 'StdController@index')->name('std.index');

//Fee
Route::get('/fee/defaulters', 'FeeController@defaulters')->name('fee.defaulters');
Route::get('/fee/dataset/{search?}', 'FeeController@dataset')->name('fee.dataset');


// default
Auth::routes();
Route::post('/home/store/image/{id}', 'HomeController@store_image')->name('home.store.image');
Route::get('/home', 'HomeController@index')->name('home');
Route::get("{any}", 'HomeController@index')->where("any", ".*");