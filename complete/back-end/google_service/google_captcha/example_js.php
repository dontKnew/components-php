<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<div class="" class="mx-2" id="google_captcha" ></div>

 <!--google captcah-->
        <script>
        document.getElementById('send_measurement').disabled = true;
        document.getElementById('send_measurement').style.cursor = "not-allowed";
              var onSubmitVerify = function (token) {
                let data = {"respones":token, "secret":""};
                let response = grecaptcha.getResponse();
                if(response.length === 0){
                    alert("Captcha Verification Failed, Please try again");
                }else {
                    document.getElementById('send_measurement').disabled = false;
                    document.getElementById('send_measurement').style.cursor = "pointer";
                }
            };
        </script>
        <script type="text/javascript">
            var onloadCallback = function() {
                      grecaptcha.render('google_captcha', {
                      'sitekey' : '',
                        'callback' : onSubmitVerify
                    });
                  };
        </script>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer> </script>
        <!--google captcha script-->

