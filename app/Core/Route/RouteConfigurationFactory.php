<?php
namespace App\Core\Route;

use App\Core\Route\RouteConfiguration;


final class RouteConfigurationFactory 
{
    public RouteConfiguration $routeConfiguration;

    public static function create(string $route, string $controller, string $action):RouteConfiguration
    {
        return new RouteConfiguration($route, $controller, $action);
    }
}
