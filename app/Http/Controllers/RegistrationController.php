<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
      return view('sessions.create');
    }
}

public function store(){

  // validation
  $this -> validate(request(), [

    'email' =>'required',
    'password' =>'required',
    'firstName' =>'required',
    'lastName' =>'required',
    'field' =>'required',
    'campus' =>'required',

  ]);

  // create and save the user
$user = User::create(request(['password', 'firstName', 'lastName', 'email', 'field', 'campus']));


/*
// sign in
auth()->login($user);

//redirect to the homepage
return redirect()->home();

    public function create() {

		$new = DB::select("insert into users (userRole, password, pictureURL, firstName, lastName, email, field, campus) values
    (1, 'salasana', '/var/pictures', 'etunimi', 'sukunimi', 'nimi@gmail.com', 'ict', 'dynamo')");
    return 'i created new user';
	}

*/

}
