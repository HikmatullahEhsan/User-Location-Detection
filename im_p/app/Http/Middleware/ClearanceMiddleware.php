<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class ClearanceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {        
        if (Auth::user()->hasPermissionTo('Administer roles & permissions')) //If user has this //permission
        {
            return $next($request);
        }

        if ($request->is('tasks/create'))//If user is creating a post
        {
            if (!Auth::user()->hasPermissionTo('Create Task'))
            {
                abort('401');
            } 
            else {
                return $next($request);
            }
        }

       

       
      
        
       
     


        
        
      
        






        return $next($request);
    }

    
}
