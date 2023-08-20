<?php 

namespace application\models;

use application\core\Model;

class News extends Model 
{
    public string $title;
    public string $description;

    public function getNews(): array
    {
        $news = $this->db->row('SELECT title, description FROM news');

        return $this->arrayForView($news, 'news');
    }

}