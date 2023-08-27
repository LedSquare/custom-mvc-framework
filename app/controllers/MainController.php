<?php

namespace App\Controllers;

use App\Core\Controller;

class MainController extends Controller
{
    
    public function indexAction(): void
    {
        $this->view->render('Главная страница');
    }


}