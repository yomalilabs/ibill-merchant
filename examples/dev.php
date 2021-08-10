<?php

use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\HostedCheckout;
use IBill\Models\Product;

require '../vendor/autoload.php';

try {
    $client = new IBill([
        // 'environment' => 'sandbox',
        'account_id' => 6509,
        'access_token' => 'access-token',
    ]);

    $checkout = new HostedCheckout([
        'reference' => '123456789',
        'shipping_amount' => 500,
        'tax_amount' => 500,
        'products' => [
            new Product([
                'quantity' => 1,
                // 'codename' => 'product1',
                'amount' => 1000,
                'name' => 'My Product',
                'image_url' => 'http://google.com',
            ]),
            new Product([
                'quantity' => 2,
                // 'codename' => 'product2',
                'amount' => 1000,
                'name' => 'My Second Product',
                'image_url' => 'http://google.com',
            ]),
        ],
        'cancel_url' => 'http://merchant.ibill.test/hosted_checkout.php',
        'success_url' => 'http://merchant.ibill.test/hosted_checkout_success.php'
    ]);
    $response = $client->createHostedCheckout($checkout);
} catch (ApiException $e) {
    var_dump($e->error);
}

// uncomment for production
// header("Location: {$response->url}");

// for testing purpose only
echo "<pre>" . "\r\n";
var_dump($response);
echo '<a target="_blank" href="' . $response->url . '">LINK TO THE CHECKOUT</a>';
