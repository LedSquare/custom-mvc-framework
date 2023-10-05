<?php 

namespace App\Core\Model;

use app\lib\DB;

abstract class Model 
{
    public DB $db;

    public function __construct()
    {
        $this->db = new Db;

    }

    public function arrayForView(array $array, string $name ):array
    {
        return $newArray = [
            $name => $array,
        ];
    }

}


