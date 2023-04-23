<?php
require_once  "config.php";
use \Stripe\StripeClient as Stripe;
if(isset($_SESSION["checkout_session"]) && $_SESSION["checkout_session"]) {
    $stripe = new Stripe($api_key);
    $checkout_session = $_SESSION["checkout_session"];
    $session = $stripe->checkout->sessions->retrieve($checkout_session);
    $response = $stripe->invoices->sendInvoice($session->invoice);
    if ($response->status == "paid") {
        echo "Payment Successful <br>";
    }else {
        echo "Payment Failed <br>";
    }
    echo "Payment ID: ".$session->payment_intent . "<br>";
    echo "Invoice ID: ".$session->invoice . "<br>";
    echo  "Amount: ".$session->amount_total . "<br>";
    echo "Customer Email: ".$session->customer_email . "<br>";
    echo "Customer Name: ".$session->customer_details->name . "<br>";

    //save the data above in your database alongwith session_id the remove checkout session

    unset($_SESSION["checkout_session"]); // REMOVE SESSION FOR SECURITY REASON
}else {
    echo "No Payment Found for this session";
}