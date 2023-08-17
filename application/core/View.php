<?php

namespace application\core;



class View
{   
    public $route;
    /**
     *@var path Path to controller
     */
    public $path;
    /**
     * @var layout default layout
     */
    public $layout = 'default';
    
    
    public function __construct($route)
    {
        $this->route = $route;
        
        debug($this->route);
    }

    public function index()
    {
       
    }
}
