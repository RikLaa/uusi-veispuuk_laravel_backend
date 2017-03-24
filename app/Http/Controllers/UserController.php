<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
	//return 'here are all users';
	$users = DB::select('select * from users');
	return $users;
	}
    //show user profile info
    public function show() {
		// return 'here is your one and only user';
        $oneuser = DB::select('select userID, pictureURL, firstName, lastName
        from users
        where userID = 1');
        return $oneuser;
	}
	//create a new user
    public function create() {
			$new = DB::select("INSERT INTO users (userRole, pictureURL, firstName, lastName, email, field, campus) VALUES
            (3, 'jotainURL', 'Kirsi', 'Kernel', 'Kirsi@gmail.com', 'Liiketalous', 'Rajakatu')");
	        return $new;
	}
    
}
