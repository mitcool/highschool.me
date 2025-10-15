<?php

use App\Route;

$routes = Route::pluck('route_de','slug');
return $routes;