<?php

namespace App\Controllers;

use app\core\Controller;

class MainController extends Controller
{
    
    public function indexAction(): void
    {
        $this->view->render('Главная страница');
    }


}