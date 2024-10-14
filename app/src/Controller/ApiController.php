<?php
namespace App\Controller;

use App\Utils\Db;
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
        $db = Db::getInstance();
        $sql = 'SELECT * FROM users';
        $results = $db->execute($sql);

        return json_encode($results);
    }
}