<?php

namespace Application\Controllers;

use Application\Core\Controller;

class NewsController extends Controller
{
    
    public function indexAction(): void
    {
        $news = $this->model->getNews();

        $this->view->render('Страница с новостями', $news);
    }


}