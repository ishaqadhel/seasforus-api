<?php
namespace App\Services;

use Firebase\JWT\JWT;
use Illuminate\Auth\AuthenticationException;

class JWTService {
    private const FAILED_MESSAGE = "authentication failed";
    public static $KEY = config("app.auth_key");

    public function parseUserId($token) {
        try {
            if(!$token || $token == "") throw new \Exception("Authentication failed");

            $data = JWT::decode($token, self::$KEY, array("HS256"));
            
            return $data->sub;
        } catch (\Exception $e) {
            throw new AuthenticationException(self::FAILED_MESSAGE);
        }
    }

    public function createToken(int $userId): string {

        return JWT::encode([
            'iss' => "ppdbsumsel",
            'iat' => time(),
            'nbf' => time(),
            'exp' => time() + (60 * 60 * 24 * 7),
            'sub' => $userId
        ], self::$KEY);
    }
}