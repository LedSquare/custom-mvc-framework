<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    
    public function loginAction()
    {
        echo 'Login page';
    }

    public function registerAction()
    {
        echo 'Register page<br>';
        // var_dump($this->route);
    }

}