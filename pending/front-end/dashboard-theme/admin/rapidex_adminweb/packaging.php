<?php
session_start();
$page="packaging";
include "config.php";
include('paginator.class.php'); 
if($_SESSION['admin']==""){
     header("location:index.php");
      }
if(isset($_POST["Submit"]) ){  
  $name=$_POST['name']; 
$sql="insert into packaging(name) 
    value('".$name."')";
$rs=mysqli_query($con,$sql);
if($rs)
{
$msg="New packaging has been added successfully.";
$msg=urlencode($msg);
header("Location:packaging.php?sts=$msg");
}
else
{
$msg=mysqli_error($con);
$msg=urlencode($msg);
header("Location:packaging.php?sts=$msg");
}
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=packaging.php?sts=inserted\">";
}
        
if(isset($_POST["Update"])) {
          
 
    $id= $_POST['id'];
    $name=mysqli_real_escape_string($con,$_POST['name']);
   
    
$sql="update packaging set name='".$name."'  where id='$id'"; 
$rs=mysqli_query($con,$sql);
if($rs)
{
$msg="packaging Details has been updated successfully";
$msg=urlencode($msg);
header("Location:packaging.php?sts=$msg");
}
else
{
$msg=mysqli_error($con);
$msg=urlencode($msg);
header("Location:packaging.php?sts=$msg");
}
          
          
          
          
          
      }
  if($_REQUEST['remove']=="yes"){
mysqli_query($con,"delete from packaging where id='$_REQUEST[id]'");
header("location:packaging.php?msg=Deleted");
}   
      
?><!DOCTYPE html>
<html lang="en">
 
<head>
<title>packaging</title>
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
  <h1><a href="welcome.php">  Admin</a></h1>
</div>
<!--close-Header-part--> 
<!--top-Header-menu-->
<? include "menu.php"; ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current"  style="text-transform: capitalize;">packaging</a> </div>
    <h1  style="text-transform: capitalize;">packaging</h1>
  </div>
  <div class="container-fluid">  <div class="widget-content"> <a href="packaging.php?action=Add" class="btn btn-success" style="float: right;">Add packaging</a> 
             
    <hr>
    <div class="row-fluid">
      <? if($_GET['action']=="Add"){ ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>packaging</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
           
          
        
            <div class="control-group">
              <label class="control-label">Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="name" name="name">
              </div>
            </div>
          
           
            
           
            
            
            <div class="form-actions">
        
          <input type="submit" value="Save" name="Submit" class="btn btn-success">
              
            </div>
          </form>
        </div>
      </div>
    <? } ?>
      <? if($_GET['action']=="edit"){ 
  $s1="select * from packaging where id ='$_GET[id]'";
  $rs1=mysqli_query($con,$s1);
  $r1=mysqli_fetch_array($rs1);
        ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>update packaging</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
         
      
                   
            <div class="control-group">
              <label class="control-label">Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="name" name="name" value="<? echo $r1['name']; ?>">
              </div>
            </div>
             
           
         
          
       
            <div class="form-actions">  <input type="hidden" name="id" value="<? echo $r1['id']; ?>">
        
          <input type="submit" value="Update" name="Update" class="btn btn-success">
              
            </div>
          </form>
        </div>
      </div>
    <? } ?>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5 style="text-transform: capitalize;">Package list</h5>
          </div>
          <div class="widget-content nopadding">  <form name="form1" method="post" action="">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                
                  <th>packaging</th>
                  
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?
    $query = "SELECT COUNT(*) FROM packaging";
  $result = mysqli_query($con,$query) or die(mysqli_error($con));
  $num_rows = mysqli_fetch_row($result);
  $pages = new Paginator;
  $pages->items_total = $num_rows[0];
  $pages->mid_range = 9; // Number of pages to display. Must be odd and > 3
  $pages->paginate();
  $i=1;
  $sql=mysqli_query($con,"select * from packaging order by id desc $pages->limit");
  if(mysqli_num_rows($sql)>0) {
  while($row=mysqli_fetch_array($sql))
  {
  ?>
                <tr class="odd gradeX">
                  
                  <td><?php echo $row["name"]; ?></td>
                  
                 
                  <td> 
<a href="packaging.php?action=edit&id=<?=$row['id'];?>" class="label   bg_db">Edit</a> 
<a href="javascript:resume_id('<?=$row['id']?>')" class="label label-important">Delete</a> 
                  </td>
                </tr>
                             
  <?
  }
  }else
  {
  ?>
        <tr> 
            <td colspan="6">No Records Found!</td> 
            
        </tr> 
                 <?php } ?>
        
        <tr> 
            <td colspan="6">
              <?php
    echo $pages->display_pages();
    echo "<span class=\"\">".$pages->display_jump_menu().$pages->display_items_per_page()."</span>";
    ?></td> 
            
        </tr>  
              </tbody>
            </table>
 </form>
 
          </div>
        </div>
  
      
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2022 &copy;   Admin.  </div>
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
