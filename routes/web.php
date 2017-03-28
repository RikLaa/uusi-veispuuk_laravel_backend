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

	// Controller for handling the posts requests
	Route::resource('posts', 'PostsController');

});

Route::get('/posts', function(){
  //$posts = DB::table('posts')->get();
  $posts = App\Post::all();
  return view('posts.index', compact('posts'));
});

Route::get('/posts/{tag}', function($tag){
  $post = App\Post::find($tag);
  return view('posts.show', compact('post'));
});


Auth::routes();
Route::get('/home', 'HomeController@index');
