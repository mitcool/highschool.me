<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Config;

class AppServiceProvider extends ServiceProvider
{
   
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        Paginator::useBootstrap();
        $languages = array_keys(Config::get('languages'));
        $lang ='en';
        session()->put('applocale',$lang);
        app()->setLocale(session()->get('applocale'));
        Schema::defaultStringLength(191);
        \Validator::extend('recaptcha', 'App\\Validators\\ReCaptcha@validate');
    }
}
