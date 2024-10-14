<?php

namespace App\Utils;

use Dotenv\Dotenv;

class Db {
    private static $instance;
    private $pdo;

    private function __construct() {
        $host = $_SERVER['DB_HOST'];
        $dbName = $_SERVER['DB_NAME'];
        $user = $_SERVER['DB_USER'];
        $password = $_SERVER['DB_PASSWORD'];

        try {
            $connection = sprintf("mysql:host=%s;dbname=%s", $host, $dbName);
            $this->pdo = new \PDO($connection, $user, $password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Database connection error: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    public function execute(string $sql)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $results;
    }
}