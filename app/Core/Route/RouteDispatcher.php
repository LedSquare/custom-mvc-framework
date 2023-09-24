<?php

namespace App\Core\Route;

use App\Core\Route\RouteConfiguration;

class RouteDispatcher 
{
    private array $parameterMap = [];
    private array $paramRequestMap = [];

    private string $requestUri = '/';
    private RouteConfiguration $routeConfiguration;

    public function __construct(RouteConfiguration $routeConfiguration)
    {
        $this->routeConfiguration = $routeConfiguration;
    }

    public function process(): void
    {
        $this->saveRequestUri();

        $this->setParameterMap();

        $this->makeRegexRequest();

        $this->match();


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


    private function setParameterMap(): void
    {
        $routeArray = explode('/', $this->routeConfiguration->route); 
        
        foreach ($routeArray as $paramKey => $param) {
            if (preg_match('/{.*}/', $param)){

                $this->parameterMap[$paramKey] = preg_replace('/(^{)|(}$)/', '', $param);

            }
        }
    }

    private function makeRegexRequest(): void
    {
        $requestUriArray = explode('/', $this->requestUri);

        foreach ($this->parameterMap as $paramKey => $param) {
            if (!isset($requestUriArray[$paramKey])){
                return;
            }

            $this->paramRequestMap[$param] = $requestUriArray[$paramKey];
            $requestUriArray[$paramKey] = '{.*}';

        }
        $this->requestUri = implode('/', $requestUriArray);
        $this->prepareRegex();
    }   

    private function prepareRegex(): void
    {
        $this->requestUri = str_replace('/', '\/', $this->requestUri);
    }

    private function match(): void
    {
        if (preg_match("/$this->requestUri/", $this->routeConfiguration->route)) {
            $this->runClass();
        } 
    }

    private function runClass(): void
    {
        $ClassName = $this->routeConfiguration->controller;
        $action = $this->routeConfiguration->action;

        print((new $ClassName)->$action(...$this->paramRequestMap));

        // $class = new $ClassName();
        // $class->$action(...$this->paramRequestMap);
        die;
    }
}
