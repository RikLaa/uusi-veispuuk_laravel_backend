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

    public function store(Request $request) {
        $data = $request->input('phptitle');
        return $data;

    }
	// DELETE /api/posts/1
	public function destroy() {
		return 'I have deleted your post now';
	}
	//create a new post
    //GET api/posts/create
	public function create(Request $request) {
        // $data = $request->json()->all();
        // $title = $data;
        // return $title;


    }



	
    ///PUT api/posts/1
	public function update() {
		return 'updated!';
	}
}
