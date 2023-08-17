<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    
    public function indexAction()
    {
        $vars = [
            'name' => 'Ilona',
            'age' => '25',

        ];
        $this->view->render('Главная страница', $vars);
    }


}