<?php

namespace App\Controllers;

use app\core\Controller;

class NewsController extends Controller
{
    
    public function indexAction(): void
    {
        $news = $this->model->getNews();

        $this->view->render('Страница с новостями', $news);
    }


}