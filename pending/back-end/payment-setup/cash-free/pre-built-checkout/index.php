<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Setup</title>
  </head>
  <body>
    <div id="payment-form"></div>
    <form id="customer_form" method="post">
        <div class="noti_msg"></div>
        <input type="number" name="order_amount" placeholder="Payment Amount"><br>
        <input type="text" name="customer_name" placeholder="customer name"><br>
        <input type="text" name="customer_email" placeholder="customer email"><br>
        <input type="number" name="customer_phone" placeholder="customer phone"><br>
        <input type="submit" value="Pay Now" id="submit_btn">
    </form>
    <input type="hidden" id="pay-btn">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://sdk.cashfree.com/js/ui/2.0.0/cashfree.sandbox.js"></script>
    <script src="main.js"></script>


  </body>
</html>