<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    
    public function loginAction(): void
    {
        echo 'Login page';
    }

    public function registerAction(): void
    {
        echo 'Register page<br>';
        // var_dump($this->route);
    }

}