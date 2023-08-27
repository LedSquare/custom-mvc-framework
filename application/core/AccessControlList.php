<?php

namespace application\core;

class AccessControlList 
{
    public array $config;
    public array $route;

    public function __construct($route)
    {   
        $this->route = $route;
        $this->config = require 'application/acl/' . $this->route['controller'] . '.php';
    }

    public function checkAcl(): bool
    {
      
        if ($this->isAcl('all')) {
            return true;
        } elseif (isset($_SESSION['authorize']['id']) && $this->isAcl('authorize')) {
            return true;
        } elseif (!isset($_SESSION['authorize']['id']) && $this->isAcl('guest')){
            return true;
        } elseif (isset($_SESSION['admin']['id']) && $this->isAcl('admin')){
            return true;
        }
        return false;

    }


    protected function isAcl($key): bool
    {
        return in_array($this->route['action'], $this->config[$key]);
    }
}