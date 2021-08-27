<?php

use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\CaptureAuthorizedPayment;

require '../vendor/autoload.php';
echo "<pre>" . "\r\n";

try {
    $iBill = new IBill([
        'account_id' => 6509,
        'access_token' => 'access-token',
    ]);

    $model = new CaptureAuthorizedPayment([
        'amount' => 1025,
        'authorized_payment_id' => $_GET['id'],
    ]);
    $response = $iBill->captureAuthorizedPayment($model);
} catch (ApiException $e) {
    var_dump("ERROR");
    var_dump($e->error);
}

var_dump($response);
