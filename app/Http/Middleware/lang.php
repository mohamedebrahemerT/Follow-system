<?php

namespace App\Http\Middleware;

use Closure;
use  App;
class lang
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
            
     
    if (Session('lang')) 
    {
        $lang= Session('lang');
      App::setLocale($lang);
    }
    else
    {
         $lang= 'en';
      App::setLocale($lang);
    }

       
                return $next($request);
        }

        
    }

