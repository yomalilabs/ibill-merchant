<?php

use IBill\Config;
use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\CaptureAuthorizedPayment;

require '../vendor/autoload.php';
echo "<pre>" . "\r\n";

try {
    $client = new IBill([
        'environment' => 'sandbox',
        'account_id' => Config::TEST_ACCOUNT_ID,
        'access_token' => Config::TEST_ACCESS_TOKEN,
    ]);

    $model = new CaptureAuthorizedPayment([
        'amount' => 1500,
        'authorized_payment_id' => $_GET['id'],
    ]);
    $response = $client->captureAuthorizedPayment($model);
} catch (ApiException $e) {
    var_dump('ERROR');
    var_dump($e->message);
    exit;
}

var_dump($response);
