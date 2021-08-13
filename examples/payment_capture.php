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
        'amount' => 10.25,
        'authorized_payment_id' => 'ALWFR1YFHY6Y1XP',
    ]);
    $response = $iBill->captureAuthorizedPayment($model);
} catch (ApiException $e) {
    var_dump("ERROR");
    var_dump($e->error);
}


var_dump($response);
