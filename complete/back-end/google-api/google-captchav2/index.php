<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['g-recaptcha-response'])) {
        try {
            $data = ["secret" => "6LeLZhcjAAAAAE4p3vVhIgUJfGsmroBJ0xyH2hQ_",
                "response" => trim($_POST['g-recaptcha-response'])];
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://www.google.com/recaptcha/api/siteverify",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $data,
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                print_r($err);
                exit;
            } else {
                $response = json_decode($response);
                if ($response->success) {
                        $msg = "Captcha has been verified";
                } else {
                    $msg = "Invalid Captcha verification!";
                    echo "<script> alert('Invalid captcha verification, Please try again'); </script>";
                }
            }

        } catch (Exception $e) {
            print_r($e->getMessage());
            exit;
        }
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Captcha V2</title>
</head>
<body>
<?php
if(isset($msg)){
    echo $msg;
}
?>
<form action="" method="post">
    <div class="form group d-flex justify-content-center">
        <div class="g-recaptcha" data-sitekey="6LeLZhcjAAAAAFodJe-cV0weC4arrznSAb5yVD3C"></div>
    </div>
    <input type="submit" value="Submit">
</form>
</body>
</html>