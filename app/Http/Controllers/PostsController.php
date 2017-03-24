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

    //show posts from one user
    ///GET api/posts/1
    public function show() {
        $onepost = DB::select('select postType, tag, date, title, content
        from posts
        where userID = 1');
        return $onepost;
	}
	// DELETE /api/posts/1
	public function destroy() {
		return 'I have deleted your post now';
	}
	//create a new post
    //GET api/posts/create
	public function create() {
			$new = DB::select("INSERT INTO posts (userID, postType, tag, title, content) VALUES
            (1, 1, 'TAAAG', 'TITLE TITLE', 'CONTENT CONTENT')");
	           return 
                   'I have created a brand new post!';
                   $new;
	}
	
    ///PUT api/posts/1
	public function update() {
		return 'updated!';
	}
}
