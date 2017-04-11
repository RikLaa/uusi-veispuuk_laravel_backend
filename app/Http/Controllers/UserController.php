<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //yhden käyttäjän kaikki postaukset
    public function index() {
{       $posts = DB::select('select * from posts where userID = 3  ORDER BY postID DESC LIMIT 6');
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
        
	}
    //show user profile info
    public function show() {
		// return 'here is your one and only user';
        $oneuser = DB::select('select *
        from users
        ');
        return $oneuser;
	}
    
    
    
    
    
	//create a new user
    public function create() {
      
			$new = DB::select("insert into users (userRole, password, pictureURL, firstName, lastName, email, field, campus) values
(1, 'salasana', '/var/pictures', 'etunimi', 'sukunimi', 'nimi@gmail.com', 'ict', 'dynamo')");
	        return 'i created new user';
	}

}
