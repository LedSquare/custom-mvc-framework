<?php

namespace application\core;

use application\core\View;

abstract class Controller 
{
    public array $route;
    public View $view;
    public ?Model $model = null;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    public function loadModel($name): ?Model
    {
        $path = 'application\models\\' . ucfirst($name); 
        if (class_exists($path)) {
            return new $path;
        } else return $this->model;
    }

    public function checkAcl(): void 
    {
        
    }
}
    

