<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Text as TextModel;

class Text
{
    public function handle(Request $request, Closure $next)
    {
        $texts = TextModel::where('slug',request()->route()->getName())->pluck('text_en','title');        
        $request->merge(array('texts' => $texts)); 
        return $next($request);
    }
}
