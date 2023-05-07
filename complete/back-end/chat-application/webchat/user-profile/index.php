<?php
    if (!isset($_SESSION['isLogged'])) {
        header('location:../login/');
    }
    $id = null; 
    $user_data = null;
    if(isset($_GET['id'])){
        $id = trim($_GET['id']);
        if($id==$_SESSION['user_data']['user_id']){
            header("location:../profile/");
        }else{
            require_once '../database/UserClass.php';
            $user_object = new User;
            $user_object->setUserId($id);
            if($user_data = $user_object->get_user_data_by_id()){
                  
            }else {
                header("location:../login");
            }
        }
    }else {
        header("location:../login");
    }

    require_once '../database/converter.php';
    $converter = new Converter;
?>
<?php include('../include/header.php'); ?>
<section style="background-color: #eee;">
    <div class="container py-2">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6">
                <div class="card p-2">
                <div class="card-header d-flex justify-content-between align-items-center p-3">
                    <h5 class="mb-0"><?php echo $user_data['user_name']; ?>'s Profile</h5>
                </div>
                    <div class="card-body">
                        <?php if (isset($error_message)) {
                            echo "<div class='alert alert-warning' alert='role'>" . $error_message . "</div>";
                        } ?>
                        <?php if (isset($success_message)) {
                            echo "<div class='alert alert-success' alert='role'>" . $success_message . "</div>";
                        } ?>
                        <form>
                        <div class="form-outline mb-4 text-center">
                                <input type="button" class="btn btn-secondary" value="<?php if(strtoupper($_SESSION['user_data']['user_activation'])=="ENABLE") {echo "Account Status : Acitve"; }else{echo "Account Status-Disabled";} ?>" readonly required />
                            </div>
                        <div class="d-flex flex-column align-items-center justify-content-center mb-4">
                            <img src="<?php echo $user_data['user_profile'];?>" alt="profile" class="shadow-lg rounded-circle img-fluid mb-2" width="120" height="120">
                            <span class="text-muted"> Last Active 2 mint ago </span> 
                        </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="form1Example1" value="<?php echo $user_data['user_name'] ?>" class="form-control" readonly required />
                                <label class="form-label" for="form1Example1">Full Name</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="form1Example1" value="Not Availble" class="form-control" readonly required />
                                <label class="form-label" for="form1Example1">Phone Number</label>
                            </div>
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="form1Example1" value="<?php echo substr($user_data['user_email'], 0, 3); ?>******@gmail.com" class="form-control" readonly  required />
                                <label class="form-label" for="form1Example1" >Email address</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="email" id="form1Example1" value="<?php echo $converter->timeAgo($_SESSION['user_data']['user_timestamp']);?>" class="form-control" readonly  required />
                                <label class="form-label" for="form1Example1" >Registratin time</label>
                            </div>
                    </div>
                    <!-- Submit button -->
                    <div class="mb-4">
                        <a href="../personal/?<?php echo $user_data['user_id'];?>" class="btn btn-success btn-block">Chat Now</a><br>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
</section>
<?php include('../include/footer.php') ?>