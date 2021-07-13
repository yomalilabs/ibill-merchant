<?php

use IBill\IBillClient;
use IBill\Models\HostedCheckout;

require '../vendor/autoload.php';

try {
    $client = new IBillClient([
        'accessToken' => 'access-token'
    ]);

    $checkout = new HostedCheckout(['amount' => 1000]);
    $response = $client->createHostedCheckout($checkout);
} catch (Error $e) {
}

header("Location: {$response->data->url}");
