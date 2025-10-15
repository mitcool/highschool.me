<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Route;

class TranslateUrl
{
    
    public function handle(Request $request, Closure $next)
    {
        $lang = 'en';
        app()->setLocale($lang);
        session()->put('applocale',$lang);
        return $next($request);
	}
}


