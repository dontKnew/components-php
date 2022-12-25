<?php
require __DIR__."/currencyConverter.php";

$converter = new currencyConverter('inr', 'usd');
echo $converter->response; // Outputs the current conversion rate from USD to INR

