<?php

namespace IBill\Models;

use IBill\Exceptions\ApiException;

class HostedCheckout extends Model
{
    // required fields
    private $amount;
    private $reference;
    private $cancel_url;
    private $success_url;

    // optional
    private $products = [];
    private $tax_amount;
    private $shipping_amount;

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
        if (isset($options['shipping_amount'])) {
            $this->shipping_amount = $options['shipping_amount'];
        }
        if (isset($options['tax_amount'])) {
            $this->tax_amount = $options['tax_amount'];
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
            }
            $this->products = $options['products'];
        }
    }

    public function toArray(): array
    {
        $products = [];
        foreach ($this->products as $product) {
            $products[] = $product->toArray();
        }
        return [
            'amount' => $this->amount,
            'reference' => $this->reference,
            'success_url' => $this->success_url,
            'cancel_url' => $this->cancel_url,
            'products' => $products,
            'tax_amount' => $this->tax_amount,
            'shipping_amount' => $this->shipping_amount,
        ];
    }
}
