<?php

namespace application\lib;

use PDO;

class Db
{
    protected $db;

    public function __construct()
    {
        $config = require 'application/config/db.php';
        $this->db = new PDO(
            'mysql:host=' . $config['host'] .
            ';dbname=' . $config['name'],
            $config['user'],
            $config['password']
        );
    }

    public function query($sql): mixed
    {
        $query = $this->db->query($sql);

        // debug($query->fetchColumn());
        return $query;
    }

    public function row($sql): mixed 
    {
        $result = $this->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql): mixed
    {
        $result = $this->query($sql);
        return $result->fetchColumn();
    }
}

