<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index() {
	//return 'here are all the posts';
	$posts = DB::select('select * from posts');
	return $posts;
	}

	public function show() {
		return 'here is your one and only post';
	}
	
	public function destroy() {
		return 'I have deleted your post now';
	}
	
	public function create() {
		return 'I created new post for you';
	}
	
	public function update() {
		return 'updated!';
	}
}
