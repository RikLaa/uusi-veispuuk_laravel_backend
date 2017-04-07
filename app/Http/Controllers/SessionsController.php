<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
  /*public function create()*/
  //{
    //return view('sessions.create');
  /*}*/

  public function authenticate(Request $request) {
      $email = $request['email'];
      $password = $request['password'];

      if (Auth::attempt(['email' => $email, 'password' => $password])) {
          return 'true';
      } else {
          return 'false';
      }

  }
}
