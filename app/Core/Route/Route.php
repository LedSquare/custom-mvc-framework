<?php

namespace App\Core\Route;

// use App\Core\Route\RouteConfiguration;
use App\Core\Route\RouteConfigurationFactory;

class Route 
{
    private static array $routesGet = [];
    private static array $routesPost = [];

    public static function get(string $route, array $controller): RouteConfiguration
    {   
        $routeConfiguration = RouteConfigurationFactory::create($route, $controller[0], $controller[1]);
        self::$routesGet[] = $routeConfiguration;
        return $routeConfiguration;
    }


    public static function post(string $route, array $controller): RouteConfiguration
    {   
        $routeConfiguration = RouteConfigurationFactory::create($route, $controller[0], $controller[1]);
        self::$routesPost[] = $routeConfiguration;
        return $routeConfiguration;
    }
    
    /**
     * Get the value of routesGet
     */ 
    public static function getRoutesGet(): array
    {
        return self::$routesGet;
    }
}