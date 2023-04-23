<?php
session_start();
$page="additional-logic";
include "config.php";
include('paginator.class.php');



if($_SESSION['admin']==""){
     header("location:index.php");
      }


if(isset($_POST["Submit"]) ){  

  $package_type= mysqli_real_escape_string($con,$_POST['package_type']);
  $package_range= mysqli_real_escape_string($con,$_POST['package_range']);
  $package_fixed= mysqli_real_escape_string($con,$_POST['package_fixed']);
  $fixed_amount= mysqli_real_escape_string($con,$_POST['fixed_amount']);
  $slot_amount= mysqli_real_escape_string($con,$_POST['slot_amount']);
  $above_20kg_weight= mysqli_real_escape_string($con,$_POST['above_20kg_weight']);
  
  

$sql="insert into additional_logic(package_type,package_range,package_fixed, fixed_amount, slot_amount, above_20kg_weight) 
    value('".$package_type."','".$package_range."' ,'".$package_fixed."' ,'".$fixed_amount."' ,'".$slot_amount."' ,'".$above_20kg_weight."' )";
$rs=mysqli_query($con,$sql);
if($rs)
{
$msg="New price has been added successfully.";
$msg=urlencode($msg);
header("Location:additional-logic.php?sts=$msg");
}
else
{
$msg=mysqli_error($con);
$msg=urlencode($msg);
header("Location:additional-logic.php?sts=$msg");
}
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=additional-logic.php?sts=inserted\">";
}
        



if(isset($_POST["Update"])) {
          
 

    $id= $_POST['id'];
 
  $package_type= mysqli_real_escape_string($con,$_POST['package_type']);
  $package_range= mysqli_real_escape_string($con,$_POST['package_range']);
  $package_fixed= mysqli_real_escape_string($con,$_POST['package_fixed']);
  $fixed_amount= mysqli_real_escape_string($con,$_POST['fixed_amount']);
  $slot_amount= mysqli_real_escape_string($con,$_POST['slot_amount']);
  $above_20kg_weight= mysqli_real_escape_string($con,$_POST['above_20kg_weight']);
  

$sql="update additional_logic set above_20kg_weight='".$above_20kg_weight."',  package_type='".$package_type."',package_range='".$package_range."',package_fixed='".$package_fixed."',fixed_amount='".$fixed_amount."',slot_amount='".$slot_amount."' where id='$id'"; 
$rs=mysqli_query($con,$sql);
if($rs)
{
$msg="additional Logic Details has been updated successfully";
$msg=urlencode($msg);
header("Location:additional-logic.php?sts=$msg");
}
else
{
$msg=mysqli_error($con);
$msg=urlencode($msg);
header("Location:additional-logic.php?sts=$msg");
}
          
          
          
          
          
      }
  if($_REQUEST['remove']=="yes"){
mysqli_query($con,"delete from additional_logic where id='$_REQUEST[id]'");

header("location:additional-logic.php?msg=Deleted");
}   
      


?><!DOCTYPE html>
<html lang="en">
 
<head>
<title>additional-logic Management</title>
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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current"  style="text-transform: capitalize;">additional-logic</a> </div>
    <h1  style="text-transform: capitalize;">additional-logic</h1>
  </div>
  <div class="container-fluid">  <div class="widget-content"> 
  
    <a href="additional-logic.php?action=Add" class="btn btn-success" style="float: right;">Add additional-logic</a>  
             
    <hr>
    <div class="row-fluid">

      <? if($_GET['action']=="Add"){ ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>additional-logic Management</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
           
          
           
         
             
           
            
             

            <div class="control-group">
              <label class="control-label">Package Type :</label>
              <div class="controls">
                <select class="span11" placeholder="Package Type" name="package_type">
                  
                   <? $sqlpt=mysqli_query($con,"select * from package_type");
           while($rowpt=mysqli_fetch_array($sqlpt)){ ?>
<option value="<? echo $rowpt['option_val']; ?>"><? echo $rowpt['name']; ?></option>

           <? } ?>
                            
                </select>
              
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Package Range :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Package Range" name="package_range">
              </div>
            </div> 
             <div class="control-group">
              <label class="control-label">Package Fixed :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Package Fixed" name="package_fixed">
              </div>
            </div>
             
              <div class="control-group">
              <label class="control-label">Fixed Amount :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Fixed Amount" name="fixed_amount">
              </div>
            </div>
              <div class="control-group">
              <label class="control-label">Slot Amount :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Slot Amount" name="slot_amount">
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Above 20Kg Weight :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="above_20kg_weight" name="above_20kg_weight" >
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


  $s1="select * from additional_logic where id ='$_GET[id]'";
  $rs1=mysqli_query($con,$s1);
  $r1=mysqli_fetch_array($rs1);

        ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>update additional-logic</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
         
         
           


             

            <div class="control-group">
              <label class="control-label">Package Type :</label>
              <div class="controls">
                <select class="span11"  name="package_type" >
                 <? $sqlpt=mysqli_query($con,"select * from package_type");
           while($rowpt=mysqli_fetch_array($sqlpt)){ ?>
<option value="<? echo $rowpt['option_val']; ?>" <? if($r1['package_type']==$rowpt['option_val']){echo "selected";} ?>><? echo $rowpt['name']; ?></option>

           <? } ?>   
                 
                            
                </select>
              
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Package Range :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Package Range" name="package_range" value="<? echo $r1['package_range']; ?>">
              </div>
            </div> 
             <div class="control-group">
              <label class="control-label">Package Fixed :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Package Fixed" name="package_fixed" value="<? echo $r1['package_fixed']; ?>">
              </div>
            </div>
             
              <div class="control-group">
              <label class="control-label">Fixed Amount :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Fixed Amount" name="fixed_amount" value="<? echo $r1['fixed_amount']; ?>">
              </div>
            </div>
              <div class="control-group">
              <label class="control-label">Slot Amount :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Slot Amount" name="slot_amount" value="<? echo $r1['slot_amount']; ?>">
              </div>
            </div> 
            <div class="control-group">
              <label class="control-label">Above 20Kg Weight :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="above_20kg_weight" name="above_20kg_weight" value="<? echo $r1['above_20kg_weight']; ?>">
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
            <h5 style="text-transform: capitalize;">additional-logic list</h5>
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
                
                  <th>Type</th>
                 
                  <th>Fixed Weight</th>
                  <th>First 0.5gm</th> 
                  <th>Range slot</th>
                  <th>Addl. 0.5gm upto 20kg</th> 
                  <th>Above 20kg Weight</th> 
                  <th>Action</th> 
                </tr>
              </thead>
              <tbody>
                <?
    $query = "SELECT COUNT(*) FROM additional_logic";
  $result = mysqli_query($con,$query) or die(mysqli_error($con));
  $num_rows = mysqli_fetch_row($result);

  $pages = new Paginator;
  $pages->items_total = $num_rows[0];
  $pages->mid_range = 9; // Number of pages to display. Must be odd and > 3
  $pages->paginate();
  $i=1;
  $sql=mysqli_query($con,"select * from additional_logic order by id desc $pages->limit");
  if(mysqli_num_rows($sql)>0) {
  while($row=mysqli_fetch_array($sql))
  {
  ?>
                <tr class="odd gradeX">
               
 <td><?php    echo $row['package_type'];   ?></td>
 <td> First <?php    echo $row['package_fixed'];   ?></td> 
 <td><?php    echo $row['fixed_amount'];   ?></td> 

 <td>Additional <?php    echo $row['package_range'];   ?> Weight</td> 
 <td><?php    echo $row['slot_amount'];   ?></td> 
 <td><?php    echo $row['above_20kg_weight'];   ?></td> 
                  <td> 

<a href="additional-logic.php?action=edit&id=<?=$row['id'];?>" class="label   bg_db">Edit</a>  

<a href="javascript:resume_id('<?=$row['id']?>')" class="label label-important">Delete</a> 
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


