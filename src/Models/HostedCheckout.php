<?php

namespace IBill\Models;

use IBill\Exceptions\ApiException;

class HostedCheckout extends Model
{
    private $amount;
    private $reference;
    private $cancel_url;
    private $success_url;
    private $products;

    public function __construct(array $options = null)
    {
        if (isset($options['reference'])) {
            $this->reference = $options['reference'];
        }
        if (isset($options['amount'])) {
            $this->amount = $options['amount'];
        }
        if (isset($options['success_url'])) {
            $this->success_url = $options['success_url'];
        }
        if (isset($options['cancel_url'])) {
            $this->cancel_url = $options['cancel_url'];
        }
        if (isset($options['products'])) {
            // validate if its an array
            if (!is_array($options['products'])) {
                throw new ApiException("The products must be an array.");
            }
            // validate the array item if its instance of Product
            foreach ($options['products'] as $product) {
                if (!($product instanceof Product)) {
                    throw new ApiException("The product must be an instance of " . Product::class);
                }

                // validate if the codename was added
                if (is_null($product->toArray()['codename'])) {
                    throw new ApiException("The codename is required when sending your products.");
                }
            }
            $this->products = $options['products'];
        }
    }

    public function toArray()
    {
        return [
            'amount' => $this->amount,
            'reference' => $this->reference,
            'success_url' => $this->success_url,
            'cancel_url' => $this->cancel_url,
            'products' => $this->products,
        ];
    }
}
