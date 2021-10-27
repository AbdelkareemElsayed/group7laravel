<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        if(auth('admin')->check()){

            return $next($request);
      
          }else{
      
            return redirect(url('/Admins/Login'));
          }
      
    }
}
