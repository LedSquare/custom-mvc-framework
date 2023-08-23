<?php

namespace application\core;


/**
 * @var path Path to controller
 * @var layout Just default layout name 
 */
class View
{   
    public array $route;

    public string $path;

    public string $layout = 'default';
    
    
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
    public function render(string $title, $parameters = []):void
    {   
        extract($parameters);

        $pathView = 'application/views/' . $this->path . '.php';

        if (file_exists($pathView)) {
            ob_start();
            require $pathView;
            $content = ob_get_clean();
            require 'application/views/layouts/' . $this->layout . '.php';
        } 
    }

    public function redirect($url):void
    {
        header('location:' . $url);
        exit;
    }

    /**
     * Return error code status
     */
    public static function errorCode($code):void
    {
        $pathViewError = 'application/views/errors/' . $code . '.php';
        http_response_code($code);
        if (file_exists($pathViewError)){
            require $pathViewError;  
        }
        exit;
    }

    public function message($status, $message):void
    {
        exit(json_encode(['status' => $status, 'message' => $message]));
    }

    public function locationJS($url): void 
    {
        exit(json_encode(['url' => $url]));
    }
}
