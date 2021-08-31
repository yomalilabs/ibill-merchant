<?php

use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\RefundPayment;
use IBill\Models\VoidPayment;

echo "<pre>" . "\r\n";
require '../vendor/autoload.php';

try {
    $iBill = new IBill([
        // 'environment' => 'sandbox',
        'account_id' => 6509,
        'access_token' => 'access-token',
    ]);

    $model = new VoidPayment([
        'payment_id' => $_GET['id'],
    ]);
    $response = $iBill->voidPayment($model);
} catch (ApiException $e) {
    var_dump($e->error);
}

var_dump($response);
