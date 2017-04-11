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
          
          //Session::set('email', $email);
          $checkSession = $request->session()->set('email', $email);
          
          if ($checkSession) {
              
              //return redirect('/api/posts');
              return true;
              
          } else  {
              
              //return redirect('/api/login');
              return false;
              
          }

        }
      
      
}
    public function logout(Request $request){
        
        $request->session()->flush();
        return redirect('/api/login');
        
    }
}
