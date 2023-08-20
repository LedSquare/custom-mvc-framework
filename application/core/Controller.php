<?php

namespace application\core;

use application\core\View;

abstract class Controller 
{
    public array $route;
    public View $view;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
    }
}
    

