<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class SessionsController extends Controller
{
  /*public function create()*/
  //{
    //return view('sessions.create');
  /*}*/

  public function authenticate(Request $request) {
      $email = $request['email'];
      $password = $request['password'];
      
      $checkUser = DB::table('users')->where('email', '=', $email)->first();
      
      /*if(isset($checkUser)){
          
          echo 'gfdsgfdsggfs';
      }else{
          
          echo 'false';
      }*/
      
      if (isset($checkUser)) {
          $checkPassword = $checkUser->password;
          
      
          
        /*  if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            echo 'asdfsa';
        }
          */
          
          
         if(password_verify($password, $checkPassword)){
            
              session(['email' => $email]);
              return 'true';
          }else{
              
              return 'false';
          }
          
          
          
          /*if (Hash::check($password, $checkPassword)) {
              echo 'login ok';
          }*/
              
          //if (Auth::attempt([$checkUser->email => $email, $checkPassword => $password]))
              
          /*if (password_verify($password, $checkPassword)) {
      
                session(['email' => $email]);
                //echo 'login yes';
              return true;
          }*/
          //echo $password . '-******-' . $checkPassword;
    //      echo typeof($password);
      } 
      
        
      
       /* if ($checkSession) {
              
              //return redirect('/api/posts');
              return 'true';
              
          } else  {
              
              //return redirect('/api/login');
              //return false;
              return 'false';
          }*/
      
      
      /*$request->session()->set('email', $email);
      /**/
      
  }
    public function logout(Request $request){
        
        //Auth::logout();
        //return $request;
        $request->session()->flush();
        //return redirect('/api/login');
        
    }
}



//if (Auth::attempt(['email' => $email, 'password' => $password])) {
          
          //Session::set('email', $email);
     // $request->session()->set('email', $email);
          //$checkSession = $request->session()->set('email', $email);
          
          /*if ($checkSession) {
              
              //return redirect('/api/posts');
              return 'true';
              
          } else  {
              
              //return redirect('/api/login');
              //return false;
              return 'false';
          }

       // }*/
      //return $email;
      //return $request->session()->all();
