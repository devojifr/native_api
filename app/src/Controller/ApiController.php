<?php
namespace App\Controller;

require __DIR__ . '/../../config/bootstrap.php';

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="API de démonstration",
 *     description="Une brève description de mon API."
 * )
 */
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