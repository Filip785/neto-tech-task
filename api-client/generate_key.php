<?php
$bytes = random_bytes(32);

// generates random key, with 64 characters in length
$authKey = bin2hex($bytes);

// writes it to the Lumen's .env file to be used for API authorization
$fp = fopen(dirname(__DIR__) . '/.env', 'a');
fwrite($fp, PHP_EOL . 'AUTH_KEY='.$authKey);
fclose($fp);

// writes it to the client to be used for authorizing itself to the API
$fp = fopen(dirname(__DIR__) . '/api-client/.client_key', 'w+');
fwrite($fp, $authKey);
fclose($fp);

echo 'Done';
