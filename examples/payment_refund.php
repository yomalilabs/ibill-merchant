<?php

use IBill\Config;
use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\RefundPayment;

echo "<pre>" . "\r\n";
require '../vendor/autoload.php';

try {
    $client = new IBill([
        'environment' => 'sandbox',
        'account_id' => Config::TEST_ACCOUNT_ID,
        'access_token' => Config::TEST_ACCESS_TOKEN,
    ]);

    $model = new RefundPayment([
        'amount' => 500,
        'payment_id' => $_GET['id'],
    ]);
    $response = $client->refundPayment($model);
} catch (ApiException $e) {
    var_dump($e->error);
}

var_dump($response);
