<?php

namespace Application\Controllers;

use Application\Core\Controller;

class MainController extends Controller
{
    
    public function indexAction(): void
    {
        $this->view->render('Главная страница');
    }


}