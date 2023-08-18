<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class MainController extends Controller
{
    
    public function indexAction()
    {
        $vars = [
            'name' => 'Ilona',
            'age' => '25',

        ];

        $db = new Db;
        $db->query('SELECT * FROM users WHERE id=1');
        $this->view->render('Главная страница', $vars);
    }


}