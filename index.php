<?php

require 'application/lib/Dev.php';

use App\core\Router;

spl_autoload_register(function($class){
   $path = str_replace('\\', '/', $class . '.php');

   if (file_exists($path)){
        require $path;
   }
});

$router = new Router;

$router->run();
