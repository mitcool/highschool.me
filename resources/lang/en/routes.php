<?php

use App\Route;

$routes = Route::pluck('route_en','slug'); // pluck return array with key second parameter
return $routes;