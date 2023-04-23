<?php
session_start();
include "config.php";
include('paginator.class.php');

if($_SESSION['admin']==""){
     header("location:index.php");
      }
 
if(isset($_POST['Submit']))
{
  extract($_POST);
  $sql="update admin set
         admin_name = '$user',
         admin_password  = '$pass'
         where admin_id='$id'";
  mysql_query($sql) or die(mysql_error());
  $msz ="Changed Successfully";
}

$sql="select * from admin";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);


?><!DOCTYPE html>
<html lang="en">
 
<head>
<title>Change Password</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>


<script src="dist/jquery.simplePagination.js"></script>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="welcome.php">TaxTDS Admin</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<? include "menu.php"; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current"  style="text-transform: capitalize;">change password</a> </div>
    <h1  style="text-transform: capitalize;">change password</h1>
  </div>
  <div class="container-fluid">  <div class="widget-content"> 
             
    <hr>
    <div class="row-fluid">
 

 
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Change Password</h5>
        </div>
        <div class="widget-content nopadding">
          <form   action="<?php echo $_SERVER['PHP_SELF']; ?>"enctype="multipart/form-data" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">User Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="User Name" name="user"  value="<?=$row['admin_name'];?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Password"   name="pass" value="<?=$row['admin_password'];?>">
              </div>
            </div>
           
       
            <div class="form-actions">

          <input type="hidden" name="id" value="<?=$row['admin_id'];?>">
          <input type="submit" value="Update" name="Submit" class="btn btn-success"> 
              
            </div>
          </form>
        </div>
      </div>
 
     
  
      
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; TaxTDS Admin.  </div>
</div>
<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>
<script type="text/javascript">
function resume_id(res_id){

var agree=confirm("Are you sure you wish to continue?");
if (agree) {
window.location.href='<?php echo $_SERVER['PHP_SELF']; ?>?remove=yes&id='+res_id;
window.submit();
}
else {
  
}
}
</script>
</body>
 
</html>
