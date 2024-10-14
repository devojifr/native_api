<?php
require __DIR__ . '/../config/bootstrap.php';

use Monolog\Logger;
use App\Entity\User;
use App\Controller\ApiController;
use App\Middleware\AuthMiddleware;
use App\Utils\Auth;
use Dotenv\Dotenv;

//$log = new Logger(__FILE__);
//$log->pushHandler(new Monolog\Handler\StreamHandler(_LOGS_ . '/app.log', Monolog\Logger::WARNING));
//$log->warning(uniqid());

//echo "Hello World!";

//$stmt = $dbClient->prepare('SELECT * FROM users');
//$dbClient = $stmt->execute();
//$users = $stmt->fetchAll();
//dump($users);
$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

//xdebug_info();
//phpinfo();

// TMP
//$userId = 1;
//$token = Auth::generateToken($userId);
//dd($token);

if ($method === 'GET' && $uri === '/api/users') {
    AuthMiddleware::checkAuth();
}

// Simulate a router system
switch ($uri) {
    case '/api/users':
        $controller = new ApiController();
        echo $controller->index();
        return;

    default:
        echo 'Hello World! ' . date('Y-m-d H:i:s');
}