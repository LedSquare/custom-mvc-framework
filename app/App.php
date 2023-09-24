<?php

namespace App;

use App\Core\Route\{Route, RouteDispatcher};

class App 
{
    public static function run()
    {
        // debug($_SERVER['DOCUMENT_ROOT']);

        foreach (Route::getRoutesGet() as $routeConfiguration) {

            $routeDispatcher = new RouteDispatcher($routeConfiguration);
            $routeDispatcher->process();
        }
    }
}