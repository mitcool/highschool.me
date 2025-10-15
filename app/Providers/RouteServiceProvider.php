<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Str;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    { 
        $this->removeIndexPHPFromURL();

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapRedirectRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapRedirectRoutes(){
        Route::namespace($this->namespace)
            ->group(base_path('routes/redirects.php'));
   }
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapAdminRoutes(){
         Route::namespace($this->namespace)
             ->group(base_path('routes/admin.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
	
    protected function removeIndexPHPFromURL()
    {
		 
        if (Str::contains(request()->getRequestUri(), 'index.php')) {  
			$url = str_replace('public/index.php', '', request()->getRequestUri());
			if($url == '/'){
				if (strlen($url) > 0) {
					header("Location: $url", true, 301);
					exit;
				}
			}
			else{
				$url = str_replace('/public/index.php', '', request()->getRequestUri());
				if (strlen($url) > 0) {
					header("Location: $url", true, 301);
					exit;
				}
			}
        }
    }
}
