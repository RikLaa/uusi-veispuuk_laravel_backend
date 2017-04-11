<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        // if($request->session()->get('email') !== null)
        if($request->session()->has('email')) {
            
            return $next($request);
            
        } else {
            
            //return false;
            echo 'not allowed';
            
        }
        
        
        
    }
}
