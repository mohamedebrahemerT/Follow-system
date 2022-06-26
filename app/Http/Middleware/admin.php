<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        /*if (auth::guard('admin')) 
        {
            return redirect()->route('route.to.payments.payment'); 
        }*/


                if (! auth::guard($guard)->check()) 
                {
                 
                     return redirect('/admin');  
                }
        
        

            
         

        return $next($request);
    }
}

// return redirect('/admin/login');