<?php

namespace App;

use App\Core\Route\{Route, RouteDispatcher};

class App 
{
    public static function run()
    {
        foreach (Route::getRoutesGet() as $routeConfiguration) {

            $routeDispatcher = new RouteDispatcher($routeConfiguration);
            $routeDispatcher->process();
        }

        echo 'App is running!';
    }
}