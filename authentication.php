<?php
require_once('vendor/autoload.php');

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

try {
    $hasValidCredentials = true; // assume login is fine. i.e checking username and password are ok

    if ($hasValidCredentials) {
        $secretKey  = 'HRDi43433328/Vk7mLQyzqaS34Q4oR1rej-=';
        $tokenId    = base64_encode(random_bytes(16));
        $issuedAt   = new \DateTimeImmutable();
        $expire     = $issuedAt->modify('+6 minutes')->getTimestamp();      // Add 60 seconds
        $serverName = "your.domain.name";
        $username   = "username";                                           // Fetched from POST data

        // Create the token as an array
        $data = [
            'iat'  => $issuedAt->getTimestamp(),    // Issued at: time when the token was generated
            'jti'  => $tokenId,                     // Json Token Id: an unique identifier for the token
            'iss'  => $serverName,                  // Issuer
            'exp'  => $expire,                      // Expire
            'data' => [                             // Data related to the signer user
                'userName' => $username,            // User name
            ]
        ];

        echo \Firebase\JWT\JWT::encode(
            $data,      // Data to be encoded in the JWT
            $secretKey // The signing key
        );
    }

} catch (Exception $e) {
    dd($e->getMessage());
}