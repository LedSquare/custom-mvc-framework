<?php

namespace application\controllers;

use application\core\Controller;

class NewsController extends Controller
{
    
    public function indexAction(): void
    {
        $news = $this->model->getNews();

        $this->view->render('Страница с новостями', $news);
    }


}