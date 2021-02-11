<?php

$dir = dirname(__DIR__);

require $dir . '/vendor/autoload.php';

$BASE_URI = 'http://localhost/api/';

// This is some imaginary AUTH_KEY that we will use to authenticate API,
// in real app, we would authorize the API using some other secure method such as JWT/Oauth etc.
$AUTH_KEY = file_get_contents($dir . '/api-client/.client_key');

if(!$AUTH_KEY) {
    dd('Please run php api-client/generate_key.php in your console to generate authentication keys.');
}

$api = new DebitCardsAPI\DebitCards($BASE_URI, $AUTH_KEY);

$card = $api->get_card(1);
$pin = $api->get_pin(1);
$pinSecond = $api->get_pin(2);

$newCard = [
    'first_name' => 'User',
    'last_name' => 'Number 3',
    'address' => 'Some Address',
    'city' => 'Tel Aviv',
    'country_id' => 107,
    'phone' => '12345',
    'currency' => 'ILS',
    'balance' => 100,
    'pin' => 1999
];

$createCard = $api->create_card($newCard);
$balance = $api->get_balance(1);

$pinThird = $api->get_pin(3);

dd($card, $pin, $pinSecond, $createCard, $pinThird, $balance);
