<?php

use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\ValidateHostedCheckout;

require '../vendor/autoload.php';

echo "<pre>" . "\r\n";

$paymentId = isset($_GET['payment_id']) ? $_GET['payment_id'] : null;
if (!$paymentId) {
    die('not valid');
    // header("Location: http://merchant.ibill.test");
}

print_r($_GET);


try {
    $client = new IBill([
        'accountId' => 1234,
        'accessToken' => 'access-token' // private key (server) + public key (js)
    ]);

    $validatePayment = new ValidateHostedCheckout([
        'payment_id' => $paymentId,
    ]);
    $response = $client->validateHostedCheckout($validatePayment);
} catch (ApiException $e) {
    var_dump("ERRORRRRRRRR");
    var_dump($e->error);
}


var_dump($response);