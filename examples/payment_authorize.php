<?php

use IBill\Config;
use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\AuthorizePayment;

echo "<pre>" . "\r\n";
require '../vendor/autoload.php';

try {
    $client = new IBill([
        'environment' => 'sandbox',
        'account_id' => Config::TEST_ACCOUNT_ID,
        'access_token' => Config::TEST_ACCESS_TOKEN,
    ]);

    $model = new AuthorizePayment([
        'firstname' => 'Firstname',
        'lastname' => 'Lastname',
        'email' => 'user3@example.com',
        'address' => '1234 Fake Address',
        'zip' => 12345,

        'amount' => 2000,
        'card_number' => 6011111111111117,
        'card_cvv' => 123,
        'card_expiry_month' => 10,
        'card_expiry_year' => 2025,

        'order_id' => random_int(1, 99999),

        // optional
        'phone' => 123456789,
        'city' => 'Phoenix',
        'state' => 'Arizona',
        'country' => 'United States',
    ]);
    $response = $client->authorizePayment($model);
} catch (ApiException $e) {
    echo "\nError:\n";
    echo $e->message;
    exit;
}

echo "<pre>" . "\r\n";
var_dump($response);
