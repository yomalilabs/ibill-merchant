<?php

use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\HostedCheckout;
use IBill\Models\PaymentAuthorize;
use IBill\Models\Product;

require '../vendor/autoload.php';

try {
    $iBill = new IBill([
        // 'environment' => 'sandbox',
        'account_id' => 6509,
        'access_token' => 'access-token',
    ]);

    $model = new PaymentAuthorize([
        'firstname' => 'Firstname',
        'lastname' => 'Lastname',
        'email' => 'info@example.com',
        'address' => '1234 Fake Address',
        'zip' => 12345,

        'amount' => 10.25,
        'card_number' => 6011111111111117,
        'card_cvv' => 123,
        'card_expiry_month' => 10,
        'card_expiry_year' => 2025,
    ]);
    $response = $iBill->paymentAuthorize($model);
} catch (ApiException $e) {
    var_dump($e->error);
}

// uncomment for production
// header("Location: {$response->url}");

// for testing purpose only
echo "<pre>" . "\r\n";
var_dump($response);
echo '<a target="_blank" href="' . $response->url . '">LINK TO THE CHECKOUT</a>';
