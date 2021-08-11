<?php

use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\RefundPayment;

require '../vendor/autoload.php';

try {
    $iBill = new IBill([
        // 'environment' => 'sandbox',
        'account_id' => 6509,
        'access_token' => 'access-token',
    ]);

    $model = new RefundPayment([
        'amount' => 10.25,
        'payment_id' => 'AL79MVU5HPHGL9M',

        // 'firstname' => 'Firstname',
        // 'lastname' => 'Lastname',
        // 'email' => 'info@example.com',

        // 'card_number' => 6011111111111117,
        // 'card_expiry_month' => 10,
        // 'card_expiry_year' => 2025,
    ]);
    $response = $iBill->refundPayment($model);
} catch (ApiException $e) {
    var_dump($e->error);
}

echo "<pre>" . "\r\n";
var_dump($response);
