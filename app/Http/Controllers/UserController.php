<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
	//return 'here are all users';
	$users = DB::select('select * from user');
	return $users;
	}
    
    
    
    
}
