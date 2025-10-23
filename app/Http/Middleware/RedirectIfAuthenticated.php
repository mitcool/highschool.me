<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
        if (Auth::guard($guard)->check()) {
            if(auth()->user()->role_id == 1){
                return redirect('/admin/dashboard');
            }
            elseif(auth()->user()->role_id == 2){
                return redirect('/parent/dashboard');
            }
            elseif(auth()->user()->role_id == 3){
                return redirect('/partner/dashboard');
            }
            elseif(auth()->user()->role_id == 4){
                return redirect('/student/dashboard');
            }
            elseif(auth()->user()->role_id == 5){
                return redirect('/teacher/dashboard');
            }
            
        }

        return $next($request);
    }
}

