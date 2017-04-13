<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class SessionsController extends Controller
{

  public function authenticate(Request $request) {
      $email = $request['email'];
      $password = $request['password'];
      
      $checkUser = DB::table('users')->where('email', '=', $email)->first();
      
      if (isset($checkUser)) {
          $checkPassword = $checkUser->password;
          
          
         if(password_verify($password, $checkPassword)){
            
              session(['email' => $email]);
              return 'true';
          }else{
              
              return 'false';
          }
          
      } 
      
      
  }
    public function logout(Request $request){
        
        //Auth::logout();
        //return $request;
        $request->session()->flush();
        return 'true';
        
    }
}

