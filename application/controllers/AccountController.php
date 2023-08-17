<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    
    public function loginAction(): void
    {
        $this->view->render('Login page');
    }

    public function registerAction(): void
    {
        $this->view->render('Register page');
    }

}