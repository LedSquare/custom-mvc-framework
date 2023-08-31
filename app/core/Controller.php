<?php

namespace App\Core;


use app\core\View;
use app\core\middleware\src\{Request, Application, BusinessLogic, Logging};
use app\core\AccessControlList as ACL;
use vendor\monolog\monolog\src\Monolog\Handler\StreamHandler;
use vendor\monolog\monolog\src\Monolog\Logger;

abstract class Controller 
{
    public array $route;
    public View $view;
    public $model;
    public ACL $acl;

    public function __construct($route)
    {
        $this->route = $route;
        // $acl = new ACL($route);
        // if (!$acl->checkAcl()){
        //     View::errorCode(403);
        // }
        $logger = new Logger('main', [new StreamHandler('php://stdout')]);

        $application = new Application(
            handler: new BusinessLogic(),
            middlewares: [
                new Logging($logger),
            ],
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
    

