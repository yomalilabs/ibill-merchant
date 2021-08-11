<?php

use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\RefundPayment;
use IBill\Models\VoidPayment;

require '../vendor/autoload.php';

try {
    $iBill = new IBill([
        // 'environment' => 'sandbox',
        'account_id' => 6509,
        'access_token' => 'access-token',
    ]);

    $model = new VoidPayment([
        'amount' => 10.25,
        'payment_id' => 'AL7A6QLTHY79H03',
    ]);
    $response = $iBill->voidPayment($model);
} catch (ApiException $e) {
    var_dump($e->error);
}

echo "<pre>" . "\r\n";
var_dump($response);
