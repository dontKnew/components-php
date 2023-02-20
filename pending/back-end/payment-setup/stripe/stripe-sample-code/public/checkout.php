<?php

require_once '../vendor/autoload.php';
require_once '../secrets.php';
$YOUR_DOMAIN = 'http://localhost:4242';

$stripe = new \Stripe\StripeClient($stripeSecretKey);

$checkout_session = $stripe->checkout->sessions->create([
    'line_items' => [
        [
        'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => 'T-shirt',
            ],
            'unit_amount' => 2000,
        ],
        'quantity' => 1,
        ]
    ],
    'mode' => 'payment',
    'success_url' => 'http://localhost:4242/success.php',
    'cancel_url' => 'http://localhost:4242/cancel.php',
]);
header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);