<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Route;
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
        $lang = $request->segment(1);
        app()->setLocale($lang);
        //studies and programs
        $static_routes = Route::where('sitemap',1)->get();
        $studies = Study::with('translated')->get();
        $news = DynamicNewsTranslation::where('locale',$lang)->get();
        $tutorials = Tutorial::where('type', 0)->get();
        $faq_categories = FaqCategory::all();
        $conferences = Conference::all();
        $categoriesNews = DynamicNewsCategory::get();

        return response()
            ->view('sitemap', compact('lang','static_routes','studies','news', 'tutorials','faq_categories','conferences','categoriesNews'))
            ->header('Content-Type', 'application/xml');
    }
     //HTML SITEMAP
    public function showSitemapHTML(Request $request) {
        $studies = Study::all();
        $second_column_routes = Route::whereIn('slug',['digital-studies','recognition','student-advisory-service','study-financing','study-registration'])->get();
        $third_column_routes = Route::whereIn('slug',['conferences-and-workshops','conference-calendar','coaching','publishing','publishing-services'])->get();
        $fourth_column_routes = Route::whereIn('slug',['about','code-of-ethics','blog','accreditation','academics'])->get();
        $fifth_column_routes = Route::whereIn('slug',['help-desk','faq','privacy-policy','contact-us','imprint','terms-and-conditions','examination-rules'])->get();
        
        return view('pages.resources.html-sitemap')
            ->with('studies',$studies)  //first column
            ->with('second_column_routes',$second_column_routes)
            ->with('third_column_routes',$third_column_routes)
            ->with('fourth_column_routes',$fourth_column_routes)
            ->with('fifth_column_routes',$fifth_column_routes);
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
