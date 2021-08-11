<?php

use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\HostedCheckout;
use IBill\Models\AuthorizePayment;
use IBill\Models\CaptureAuthorizedPayment;
use IBill\Models\Product;

require '../vendor/autoload.php';

try {
    $iBill = new IBill([
        // 'environment' => 'sandbox',
        'account_id' => 6509,
        'access_token' => 'access-token',
    ]);

    $model = new CaptureAuthorizedPayment([
        'amount' => 10.25,
        'authorized_payment_id' => '123456789',
    ]);
    $response = $iBill->paymentAuthorize($model);
} catch (ApiException $e) {
    var_dump($e->error);
}

echo "<pre>" . "\r\n";
var_dump($response);
