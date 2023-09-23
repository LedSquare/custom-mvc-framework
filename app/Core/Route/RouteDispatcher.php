<?php

namespace App\Core\Route;

use App\Core\Route\RouteConfiguration;

class RouteDispatcher 
{
    private string $requestUri = '/';

    private RouteConfiguration $routeConfiguration;

    public function __construct(RouteConfiguration $routeConfiguration)
    {
        $this->routeConfiguration = $routeConfiguration;
    }

    public function process()
    {
        $route = $_SERVER['REQUEST_URI'];

    }    

    private function saveRequestUri(): void
    {
        if ($_SERVER['REQUEST_URI'] !== '/'){
            $this->requestUri = $this->clean($_SERVER['REQUEST_URI']);
        }
    }

    private function clean($str): string 
    {
        return preg_replace('/(^\/)|(\/$)/', '', $str);
    }
}