<?php 

namespace App\Core;

use app\lib\Db;

abstract class Model 
{
    public Db $db;

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


