<?php

namespace App\Core;


use app\core\View;
use app\core\middleware\src\Request;
use app\core\middleware\src\Application;
use app\core\middleware\src\BusinessLogic;
use app\core\AccessControlList as ACL;

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

        $application = new Application(
            handler: new BusinessLogic(),
        );
        
        $request = new Request(uniqid());
        $response = $application->handle($request);
 
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    public function loadModel($name): ?object
    {
        $path = 'app\models\\' . ucfirst($name); 
        if (class_exists($path)) {
            return new $path;
        } else return $this->model;
    }

}
    

