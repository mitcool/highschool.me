<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Study;
use App\DynamicNewsTranslation;
use App\Tutorial;
use App\FaqCategory;
use App\Conference;
use App\DynamicNewsCategory;
use App\Image;
use App\DynamicNews;

class SitemapController extends Controller
{
    //XML SITEMAP
    public function sitemap(Request $request){
        $routes = collect(Route::getRoutes())->filter(function ($route) {
            $middlware_filter = in_array('text', $route->middleware());
            $params_filter = !str_contains($route->uri(), '{');
            return $middlware_filter && $params_filter;
        });
       
        return response()
            ->view('sitemap', compact('routes'))
            ->header('Content-Type', 'application/xml');
    }
     //HTML SITEMAP
    public function showSitemapHTML(Request $request) {
     
        return view('pages.footer.sitemap');
    }
     //RSS SITEMAP
    public function rss(){
        $news = DynamicNews::all();
        if(request()->segment(1) == 'de'){
          return response()->view('rss', ['news' => $news])->header('Content-Type', 'application/xml');
        }
        return response()->view('rss-en', ['news' => $news])->header('Content-Type', 'application/xml');
    }
     //IMAGE SITEMAP
    public function imageSitemap(Request $request) {
        $images = Image::select('src')->get();

        return response()->view('sitemap-images', ['images' => $images])->header('Content-Type', 'application/xml');
    }
}
