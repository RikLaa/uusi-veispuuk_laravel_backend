<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;


class SessionsController extends Controller
{
    public function index() {
        return "valid";
    }
    
  /*public function getSession(Request $request){
      if($request->session()->has('email'))
          $emailInSession = $request->session()->get('email');
          echo $emailInSession;
      else{
          echo 'no data in session';
      }
  }
    
    public function putSession(Request $request){
        $request->session()->put('email', $email);
        echo 'data is added to session';
    }
    
    public function forgetSession(Request $request){
        $request->session()->forget('email');
    }*/

  public function authenticate(Request $request) {
      $email = $request['email'];
      $password = $request['password'];

      if (Auth::attempt(['email' => $email, 'password' => $password])) {
          
          //Session::set('email', $email);
          $request->session()->set('email', $email);
          
          
          return 'true';
      } else {
          return 'false';
      }

  }
}
