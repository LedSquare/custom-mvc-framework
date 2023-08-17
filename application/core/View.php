<?php

namespace application\core;



class View
{   
    public $route;
    /**
     *@var path Path to controller url
     */
    public $path;
    /**
     * @var layout default layout
     */
    public $layout = 'default';
    
    
    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    /**
     * @var content buffering layout from controller
     * ob_start() - function turn buffering on
     * ob_get_clean() - function gets current buffer contents and delete current output
     */
    public function render($title, $vars = []):void
    {
        if (file_exists('application/views/' . $this->path . '.php')) {
            ob_start();
            require 'application/views/' . $this->path . '.php';
            $content = ob_get_clean();
            require 'application/views/layouts/' . $this->layout . '.php';
        } else {
            echo 'View not found';
        }
    }

}
