<?php

namespace App\Helpers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Log;

class TokenHelper
{
    public static function createJwt($userId)
    {
        $payload = [
            'sub' => $userId,
            'iat' => time(),
            'exp' => time() + 3600
        ];

        return JWT::encode($payload, env('APPLICATION_JWT_SECRET_KEY'), 'HS256');
    }

    public static function validateJwt($token)
    {
        try {
            $decoded = JWT::decode($token, new Key(env('APPLICATION_JWT_SECRET_KEY'), 'HS256'));
            return $decoded;
        } catch (\Exception $e) {
            return null;
        }
    }
}
