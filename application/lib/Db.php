<?php

namespace Application\Lib;

use PDO;

class Db
{
    protected PDO $db;

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

    public function query($sql, $params = []): mixed
    {
        $stmt = $this->db->prepare($sql);
        if (!empty($stmt)){
            foreach ($params as $key => $val) {
                $stmt->bindValue(':' . $key, $val);
            }
        }
        $stmt->execute();

        return $stmt;

    }

    public function row($sql, $params = []): mixed 
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params = []): mixed
    {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }

}

