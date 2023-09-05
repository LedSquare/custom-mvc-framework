<?php

namespace App\Lib;

use PDO;

class DB
{
    private static $instance = null;

    private ?object $connection = null;

    private string $host;

    private string $user;

    private string $password;

    private string $name;

    private array $config;

    public function __construct()
    {
        $this->config = parse_ini_file(".env");

        $this->host = $this->config['DB_HOST'];
        $this->user = $this->config['DB_USERNAME'];
        $this->password = $this->config['DB_PASSWORD'];
        $this->name = $this->config['DB_DATABASE'];

        
        try {
            $this->connection = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->name, $this->user, $this->password
            );

        } catch (\Exception $e) {
            echo 'Error: ', $e->getMessage(), "\n", "<hr>";
            die;
        }

    }

    public static function getInstance(): self
    {
        if (!self::$instance){
            self::$instance = new DB;
        }

        return self::$instance;
    }

    public function getConnection(): object
    {
        return $this->connection;
    }


    public function query($sql, $params = []): mixed
    {
        $stmt = $this->connection->prepare($sql);
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

