<?php
    
    require_once '../database/UserClass.php';
    define('TITLE', 'Change Password');
    
    if(!isset($_SESSION['isLogged'])){
        header("location:../login/");
    }
    require_once '../database/converter.php';
    if(isset($_REQUEST['submit'])){
        $email = trim($_POST['email']); 
        $password = trim($_POST['password']);
        $password1 = trim($_POST['password1']);
        $password2 = trim($_POST['password2']);
        
        $user_object = new User;
        $user_object->setUserEmail($email);
        $user_data = $user_object->get_user_data_by_email();
        $user_object->setUserName($user_data['user_name']);
        $user_object->setUserId($user_data['user_id']);
        $user_object->setUserActivation($user_data['user_activation']);
        $user_object->setUserProfile($user_data['user_profile']);
        $user_object->setUserVerificationCode($user_data['user_verification_code']);
            
        if($password2 == $password1){
                if($password1 == $password){
                    $error_message = "Old Password could not be as new password";        
                }else {
                    $user_object->setUserPassword($password1);
                    if($user_object->update_data()){
                        $success_message  = "Password has been changed successfully!";
                    }else {
                        $error_message = "Passowrd could not change, please try again later";
                    }
                }
        }else {
            $error_message = "Please enter same passsword";
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
            </div>
            <div class="card-body">
              <?php if(isset($error_message)) {echo "<div class='alert alert-warning' alert='role'>".$error_message."</div>";}?>
              <?php if(isset($success_message)) {echo "<div class='alert alert-success' alert='role'>".$success_message."</div>";}?>
              <form action="" method="POST">
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" name="email" value="<?php echo $_SESSION['user_data']['user_email'] ?>" id="form1Example1" class="form-control" aria-describedby="emailHelp" readonly required/>
                  <label class="form-label" for="form1Example1">Registered Email address</label>
                </div>
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form1Example2" class="form-control" aria-describedby="emailHelp" required/>
                  <label class="form-label" for="form1Example2">Current Password </label>
                </div>
                <div class="form-outline mb-4">
                  <input type="password" name="password1" id="form1Example2" class="form-control" aria-describedby="emailHelp" required/>
                  <label class="form-label" for="form1Example2">New Password </label>
                </div>
                <div class="form-outline mb-4">
                  <input type="password" name="password2" id="form1Example3" class="form-control" aria-describedby="emailHelp" required/>
                  <label class="form-label" for="form1Example3">Confirm Password </label>
                </div>
            </div>
            <!-- Submit button -->
            <div class="mb-4">
              <button name="submit" class="btn btn-secondary btn-block">SUBMIT</button><br>
              <span class="mx-4">Are you having in tourbleshoot ?<a href="mailto:israfil123.sa@gmail.com" > <u> contact us </u></a></span>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    </div>
  </section>
<?php include('../include/footer.php') ?>