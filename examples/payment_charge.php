<?php

use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\ChargePayment;

echo "<pre>" . "\r\n";
require '../vendor/autoload.php';

try {
    $iBill = new IBill([
        // 'environment' => 'sandbox',
        'account_id' => 6509,
        'access_token' => 'access-token',
    ]);

    $model = new ChargePayment([
        // 'purchase_id' => 'the unique id/reference token',

        'firstname' => 'Firstname',
        'lastname' => 'Lastname',
        'email' => 'info@example.com',
        'address' => '1234 Fake Address',
        'zip' => 12345,

        'amount' => 1025,
        'card_number' => 6011111111111117,
        'card_cvv' => 123,
        'card_expiry_month' => 10,
        'card_expiry_year' => 2025,
    ]);
    $response = $iBill->chargePayment($model);
} catch (ApiException $e) {
    var_dump('----');
    var_dump($e->message);
    var_dump('----');
    exit;
}

echo "<pre>" . "\r\n";
var_dump($response);
