<?php

use App\Post;
use App\User;
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
	

// EVERY API CALL/PATH BEFORE THIS LINE!
});


Auth::routes();

/*Route::get('/posts', function(){*/
  ////$posts = DB::table('posts')->latest()->get();
  //$posts = App\Post::all();

  //return view('posts.index', compact('tasks'));
/*});*/

/*Route::get('/posts/{post}', function($tag){*/
  ////$post = DB::table('posts')->find($tag);
  //$post = App\Task::find($id);

  //return view('posts.show', compact('task'));
//});

Route::get('/home', 'HomeController@index');
