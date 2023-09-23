<?php

namespace App\Core\Route;

use App\Core\Route\RouteConfiguration;

class RouteDispatcher 
{
    private string $requestUri = '/';
    private array $parameterMap = [];
    private RouteConfiguration $routeConfiguration;

    public function __construct(RouteConfiguration $routeConfiguration)
    {
        $this->routeConfiguration = $routeConfiguration;
    }

    public function process()
    {
        $this->saveRequestUri();

        $this->setParameterMap();


    }    

    /**
     * The method determines the current field of the url address 
     * and clears the route of unnecessary slashes
     */
    private function saveRequestUri(): void
    {
        if ($_SERVER['REQUEST_URI'] !== '/'){
            $this->requestUri = $this->clean($_SERVER['REQUEST_URI']);
            $this->routeConfiguration->route = $this->clean($this->routeConfiguration->route);
        }
    }

    
    private function clean($str): string 
    {
        return preg_replace('/(^\/)|(\/$)/', '', $str);
    }


    private function setParameterMap()
    {
        $routeArray = explode('/', $this->routeConfiguration->route); 
        
        foreach ($routeArray as $paramKey => $param) {
            if (preg_match('/{.*}/', $param)){

                $this->parameterMap[$paramKey] = preg_replace('/(^{)|( }$)/', '', $param);

            }
        }

        // debug($this->requestUri); 
        // debug($this->parameterMap); 
    }
}