<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class PostsController extends Controller
{
    public function index() {
        //return 'here are all the posts';
        $posts = DB::select('select * from posts ORDER BY postID DESC');
        $comments = DB::select('select * from comments');

        $allPosts = array();

        // Loop through all posts
        foreach ($posts as $post) {
            // Create array for comments, inside post-object
            $post->comments = array();

            // loop through comments and append comments to the commenst array if postID matches
            foreach ($comments as $comment) {
                if ($comment->postID == $post->postID) {
                    array_push($post->comments, $comment);
                }
            }

            // append the ready post-object to the allPosts array
            array_push($allPosts, $post);
        }

        return $allPosts;
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
        $data = $request->json()->all();
        $title = $data['phptitle'];
        return $title;

    }
	// DELETE /api/posts/1
	public function destroy() {
		return 'I have deleted your post now';
	}
    
	//create a new post
    //GET api/posts/create
	public function create(Request $request) {
         $data = $request->all();
         $title = $data['title'];
        $content = $data['content'];
        $tag = $data['tag'];
       
        
      $new = DB::select("INSERT INTO posts (userID, postType, tag, title, content) VALUES
        (3, 1, '$tag', '$title', '$content')");
	       return $new;
    }
    
    
	//create a new IMAGEpost
    //post metodi api/posts/image
	public function createImage(Request $request) {
        $data = $request->all();
       $image = $data['image'];
       $tag = $data['tag'];
       
        
    $new = DB::select("INSERT INTO posts (userID, postType, pictureURL, tag, title, content) VALUES (3, 2, '$image', '$tag', ' ', ' ')");
   //  return $image;
	     return $new;
    

    }


	
    ///PUT api/posts/1
	public function update() {
		return 'updated!';
	}
}
