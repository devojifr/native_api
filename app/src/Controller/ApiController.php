<?php
namespace App\Controller;

use App\Utils\Auth;
use App\Utils\Db;
use App\Utils\Redis;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Users",
 *     description="Users endpoint"
 * )
 */
class ApiController
{

    /**
     * @OA\Get(
     *     path="/api/users",
     *     @OA\Response(
     *         response="200",
     *         description="Returns all users from database",
     *         @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/User"),
     *         )
     *     )
     * )
     */
    public function index()
    {
        if ($value = Redis::getInstance()->get('users')) {
            return $value;
        } else {
            $db = Db::getInstance();
            $sql = 'SELECT * FROM users';
            $results = $db->execute($sql);

            Redis::getInstance()->set('users', json_encode($results));
        }

        return json_encode($results);
    }

    public function updateCache()
    {
        Redis::getInstance()->del('users');
        $db = Db::getInstance();
        $sql = 'SELECT * FROM users';
        $results = $db->execute($sql);

        Redis::getInstance()->set('users', json_encode($results));
    }

    public function generate_token()
    {
        $userId = 1;
        $token = Auth::generateToken($userId);

        return json_encode($token);
    }
}