<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    
    public function indexAction(): void
    {
        $this->view->render('Главная страница');
    }


}