<?php

namespace application\core;



class View
{   
    /**
     *@var route Path to controller
     */
    public $route;
    /**
     * @var layout default layout
     */
    public $layout = 'default';
    
    public function __construct()
    {
        echo 'View object ';
    }

    public function index()
    {
       
    }
}
