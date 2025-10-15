<?php

namespace App\Http\Middleware;

use Closure;
use Log;
use Auth;
use App\TextsPage;

class CheckAdmin
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
        //IMPLEMENT AUTHENTICATION FIRST
        if(!Auth::check() || Auth::user()->role_id != 1) {
            return redirect()->back();
        }
        $text_pages = TextsPage::all();
        $request->merge(array('text_pages' => $text_pages));
        return $next($request);
    }
}
