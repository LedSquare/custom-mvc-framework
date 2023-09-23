<?php

namespace App\Controllers;

use App\Core\Route\{Route, RouteConfiguration, RouteDispatcher};

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