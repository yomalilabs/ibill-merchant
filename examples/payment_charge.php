<?php

use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\AuthorizeAndCapturePayment;

require '../vendor/autoload.php';
echo "<pre>" . "\r\n";

try {
    $iBill = new IBill([
        'account_id' => 6509,
        'access_token' => 'access-token',
    ]);

    $model = new AuthorizeAndCapturePayment([
        'firstname' => 'Firstname',
        'lastname' => 'Lastname',
        'email' => 'info@example.com',
        'address' => '1234 Fake Address',
        'zip' => 12345,

        'amount' => 15.25,
        'card_number' => 6011111111111117,
        'card_cvv' => 123,
        'card_expiry_month' => 10,
        'card_expiry_year' => 2025,
    ]);
    $response = $iBill->authorizeAndCapturePayment($model);
} catch (ApiException $e) {
    var_dump("ERROR");
    var_dump($e->error);
}


var_dump($response);
