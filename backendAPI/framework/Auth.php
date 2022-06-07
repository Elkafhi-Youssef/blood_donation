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

    public static function getToken()
    {
        if (isset(apache_request_headers()['authorization'])) {
            return explode(' ', apache_request_headers()['authorization'])[1];
        }
        // if (isset(apache_request_headers()['Authorization'])) {
        //     return explode(' ', apache_request_headers()['Authorization'])[1];
        // }

        return false;
    }

    public static function isValideToken()
    {
        try {
            // $authHeader = self::getToken();
            $authHeader = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpYXQiOjE2NTM1ODA1MTUsImlzcyI6Ind3dy5ibG9vZERvbmF0aW9uLmNvbSIsIm5iZiI6MTY1MzU4MDUxNSwiZXhwIjoxNjUzODQxODc1LCJ1c2VyIjp7InVzZXJfaWQiOjYsImZ1bGxuYW1lIjoiTm91cmEiLCJwaG9uZSI6IjA2NTY2NDM0OTUiLCJlbWFpbCI6Im5vdXJhQGdtYWlsLmNvbSIsImNpdHkiOiJTYWZpIiwicGFzc3dvcmQiOiIkMnkkMTAkSkNTLk9Ody5idkRMMWVJRGNhajlwZUZUVHV1NDJPOWp3ZHJ5VTFsZWRnR1hFNEZGc3dJSUsiLCJyb2xlIjoicGF0aWVudCIsImJsb29kX2lkIjoxLCJhZ2UiOjIyfX0.CAOUGlsWppB0V2l7ppgzUsz0zPOA2aIemLzvuZZGV94_gcblnT50JojayzFnD26QDuzDRxhHANJDSmWOjrgV9A";
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
