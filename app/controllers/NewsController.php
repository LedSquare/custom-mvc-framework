<?php

namespace App\Controllers;

use App\Core\Controller;

class NewsController extends Controller
{
    
    public function indexAction(): void
    {
        $news = $this->model->getNews();

        $this->view->render('Страница с новостями', $news);
    }


}