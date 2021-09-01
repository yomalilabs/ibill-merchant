# Merchant Package for iBill API

## How To Install
 - Download the repository to your computer.
 - `composer install`
 - Look in the `/examples` directory for basic usage.

## Hosted Checkout
You can trigger a hosted checkout request that will create the session and store the checkout.
The response will include an url to redirect the client to that will be used to enter the card information.
On success the client will be redirected back to the specified success url to validate the payment.

## Validate Hosted Checkout
You can trigger a validate hosted checkout request with the payment_id.

## Payment API
 - Charge Payment (sale)
 - Authorize Payment
 - Capture Authorized Payment
 - Refund Payment
 - Void Payment
 - Lookup Payment Information

## Tests
OK (89 tests, 208 assertions)
