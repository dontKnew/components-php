<?php
session_start();
$page="pincode-logic";
include "config.php";
include('paginator.class.php');



if($_SESSION['admin']==""){
     header("location:index.php");
      }

 

if(isset($_POST["Update"])) {
          
 

    $id= $_POST['id'];
 
  $delhi= mysqli_real_escape_string($con,$_POST['delhi']);
  $non_delhi_500= mysqli_real_escape_string($con,$_POST['non_delhi_500']);
  $non_delhi_500_plus= mysqli_real_escape_string($con,$_POST['non_delhi_500_plus']);
  $non_delhi_1_plus= mysqli_real_escape_string($con,$_POST['non_delhi_1_plus']);
  


$sql="update pincode_logic set delhi='".$delhi."',non_delhi_500='".$non_delhi_500."',non_delhi_500_plus='".$non_delhi_500_plus."',non_delhi_1_plus='".$non_delhi_1_plus."' where id='$id'"; 
$rs=mysqli_query($con,$sql);
if($rs)
{
$msg="Pincode Logic Details has been updated successfully";
$msg=urlencode($msg);
header("Location:pincode-logic.php?sts=$msg");
}
else
{
$msg=mysqli_error($con);
$msg=urlencode($msg);
header("Location:pincode-logic.php?sts=$msg");
}
          
          
          
          
          
      }
  if($_REQUEST['remove']=="yes"){
mysqli_query($con,"delete from pincode_logic where id='$_REQUEST[id]'");

header("location:pincode-logic.php?msg=Deleted");
}   
      


?><!DOCTYPE html>
<html lang="en">
 
<head>
<title>pincode-logic Management</title>
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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current"  style="text-transform: capitalize;">pincode-logic</a> </div>
    <h1  style="text-transform: capitalize;">pincode-logic</h1>
  </div>
  <div class="container-fluid">  <div class="widget-content"> 
<!-- 
    <a href="pincode-logic.php?action=Add" class="btn btn-success" style="float: right;">Add pincode-logic</a>  -->
             
    <hr>
    <div class="row-fluid">
 


      <? if($_GET['action']=="edit"){ 


  $s1="select * from pincode_logic where id ='$_GET[id]'";
  $rs1=mysqli_query($con,$s1);
  $r1=mysqli_fetch_array($rs1);

        ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>update pincode-logic</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
         
         
            <div class="control-group">
              <label class="control-label">Delhi :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Delhi Additional Price" name="delhi" value="<? echo $r1['delhi']; ?>">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Non Delhi initial 500 :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Non Delhi initial 500 Price" name="non_delhi_500" value="<? echo $r1['non_delhi_500']; ?>">
              </div>
            </div>
             
     <div class="control-group">
              <label class="control-label">Non Delhi initial 500 Plus Till 20 Kg:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Non Delhi Plus 500 Price" name="non_delhi_500_plus" value="<? echo $r1['non_delhi_500_plus']; ?>">
              </div>
            </div>
               
     <div class="control-group">
              <label class="control-label">Non Delhi initial 1K Plus after 20 KG:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Non Delhi Plus 1 Kg Plus " name="non_delhi_1_plus" value="<? echo $r1['non_delhi_1_plus']; ?>">
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
            <h5 style="text-transform: capitalize;">pincode-logic list</h5>
          </div>
<style type="text/css">
 .table-responsive 
{   
    width: 100%;
    margin-bottom: 15px;
    overflow-x: auto;   
    overflow-y: hidden;     
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;
    border: 1px solid #000000; 
}
</style>

          <div class="widget-content nopadding">  <form name="form1" method="post" action="">
            <table class="table table-bordered table-striped table-responsive">
              <thead>
                <tr>
                
                  <th>Delhi</th>
                  <th>Non Delhi 500</th> 
                  <th>Non Delhi 500 Plus till 20KG</th> 
                  <th>Non Delhi 1Kg Plus After 20KG</th> 
                  <th>Action</th> 
                </tr>
              </thead>
              <tbody>
                <?
    $query = "SELECT COUNT(*) FROM pincode_logic";
  $result = mysqli_query($con,$query) or die(mysqli_error($con));
  $num_rows = mysqli_fetch_row($result);

  $pages = new Paginator;
  $pages->items_total = $num_rows[0];
  $pages->mid_range = 9; // Number of pages to display. Must be odd and > 3
  $pages->paginate();
  $i=1;
  $sql=mysqli_query($con,"select * from pincode_logic order by id desc $pages->limit");
  if(mysqli_num_rows($sql)>0) {
  while($row=mysqli_fetch_array($sql))
  {
  ?>
                <tr class="odd gradeX">
               
 <td><?php    echo $row['delhi'];   ?></td>
 <td><?php    echo $row['non_delhi_500'];   ?></td> 
 <td><?php    echo $row['non_delhi_500_plus'];   ?></td> 
 <td><?php    echo $row['non_delhi_1_plus'];   ?></td> 
                  <td> 

<a href="pincode-logic.php?action=edit&id=<?=$row['id'];?>" class="label   bg_db">Edit</a>  
                  </td> 

                </tr>

                             
  <?
  }
  }else
  {
  ?>
        <tr> 
            <td colspan="66">No Records Found!</td> 
            
        </tr> 
                 <?php } ?>
        
        <tr> 
            <td colspan="66">




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
  <div id="footer" class="span12"> 2013 &copy;   Admin.  </div>
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


