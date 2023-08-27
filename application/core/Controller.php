<?php

namespace application\core;

use application\core\View;
use application\core\AccessControlList as ACL;

abstract class Controller 
{
    public array $route;
    public View $view;
    public $model;
    public ACL $acl;

    public function __construct($route)
    {
        $this->route = $route;
        $acl = new ACL($route);
        if (!$acl->checkAcl()){
            View::errorCode(403);
        }
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    public function loadModel($name): ?object
    {
        $path = 'application\models\\' . ucfirst($name); 
        if (class_exists($path)) {
            return new $path;
        } else return $this->model;
    }

}
    

