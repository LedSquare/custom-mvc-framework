<?php

namespace App\Core;


use app\core\View;
use app\core\middleware\src\{
    Request, 
    Application, 
    BusinessLogic, 
    Logging, 
    Validation
};
use app\core\AccessControlList as ACL;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

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

        $this->includeMiddleware();
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    private function loadModel($name): ?object
    {
        $path = 'app\models\\' . ucfirst($name); 
        if (class_exists($path)) {
            return new $path;
        } else return $this->model;
    }
    
    private function includeMiddleware(): void 
    {
        $logger = new Logger('main', [new StreamHandler('php://stdout')]);

        $application = new Application(
            handler: new BusinessLogic(),
            middlewares: [
                new Logging($logger),
                new Validation(),
            ],
        );
        
        $request = new Request(uniqid(), '');
        $response = $application->handle($request);
        debug($response);
    }
}
    

