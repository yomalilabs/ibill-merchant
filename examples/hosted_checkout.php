<?php

use IBill\IBillClient;
use IBill\Models\HostedCheckout;

require '../vendor/autoload.php';

try {
    $client = new IBillClient([
        // 'environment' => 'sandbox',
        'accessToken' => 'access-token',
    ]);

    $checkout = new HostedCheckout([
        // 'amount' => 2000,
        'reference' => '123456789',
        'shipping_fee' => 5000, // optional
        'taxes_fee' => 5000, // optional
        'products' => [
            new Product([
                'quantity' => 1,
                'codename' => 'product1',
                // 'amount' => 1000,
                // 'name' => 'My Product',
                // 'image_url' => 'http://google.com',
            ]),
            new Product([
                'quantity' => 2,
                'codename' => 'product1',
                // 'amount' => 1000,
                // 'name' => 'My Product',
                // 'image_url' => 'http://google.com',
            ]),
        ],
        'cancel_url' => 'http://merchant.ibill.test/hosted_checkout.php',
        'success_url' => 'http://merchant.ibill.test/hosted_checkout_success.php'
    ]);
    $response = $client->createHostedCheckout($checkout);
} catch (Error $e) {
}

// uncomment for production
// header("Location: {$response->url}");

// for testing purpose only
echo "<pre>" . "\r\n";
var_dump($response);
echo '<a target="_blank" href="' . $response->url . '">LINK TO THE CHECKOUT</a>';
