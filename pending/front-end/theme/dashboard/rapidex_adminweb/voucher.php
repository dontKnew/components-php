<?php
session_start();
$page="voucher";
include "config.php";
include('paginator.class.php'); 
if($_SESSION['admin']==""){
     header("location:index.php");
      }
if(isset($_POST["Submit"]) ){  
  $name=$_POST['name']; 
  $mobile=$_POST['mobile']; 
  $email=$_POST['email']; 
  $amount=$_POST['amount']; 
  $payment_mode=$_POST['payment_mode']; 
  $payment_date=$_POST['payment_date'];  
$sql="insert into voucher(name,mobile, email, amount, payment_mode, payment_date, created_timestamp,  updated_timestamp) 
    value('".$name."','".$mobile."','".$email."','".$amount."','".$payment_mode."','".$payment_date."',now(),now())";
$rs=mysqli_query($con,$sql);
if($rs)
{
$msg="New voucher has been added successfully.";
$msg=urlencode($msg);
header("Location:voucher.php?sts=$msg");
}
else
{
$msg=mysqli_error($con);
$msg=urlencode($msg);
header("Location:voucher.php?sts=$msg");
}
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=voucher.php?sts=inserted\">";
}
        
if(isset($_POST["Update"])) {
          
 
    $id= $_POST['id'];
    $name=mysqli_real_escape_string($con,$_POST['name']);
    
  $mobile=$_POST['mobile']; 
  $email=$_POST['email']; 
  $amount=$_POST['amount']; 
  $payment_mode=$_POST['payment_mode']; 
  $payment_date=$_POST['payment_date'];  
    
$sql="update voucher set name='".$name."',mobile='".$mobile."',email='".$email."',amount='".$amount."',payment_date='".$payment_date."',payment_mode='".$payment_mode."',updated_timestamp=now()  where id='$id'"; 
$rs=mysqli_query($con,$sql);
if($rs)
{
$msg="voucher Details has been updated successfully";
$msg=urlencode($msg);
header("Location:voucher.php?sts=$msg");
}
else
{
$msg=mysqli_error($con);
$msg=urlencode($msg);
header("Location:voucher.php?sts=$msg");
}
          
          
          
          
          
      }
  if($_REQUEST['remove']=="yes"){
mysqli_query($con,"delete from voucher where id='$_REQUEST[id]'");
header("location:voucher.php?msg=Deleted");
}   
      
?><!DOCTYPE html>
<html lang="en">
 
<head>
<title>voucher</title>
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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current"  style="text-transform: capitalize;">voucher</a> </div>
    <h1  style="text-transform: capitalize;">voucher</h1>
  </div>
  <div class="container-fluid">  <div class="widget-content"> <a href="voucher.php?action=Add" class="btn btn-success" style="float: right;">Add voucher</a> 
             
    <hr>
    <div class="row-fluid">
      <? if($_GET['action']=="Add"){ ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>voucher</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
           
          
        
            <div class="control-group">
              <label class="control-label">Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="name" name="name">
              </div>
            </div>
          
           
            
            <div class="control-group">
              <label class="control-label">Mobile :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="mobile" name="mobile">
              </div>
            </div>
          
           
            
            <div class="control-group">
              <label class="control-label">Email :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="email" name="email">
              </div>
            </div>
          
           
            
            <div class="control-group">
              <label class="control-label">Amount :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="amount" name="amount">
              </div>
            </div>
          
           
            
            <div class="control-group">
              <label class="control-label">Payment Mode :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="payment_mode" name="payment_mode">
              </div>
            </div>
          
           
             <div class="control-group">
              <label class="control-label">Payment Date :</label>
              <div class="controls">
                <input type="date" class="span11" placeholder="payment_date" name="payment_date">
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
  $s1="select * from voucher where id ='$_GET[id]'";
  $rs1=mysqli_query($con,$s1);
  $r1=mysqli_fetch_array($rs1);
        ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>update voucher</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
         
      
                   
            <div class="control-group">
              <label class="control-label">Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="name" name="name" value="<? echo $r1['name']; ?>">
              </div>
            </div>
           
            
            <div class="control-group">
              <label class="control-label">Mobile :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="mobile" name="mobile" value="<? echo $r1['mobile']; ?>">
              </div>
            </div>
          
           
            
            <div class="control-group">
              <label class="control-label">Email :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="email" name="email" value="<? echo $r1['email']; ?>">
              </div>
            </div>
          
           
            
            <div class="control-group">
              <label class="control-label">Amount :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="amount" name="amount" value="<? echo $r1['amount']; ?>">
              </div>
            </div>
          
           
            
            <div class="control-group">
              <label class="control-label">Payment Mode :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="payment_mode" name="payment_mode" value="<? echo $r1['payment_mode']; ?>">
              </div>
            </div>
          
           
             <div class="control-group">
              <label class="control-label">Payment Date :</label>
              <div class="controls">
                <input type="date" class="span11" placeholder="payment_date" name="payment_date" value="<? echo $r1['payment_date']; ?>">
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
            <h5 style="text-transform: capitalize;">Voucher list</h5>
          </div>
          <div class="widget-content nopadding">  <form name="form1" method="post" action="">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Amount</th>
                  <th>Mode</th>
                  <th>Date</th> 
                  
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?
    $query = "SELECT COUNT(*) FROM voucher";
  $result = mysqli_query($con,$query) or die(mysqli_error($con));
  $num_rows = mysqli_fetch_row($result);
  $pages = new Paginator;
  $pages->items_total = $num_rows[0];
  $pages->mid_range = 9; // Number of pages to display. Must be odd and > 3
  $pages->paginate();
  $i=1;
  $sql=mysqli_query($con,"select * from voucher order by id desc $pages->limit");
  if(mysqli_num_rows($sql)>0) {
  while($row=mysqli_fetch_array($sql))
  {
  ?>
                <tr class="odd gradeX">
                  
                  <td><?php echo $row["name"]; ?></td>
                  <td><?php echo $row["mobile"]; ?></td>
                  <td><?php echo $row["amount"]; ?></td>
                  <td><?php echo $row["payment_mode"]; ?></td>
                  <td><?php echo $row["payment_date"]; ?></td>
                  
                 
                  <td> 
<a href="voucher.php?action=edit&id=<?=$row['id'];?>" class="label   bg_db">Edit</a> 
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
