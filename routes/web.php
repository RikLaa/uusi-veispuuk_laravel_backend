<?php

use App\Post;
use App\User;


$prefix = '/api';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api', function() {
	return 'Welcome to our api!';
});

// prefixing the the path to /api/*your path*
Route::group(['prefix' => 'api'], function() {

	Route::resource('posts', 'PostsController');

    // Controller for handling the user requests
	Route::resource('user', 'UserController');

  // Authentication routes
  //Route::get('/register', 'RegistrationController@create');
  Route::post('/register', 'RegistrationController@store');

  Route::post('/login', 'SessionsController@authenticate');
  //Route::('/logout', 'SessionsController@destroy');


// EVERY API CALL/PATH BEFORE THIS LINE!
});


Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
