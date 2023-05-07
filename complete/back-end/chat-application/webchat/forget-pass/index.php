<?php
  require_once '../database/UserClass.php'; 
  define('TITLE', 'Forget Password');
  
  if(isset($_SESSION['email'])){
    header("location:../group/");
  }

  if(isset($_REQUEST['submit'])){
    $email = trim($_POST['email']); 
    $user_object = new User;
    $user_object->setUserEmail($email);
    $user_data = $user_object->get_user_data_by_email();
    
    $user_object->setUserName($user_data['user_name']);
    $user_object->setUserPassword($user_data['user_password']);
    $user_object->setUserActivation($user_data['user_activation']);
    $user_object->setUserProfile($user_data['user_profile']);
    $user_object->setUserVerificationCode($user_data['user_verification_code']);

    if($user_object->update_data()){
        if(is_array($user_data) && count($user_data) > 0){
            
            require_once '../database/converter.php';
            $converter = new Converter;
            $secureEmail = $converter->stringToBinary($email);
          
            require_once '../database/MailClass.php';
            $mail = new Mailer;
            $mail->smtp = "smtp.gmail.com";
//            $mail->debug = "true";
            $mail->fromEmail = getenv("GMAIL");
            $mail->fromPassword = getenv("APP_PASSWORD"); // Please do not mentioned original password,if mentioned, it will not work. 
            $mail->fromName = getenv("NAME");
            $mail->toEmail = $user_object->getUserEmail();
            $verifyUrl = ''.getenv("ROOT_PATH").'change-pass/?user='.$secureEmail.'&code=' .$user_object->getUserVerificationCode();
            $mail->subject = "Forget password for Chat Application";
            $msg = '
                <p>This is a forget password of chat application email, please click the link to change your of '.$email.'.</p>
                <p><a href="'.$verifyUrl.'">change password</a></p>
                <p>Thanks for using our services!</p>
                <p>Copyrights 2022-2023</p>
            ';
            $mail->bodyHTML = $msg;
            $mail->bodyText = $msg;
            if($mail->sendMail()==200){
              $success_message = 'An Verification email link sent to ' . $user_object->getUserEmail() . ', checkout email box and you can change password from there.';
            }else if($mail->sendMail()==501) {
              $error_message = 'Verification Email could not sent, Please try again later';
            }else {
               $error_message = $mail->sendMail(); 
            }
        }else {
            $error_message = 'This Email address is not registered with us';
        }
    }else {
        $error_message = "Something wrong, Please try again later";
    }
}
?>
<?php include('../include/header.php'); ?>
  <section style="background-color: #eee;">
    <div class="container py-5">

      <div class="row d-flex justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-6">

          <div class="card" id="chat2">
            <div class="card-header d-flex justify-content-between align-items-center p-3">
              <h5 class="mb-0">Change Password Form</h5>
              <button type="button" class="btn btn-primary btn-sm" data-mdb-ripple-color="dark">Let's Chat
                App</button>
            </div>

            <div class="card-body">
              <?php if(isset($error_message)) {echo "<div class='alert alert-warning' alert='role'>".$error_message."</div>";}?>
              <?php if(isset($success_message)) {echo "<div class='alert alert-success' alert='role'>".$success_message."</div>";}?>
              <form action="" method="POST">
                <!-- Email input -->
                <div class="form-outline">
                  <input type="email" name="email" id="form1Example1" class="form-control" aria-describedby="emailHelp" required/>
                  <label class="form-label" for="form1Example1">Registered Email address</label>
                </div>
                <div id="emailHelp" class="form-text mb-4">We'll send an link to your email address.</div>
            </div>
            <!-- Submit button -->
            <div class="mb-4">
              <button name="submit" class="btn btn-danger btn-block">Sent Link</button><br>
              <span class="mx-4">Are you in tourbleshoot ?<a href="mailto:israfil123.sa@gmail.com" > <u> contact us </u></a></span>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    </div>
  </section>
  
  <?php include('../include/footer.php') ?>