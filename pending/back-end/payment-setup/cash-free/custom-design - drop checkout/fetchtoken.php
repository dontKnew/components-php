<?php

extract($_POST);

$customer_name =  "Sajid Ali";
$nameParts = explode(" ", $customer_name);
$firstName = array_shift($nameParts);

$order_id  = uniqid();
$customer_id = $firstName."_".$order_id;

$data = json_encode(array(
    "order_id" => $order_id,
    "order_amount" => $order_amount,
    "order_currency" => "INR",
    "order_note" => "Payment on going",
    "customer_details" => array(
        "customer_id" => $customer_id,
        "customer_name" => $customer_name,
        "customer_email" => $customer_email,
        "customer_phone" => $customer_phone
    )
));

$curl = curl_init();
curl_setopt_array($curl, [
  CURLOPT_URL => "https://sandbox.cashfree.com/pg/orders",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"customer_details\":{\"customer_id\":\"12345\",\"customer_email\":\"user@example.com\",\"customer_phone\":\"1299087801\"},\"order_amount\":1,\"order_currency\":\"INR\",\"order_note\":\"test order\"}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/json",
    "x-api-version: 2022-09-01",
    "x-client-id: 3009197b57dd85a85a950c92fb919003",
     "x-client-secret: 5baf0719c6464d2da5e4e37c5e416d0e8afa4f9a"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
//  echo json_encode(array("error" => 1));
  echo "cURL Error #:" . $err;
  die();

} else {
  $result = json_decode($response, true);
  $output = array("payment_session_id" => $result["payment_session_id"]);
  echo json_encode($output);
  die();
}
?>