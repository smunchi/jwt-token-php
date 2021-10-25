<?php
require_once('vendor/autoload.php');

if (! preg_match('/Bearer\s(\S+)/', $_SERVER['HTTP_AUTHORIZATION'], $matches)) {
    header('HTTP/1.0 400 Bad Request');
    echo 'Token not found in request';
    exit;
}

$jwt = $matches[1];
$secretKey  = 'HRDi43433328/Vk7mLQyzqaS34Q4oR1rej-=';
$token = \Firebase\JWT\JWT::decode((string)$jwt, $secretKey, ['HS256']);
$now = new DateTimeImmutable();
$serverName = "your.domain.name";

if ($token->iss !== $serverName || $token->exp < $now->getTimestamp())
{
    header('HTTP/1.1 401 Unauthorized');
    exit;
}

// The token is valid, so send the response back to the user
printf("Current timestamp is %s", (new \DateTimeImmutable())->getTimestamp());