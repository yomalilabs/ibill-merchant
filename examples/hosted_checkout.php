<?php

use IBill\IBillClient;
use IBill\Models\HostedCheckout;

require '../vendor/autoload.php';

try {
    $client = new IBillClient([
        'accessToken' => 'access-token',
        'reference' => '123456789',
        'cancel_url' => 'http://merchant.ibill.test/dev.php',
        'success_url' => 'http://merchant.ibill.test/success.php'
    ]);

    $checkout = new HostedCheckout(['amount' => 1000]);
    $response = $client->createHostedCheckout($checkout);
} catch (Error $e) {
}

header("Location: {$response->data->url}");
