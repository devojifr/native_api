<?php

namespace App\Utils;

use Predis\Client;

class Redis {
    private static $instance;
    private $client;

    private function __construct()
    {
        try {
            $this->client = new Client([
                'scheme' => 'tcp',
                'host'   => $_SERVER['REDIS_HOST'],
                'port'   => $_SERVER['REDIS_PORT'],
            ]);
        } catch (\PDOException $e) {
            die("Redis connection error: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function get(string $key)
    {
        return $this->client->get($key);
    }

    public function set(string $key, string $value)
    {
        return $this->client->set($key, $value);
    }

    public function del(string $key)
    {
        return $this->client->del($key);
    }
}