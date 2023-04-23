<?php
require  "config.php";
use \Stripe\StripeClient as Stripe;
$stripe = new Stripe($api_key);
$line_items[] = array(
    'price_data' => [
        'currency' => "inr",
        'product_data' => ['name' => "Book" ],
        'unit_amount' => 500000 // 2000 INR
    ],
    'quantity' => 3
);

$checkout_session = $stripe->checkout->sessions->create([
    'line_items' => $line_items,
    'billing_address_collection' => 'required',
    'invoice_creation' => ['enabled' => true],
    'customer_email' => "sajid.phpmaster@gmail.com",
    'mode' => 'payment',
    'success_url' => $base_url."thank-you.php",
    'cancel_url' => $base_url."order-summary"
]);
$_SESSION["checkout_session"] = $checkout_session->id; // set the checkokut session in your browser and redirect to the checkout page
header("HTTP/1.1 303 See Other");
header("Location: ".$checkout_session->url);
