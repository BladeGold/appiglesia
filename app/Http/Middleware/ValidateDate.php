<?php

namespace App\Http\Middleware;

use Closure;
use App\UserDate;
use Illuminate\Support\Facades\Auth;

class ValidateDate
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
        if(UserDate::find(Auth::user()->id) == false ){
            
            return redirect('users/registerdate');
        }
        else{
            return $next($request);
        
        }
       
    }
}
