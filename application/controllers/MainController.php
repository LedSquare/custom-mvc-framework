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

        $params = [
            'id' => 1,
        ];

        $res = $db->column('SELECT name FROM users WHERE id = :id', $params);

        debug($res);

        $this->view->render('Главная страница', $vars);
    }


}