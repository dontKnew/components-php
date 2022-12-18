<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Ready Bootstrap Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <link rel="stylesheet" href="<?= base_url("admin/css/bootstrap.min.css") ?>">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="<?= base_url("admin/css/ready.css") ?>">
    <link rel="stylesheet" href="<?= base_url("admin/css/demo.css") ?>">
</head>
<style>
    .footer {
        position: absolute;
        bottom: 5px;
        width: 100%
    }
</style>
<body style="background-color: #0f6674;">
<div class="wrapper">

        <div class="content ">
        <div class="container-fluid row d-flex justify-content-center align-items-center">
            <!--start main content-->
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header" >
                        <div class="card-title d-flex justify-content-center align-items-center"><i class="la la-user-secret la-2x"></i> Admin Login</div>
                    </div>
                    <div class="card-body">
                        <?php if (session()->has('msg')) : ?>
                            <div class="alert alert-success text-center" role="alert">
                                <?= session()->getFlashdata("msg") ?>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->has('err')) : ?>
                            <div class="alert alert-danger text-center" role="alert">
                                <?php if(is_array(session()->getFlashdata("err"))): ?>
                                    <?php foreach(session()->getFlashdata("err") as $err): ?>
                                        <?= $err ?>
                                    <?php endforeach; ?>
                                <?php else: echo session()->getFlashdata("err") ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <form action="<?= base_url("admin/login") ?>" method="post">
                            <div class="form-group">
                                <label for="squareInput"> Email Address </label>
                                <input type="text" name="email" value="<?= old("email") ?>" class="form-control input-square" placeholder="Enter registered email ">
                            </div>
                            <div class="form-group">
                                <label for="squareInput"> Password </label>
                                <input type="password" minlength="6" name="password" class="form-control input-square" placeholder="Enter your password ">
                            </div>
                            <div class="form-check-inline mt-2 mb-4 mx-2">
                                <input class="form-check-input" type="checkbox" name="remember_admin" <?php if(old("remember_admin")){ echo "checked";} ?> >
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remember me
                                </label>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-primary">Log In</button>
                            </div>
                        </form>
                </div>

            </div>
            <!--end main content-->
        </div>

        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                E-Service Apartment
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Help
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright ml-auto">
                    2022, made with <i class="la la-heart heart text-danger"></i> by <a href="#">Global Height</a>
                </div>
            </div>
        </footer>
    </div>

</div>

</body>
</body>
<script src="<?= base_url("admin/js/core/jquery.3.2.1.min.js") ?>"></script>
<script>
    /*$(document).ready(function(){
        $("#searchInput").on("keyup", function(){
            let text = $(this).val();
            let tableName = $("#tableName").val();
            let url = "<?php echo base_url()."/admin/search-engine/"?>"+tableName+"/"+text;
            if (text !== "") {
                $.ajax({
                    url: url,
                    type: "GET",
                    cache: false,
                    success: function (data) {
                        $("#countrylist").html(data);
                        $("#countrylist").fadeIn();
                    },
                    error: function () {
                        console.warn("frontend ajax errors");
                    }
                });
            }else {
                $("#countrylist").fadeOut();
            }


        });
    })*/
</script>
<script src="<?= base_url("admin/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js") ?>"></script>

<script src="<?= base_url("admin/js/core/popper.min.js") ?>"></script>
<script src="<?= base_url("admin/js/core/bootstrap.min.js") ?>"></script>

<script src="<?= base_url("admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js") ?>"> </script>
<script src="<?= base_url("admin/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js") ?>"></script>
<script src="<?= base_url("admin/js/plugin/jquery-mapael/jquery.mapael.min.js") ?>"></script>
<script src="<?= base_url("admin/js/plugin/jquery-mapael/maps/world_countries.min.js") ?>"></script>


<script src="<?= base_url("admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js") ?>"> </script>
<script src="<?= base_url("admin/js/ready.min.js") ?>"></script>
<script src="<?= base_url("admin/js/demo.js") ?>"</script>
</html>
