<?php
  require_once('../database/UserClass.php');
  define('TITLE', 'Login');
  if(isset($_SESSION['isLogged'])){
    header("location:../group/");
  }
  if(isset($_REQUEST['submit'])){
    $email = trim($_POST['email']);  
    $password = trim($_POST['password']); 
    $user_object = new User;
    $user_object->setUserEmail($email);
    $user_data = $user_object->get_user_data_by_email();
    // return print_r($user_data);

    if(is_array($user_data) && count($user_data) > 0) {
        if($user_data['user_activation'] == 'Enable'){
            if($user_data['user_password'] == $password){
                  $_SESSION['user_data'] = $user_data;
                  $_SESSION['isLogged'] = true;
                   $user = new User;
                   $user->setUserId($user_data['user_id']);
                   $user->setUserStatus("online");
                   $user->update_user_status();
                    header('location:../group/');
            }
            else{
              $error_message = 'Please enter correct password';
            }
        }else {
          $error_message = 'Please verify your email address';
        }
    }else{
      $error_message = 'Email address does not match with our records';
    }
  }

  if(isset($_GET['code'])){
    $user_object = new User;
    $user_object->setUserVerificationCode($_GET['code']);
    if($user_object->is_valid_email_verification_code()){
        $user_object->setUserActivation('Enable');
        if($user_object->enable_user_account()){
            $success_message = 'Your Email Successfully verify, now you can login into this chat Application';
        }
        else{
          $error_message = 'Something wrong try again...';
        }
    }else{
      $error_message = 'Something went wrong try again....';
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
              <h5 class="mb-0"> Login Form </h5>
              <button type="button" class="btn btn-primary btn-sm" data-mdb-ripple-color="dark">Let's Chat
                App</button>
            </div>

            <div class="card-body">
              
              <?php if(isset($error_message)) {echo "<div class='alert alert-warning' alert='role'>".$error_message."</div>";}?>
              <?php if(isset($success_message)) {echo "<div class='alert alert-success' alert='role'>".$success_message."</div>";}?>
              <?php if(isset($_GET['true'])=="changed") {echo "<div class='alert alert-success' alert='role'>Password has been changed successfully!</div>";}?>
              
              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
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
                <div class="col">
                  <!-- Simple link -->
                  <a href="../forget-pass/" class='text-center text-danger shadow-md'>Are you Forgot password ?</a>
                </div>
            </div>
            <!-- Submit button -->
            <div class="mb-4">
              <button name="submit" name="submit" class="btn btn-warning btn-block">Log in</button><br>
              <span class="mx-4">Don`t have an account ?<a href="../registration/" > <u> click here </u></a></span>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
<?php include('../include/footer.php') ?>