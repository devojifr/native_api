<?php
namespace App\Middleware;

use App\Utils\Auth;

class AuthMiddleware
{
    public static function checkAuth()
    {
        $headers = apache_request_headers();
        if (!isset($headers['Authorization'])) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            exit;
        }

        $authHeader = $headers['Authorization'];
        if (strpos($authHeader, 'Bearer ') !== 0) {
            http_response_code(401);
            echo json_encode(['error' => 'Invalid token']);
            exit;
        }

        $token = substr($authHeader, 7);
        $userData = Auth::validateToken($token);
        if (!$userData) {
            http_response_code(401);
            echo json_encode(['error' => 'Invalid or expired token']);
            exit;
        }

        return $userData; // Renvoie les informations de l'utilisateur authentifié (ID, etc.)
    }
}