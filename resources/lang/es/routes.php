<?php

use App\Route;

$routes = Route::pluck('route_es','slug');
return $routes;