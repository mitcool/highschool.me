<?php

use App\Route;

$routes = Route::pluck('route_bg','slug');
return $routes;