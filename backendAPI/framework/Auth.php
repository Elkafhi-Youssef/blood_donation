<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
class Auth
{
    private const SECRET_KEY  = 'bGS6lzFqvvSQ8ALbOxatm7/Vk7mLQyzqaS34Q4oR1ew=';
    private const SERVER_NAME = "www.bloodDonation.com";
    public static function jwt_encode($exp, $user)
    {
        $issuedAt = new DateTimeImmutable();
        $expire = $issuedAt->modify("+$exp minutes")->getTimestamp();
        // $expire = $issuedAt->modify("+$exp")->getTimestamp();
        $data = [
            'iat'  => $issuedAt->getTimestamp(),         // Issued at: time when the token was generated
            'iss'  => self::SERVER_NAME,                 // Issuer
            'nbf'  => $issuedAt->getTimestamp(),         // Not before
            'exp'  =>  $expire,                          // Expire
            'user' => $user,                             // User name                            
        ];
        $token = JWT::encode(
            $data,
            self::SECRET_KEY,
            'HS512'
        );
        return $token;
    }
// function get token use in a function inValidToken
    public static function getToken()
    {
        if (isset(apache_request_headers()['authorization'])) {
            return explode(' ', apache_request_headers()['authorization'])[1];
        }
        if (isset(apache_request_headers()['Authorization'])) {
            return explode(' ', apache_request_headers()['Authorization'])[1];
        }
        return false;
    }

    public static function isValideToken()
    {
        try {
            $authHeader = self::getToken();
            $token = JWT::decode($authHeader, new Key(self::SECRET_KEY, 'HS512'));
            return ($token && $token->exp > time()) ? $token : false;
        } catch (Throwable $th) {
            return false;
        }
    }

    public static function isAuthorized($role = null)
    {
        $token = self::isValideToken();

        if (!$token) return false;

        if ($role && $token->user->role != $role) false;

        return $token;
    }

    public static function authOrDie($role = null)
    {
        if (!self::isAuthorized($role)) {
            $res = [
                'message' => 'Unauthorized',
                'alert' => 'Please login first',
                'code' => 401
            ];

            http_response_code(401);
            echo json_encode($res);
            exit;
        }
    }
}
