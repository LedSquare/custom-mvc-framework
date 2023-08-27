<?php

namespace App\Core;

use App\Core\View;

class Router 
{
    protected array $routes;

    protected array $params;

    
    public function __construct()
    {
        $arr = require 'application/config/routes.php'; // Params for routes
        foreach ($arr as $key => $value) {
            $this->add($key, $value); // added params in val $routes;
        }
        
    }

    public function add($route, $params)   
    {
        $route = '#^'. $route .'$#';
        $this->routes[$route] = $params;   
    }

    public function match(): bool  
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)){
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /** 
     * @var path - Gets the name of the controller from the route parameters
     * The next step is to check if the controller exists.
     * 
     */

    public function run():void
    {
        if($this->match()){
            $path = 'App\controllers\\' . ucfirst($this->params['controller']) . 'Controller'; //
            if(class_exists($path)){
                $action = $this->params['action'] . 'Action';
                if (method_exists($path, $action)){
                    $controller = new $path($this->params);
                    $controller->$action();
                } else { 
                    View::errorCode(404);
                }
        } else {
                View::errorCode(404);
            }

        } else {
            View::errorCode(404);
        }
    }

    
}