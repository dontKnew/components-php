<!--signup and get site key https://www.google.com/recaptcha/admin/site/588736139/setup-->
<!--CAPTCHA VERSION 2 -->
<?php
    if(isset($_POST['submit'])){
        
        if(isset($_POST['g-recaptcha-response'])){
                   try {
               
            $data = [
                    "secret"=>"6LeLZhcjAAAAAE4p3vVhIgUJfGsmroBJ0xyH2hQ_", 
                    "response"=>trim($_POST['g-recaptcha-response']) 
                ];
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
            if($err){
                print_r($err);
            }else {
                $response = json_decode($response);
                
                if($response->success){
                    $msg = "Captcha has been verified";
                }else {
                    $msg = "Invalid Captcha verification!";
                }
            }
            

           }catch(Exception $e){
                print_r($e->getMessage());
            }
        }else {
            $msg = "Please the verify the captcha verification";
        }   
    }
?>
<html>
  <head>
    <title>reCAPTCHA demo: Simple page</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body>
    <form action="" method="POST">
      <div  class="g-recaptcha" data-sitekey="6LeLZhcjAAAAAFodJe-cV0weC4arrznSAb5yVD3C"></div>
      <br/>'
      <strong> <?php echo $msg ?> </strong> <br>
      <input type="submit" name="submit" value="Submit">
    </form>
  </body>
</html>

<!--CAPTCHA VERSION 3-->