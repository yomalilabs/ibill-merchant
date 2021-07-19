<?php

use IBill\Exceptions\ApiException;
use IBill\IBillClient;
use IBill\Models\HostedCheckout;

require '../vendor/autoload.php';

echo "<pre>" . "\r\n";

try {
    $client = new IBillClient([
        // 'environment' => 'sandbox',
        'accessToken' => 'access-token'
    ]);

    $checkout = new HostedCheckout([
        'amount' => 1000,
        'reference' => '123456789',
        'cancel_url' => 'http://merchant.ibill.test/dev.php',
        'success_url' => 'http://merchant.ibill.test/success.php'
    ]);
    $response = $client->createHostedCheckout($checkout);
} catch (ApiException $e) {
    var_dump("ERRORRRRRRRR");
    var_dump($e->error);
}


var_dump($response);

$link = $response->url;
?>

<a href="<?= $link ?>">LINK TO THE CHECKOUT</a>