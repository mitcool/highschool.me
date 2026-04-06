<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckParent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->user()){
            abort(403);
        }
        if(auth()->user()->role_id != 2){
            abort(403);
        }
        if(auth()->user()->invoice_details->city == null 
                || auth()->user()->invoice_details->street ==null
                || auth()->user()->invoice_details->zip ==null
                || auth()->user()->invoice_details->phone==null 
                || auth()->user()->invoice_details->phone_code==null 
                || auth()->user()->invoice_details->street_number==null){
            if(request()->route()->getName() != 'parent.profile'){
                return redirect()->route('parent.profile')->with('error','Please fill your details to continue');
            }
        }
        return $next($request);
    }
}
