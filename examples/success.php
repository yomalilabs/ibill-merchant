<?php

use IBill\Exceptions\ApiException;
use IBill\IBillClient;
use IBill\Models\ValidatePayment;

require '../vendor/autoload.php';

echo "<pre>" . "\r\n";

$paymentId = isset($_GET['payment_id']) ? $_GET['payment_id'] : null;
if (!$paymentId) {
    die('not valid');
    // header("Location: http://merchant.ibill.test");
}

print_r($_GET);


try {
    $client = new IBillClient([
        'accessToken' => 'access-token'
    ]);

    $validatePayment = new ValidatePayment([
        'payment_id' => $paymentId,
    ]);
    $response = $client->validatePayment($validatePayment);
} catch (ApiException $e) {
    var_dump("ERRORRRRRRRR");
    var_dump($e->error);
}


var_dump($response);
