<?php
namespace App\Controller;

require __DIR__ . '/../../config/bootstrap.php';

class ApiController
{
    public function index()
    {
        global $dbClient;
        $stmt = $dbClient->prepare('SELECT * FROM users');
        $dbClient = $stmt->execute();
        $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return json_encode($users);
    }
}