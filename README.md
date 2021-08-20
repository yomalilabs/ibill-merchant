# Merchant Package for iBill API

## Hosted Checkout
You can trigger a hosted checkout request that will create the session and store the checkout.
The response will include an url to redirect the client to that will be used to enter the card information.
On success the client will be redirected back to the specified success url to validate the payment.

## Validate Hosted Checkout
You can trigger a validate hosted checkout request with the payment_id.

## Tests
OK (45 tests, 103 assertions)
