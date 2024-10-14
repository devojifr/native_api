<?php

namespace App\Utils;

class Auth
{
    private static $secretKey = 'abcd'; // À protéger !

    public static function generateToken($userId)
    {
        // Un exemple simple de génération de token (ici tu pourrais utiliser JWT pour plus de sécurité)
        $payload = base64_encode(json_encode(['user_id' => $userId, 'exp' => time() + 3600])); // Expire dans 1 heure
        $signature = hash_hmac('sha256', $payload, self::$secretKey);

        return $payload . '.' . $signature;
    }

    public static function validateToken($token)
    {
        [$payload, $signature] = explode('.', $token);

        if (hash_hmac('sha256', $payload, self::$secretKey) !== $signature) {
            return false;
        }

        $data = json_decode(base64_decode($payload), true);
        if ($data['exp'] < time()) {
            return false; // Token expiré
        }

        return $data; // Retourne les informations du token (par exemple l'ID utilisateur)
    }
}