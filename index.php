<?php

// declare(strict_types=1);
// require __DIR__ . '/../app/lib/Dev.php';
// require __DIR__ . '/../vendor/autoload.php';
require __DIR__ .'/app/lib/Dev.php';
require __DIR__ .'/vendor/autoload.php';

use app\core\Router;

spl_autoload_register(function($class){
   $path = str_replace('\\', DIRECTORY_SEPARATOR, $class . '.php');

   if (file_exists($path)){
        require $path;
   }
});
echo 'root';
$router = new Router;

$router->run();

// require __DIR__ . '/../vendor/autoload.php';
// require __DIR__ . '/../app/lib/Dev.php';
