<?php

use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\RefundPayment;

echo "<pre>" . "\r\n";
require '../vendor/autoload.php';

try {
    $iBill = new IBill([
        // 'environment' => 'sandbox',
        'account_id' => 6509,
        'access_token' => 'access-token',
    ]);

    $model = new RefundPayment([
        'amount' => 1025,
        'payment_id' => 'ALWP5LTKHPXFK54',
    ]);
    $response = $iBill->refundPayment($model);
} catch (ApiException $e) {
    var_dump($e->error);
}

var_dump($response);
