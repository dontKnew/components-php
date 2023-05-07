<?php
  require_once '../database/UserClass.php';
  require_once '../database/MailClass.php';
    define('TITLE', 'Registration');
  if(isset($_SESSION['email'])){
    header("location:../group/");
  }

  if(isset($_REQUEST['submit'])){
    unset($_SESSION['success_message']);
    unset($_SESSION['error_message']);
    $name = trim($_POST['fullname']);
    $email = trim($_POST['email']);  
    $password = trim($_POST['password']); 

    $user_object = new User;
    $user_object->setUserName($name);
    $user_object->setUserEmail($email);
    $user_object->setUserPassword($password);
    $user_object->setUserActivation("Disabled");
    // $user_object->setUserProfile($user_object->make_avatar(strtoupper($name[0])));
    $user_object->setUserProfile("".getenv("ROOT_PATH")."/assets/image/avtar.webp");
    $user_object->setUserVerificationCode(md5(uniqid()));
    $user_data = $user_object->get_user_data_by_email();
    if(is_array($user_data) && count($user_data) > 0)
    {
        $error_message = 'This Email address is already registered';
    }else {
      // if($user_object->save_data()){
          $mail = new Mailer;
          $mail->smtp = "smtp.gmail.com";
          $mail->fromEmail = getenv("GMAIL");
          $mail->fromPassword = getenv("APP_PASSWORD"); // Please do not mentioned original password,if mentioned, it will not work. 
          $mail->fromName = getenv("NAME");
          $mail->toEmail = $user_object->getUserEmail();
          $verifyUrl = ''.getenv("ROOT_PATH").'/login/?code=' .$user_object->getUserVerificationCode();
          $mail->subject = "Registration Verification for Chat Application Demo";
          $msg = '<p>Thank you for registering for Chat Application Demo.</p>
              <p>This is a verification email, please click the link to verify your email address.</p>
              <p><a href="'.$verifyUrl.'">Click to Verify</a></p>
              <p>Thank you...</p>
              <p>Copyrights 2022-2023</p>
          ';

          $mail->bodyHTML = $msg;
          $mail->bodyText = $msg;
          if($mail->sendMail()==200){
            $user_object->save_data();
            $success_message = 'Verification Email sent to ' . $user_object->getUserEmail() . ', so before login first verify your email';
          }else if($mail->sendMail()==501) {
            $error_message = 'Verification Email could not sent, Please try again later';
          }else {
             $error_message = $mail->sendMail(); 
          }
      // }
      // else{
      //     $error_message = 'Registration failed';
      // }
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
              <h5 class="mb-0">Registraton Form</h5>
              <button type="button" class="btn btn-primary btn-sm" data-mdb-ripple-color="dark">Let's Chat
                App</button>
            </div>   

            <div class="card-body">
              <?php if(isset($error_message)) {echo "<div class='alert alert-warning' alert='role'>".$error_message."</div>";}?>
              <?php if(isset($success_message)) {echo "<div class='alert alert-success' alert='role'>".$success_message."</div>";}?>
              <form action="" method="POST">
                <div class="form-outline mb-4">
                  <input type="text" name="fullname" id="form1Example1" class="form-control"  required/>
                  <label class="form-label" for="form1Example1">Full Name</label>
                </div>
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" name="email" id="form1Example1" class="form-control" required/>
                  <label class="form-label" for="form1Example1">Email address</label>
                </div>
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password"  name="password" id="form1Example2" class="form-control" required/>
                  <label class="form-label" for="form1Example2">Password</label>
                </div>
            </div>
            <!-- Submit button -->
            <div class="mb-4">
              <button name="submit" class="btn btn-success btn-block">Create</button><br>
              <span class="mx-4">Already have an account ?<a href="../login/" > <u> click here </u></a></span>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
<?php include('../include/footer.php') ?>