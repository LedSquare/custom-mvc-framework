<?php

namespace App\Core\Route;
 
class RouteConfiguration
{
    public string $route;
    public string $controller;
    public string $action;
    private string $name;
    private string $middleware;

    public function __construct(string $route, string $controller, string $action)
    {
        $this->route = $route;
        $this->controller = $controller;
        $this->action = $action;
    }

    public function name(string $name): RouteConfiguration 
    {
        $this->name = $name;
        return $this;
    }

    public function middleware(string $middleware): RouteConfiguration
    {
        $this->middleware = $middleware;
        return $this;
    }
}