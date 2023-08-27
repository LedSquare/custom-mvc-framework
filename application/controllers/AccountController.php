<?php

namespace Application\Controllers;

use Application\Core\Controller;

class AccountController extends Controller
{
    
    public function loginAction(): void
    {
        if (!empty($_POST)){
            $this->view->locationJS('/');
        }
        $this->view->render('Login page');
    }

    public function registerAction(): void
    {
        $this->view->render('Register page');
    }

}