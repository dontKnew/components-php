<?php
require_once '../vendor/autoload.php';
require_once '../secrets.php';
;
$stripe = new \Stripe\StripeClient($stripeSecretKey);

$payload = @file_get_contents('php://input');
$event = null;

try {
    $event = \Stripe\Event::constructFrom(
        json_decode($payload, true)
    );
} catch(\UnexpectedValueException $e) {
    // Invalid payload
    http_response_code(400);
    exit();
}

if ($event->type == 'checkout.session.completed') {
    $session = $event->data->object;

    // Fetch the checkout session to verify its status
    $checkout_session = $stripe->checkout->sessions->retrieve(
        $session->id
    );

    if ($checkout_session->payment_status == 'paid') {
        // Payment was successful
        // Update your database with the payment information
        echo "payment successully";
    } else {
        echo "Payment failed or was cancelled";
        // Payment failed or was cancelled
    }
}
