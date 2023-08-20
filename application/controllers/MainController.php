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
        $res = $db->column('SELECT name FROM users WHERE id=1');
        echo $res;
        $this->view->render('Главная страница', $vars);
    }


}