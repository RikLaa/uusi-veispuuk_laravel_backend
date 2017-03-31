<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function create()
    {
      //return view('sessions.create');
    }


    public function store (Request $request){



        // validation
        $this -> validate(request(), [

            'email' =>'required',
            'password' =>'required',
            'firstName' =>'required',
            'lastName' =>'required',
            'field' =>'required',
            'campus' =>'required',

        ]);

        $user = $request->all();
        $user['userRole'] = 1;

    /*$new = DB::select("insert into users (userRole, password, pictureURL, firstName, lastName, email, field, campus) values
    (1, 'salasana', '/var/pictures', 'etunimi', 'sukunimi', 'nimi@gmail.com', 'ict', 'dynamo')");*/
        // create and save the user
        $id = DB::table('users')->insertGetId([

            'userRole' => 1,
            'password' => bcrypt($user['password']),
            'pictureURL' => '/var/www/pictures',
            'firstName' => $user['firstName'],
            'lastName' => $user['lastName'],
            'email' => $user['email'],
            'field' => $user['field'],
            'campus' => $user['campus']

        ]);

        if (is_int($id)) {

            return 'true';

        } else {

            return 'false';
        }
        // return $id;


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
}
