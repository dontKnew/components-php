<?php
session_start();
$page="ratelist";
include "config.php";
include('paginator.class.php');

if($_SESSION['admin']==""){
     header("location:index.php");
      }


if(isset($_POST["Submit"]) ){  
 

$img=$_FILES['filstor']['name'];

     $tmpName=$_FILES['filstor']['tmp_name']; 

     if($img<>"")

         {

          $ext = strrchr($img, ".");

          $prefix=str_replace(" ","-",$name);

          $newName = "ratelist". $ext;

            move_uploaded_file($tmpName,"".$newName);

         } 
  
    
header("Location:ratelist.php?sts=$msg");
 
}
        


 


if(isset($_POST["UpdateDiscount"])) {
          
  
 
  $val= mysqli_real_escape_string($con,$_POST['val']);
   

$sql="update valueparameter set val='".$val."'  where id='1'"; 
$rs=mysqli_query($con,$sql);
if($rs)
{
$msg="Discount Logic Details has been updated successfully";
$msg=urlencode($msg);
header("Location:ratelist.php?sts=$msg");
}
else
{
$msg=mysqli_error($con);
$msg=urlencode($msg);
header("Location:ratelist.php?sts=$msg");
}
          
          
          
          
          
      }

?><!DOCTYPE html>
<html lang="en">
 
<head>
<title>ratelist Management</title>
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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current"  style="text-transform: capitalize;">ratelist</a> </div>
    <h1  style="text-transform: capitalize;">ratelist</h1>
  </div>
  <div class="container-fluid">  <div class="widget-content"> 


     <a href="export-ratelist.php" class="btn btn-success" style="float: right;" target="_blank">Export Ratelist DB</a>  
             
    <a href="import-excel.php" class="btn btn-info" style="float: right;" target="_blank">Import Excel</a> &nbsp;&nbsp;
    <a href="clear-ratelist.php" class="btn btn-danger" style="float: right;">Clear Data</a> &nbsp;&nbsp;
    <a href="ratelist.php?action=Add" class="btn btn-success" style="float: right;">Upload New Excel</a> &nbsp;&nbsp;
    <a href="ratelist.xlsx" class="btn btn-warning" style="float: right;">Download Old Excel</a> &nbsp;&nbsp;
             
    <hr>
    <div class="row-fluid">

      <? if($_GET['action']=="Add"){ ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>ratelist Management</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
           
          
            
             
             <div class="control-group">
              <label class="control-label">File upload input</label>
              <div class="controls">
                <div class="uploader" id="uniform-undefined"><input type="file" size="19" style="opacity: 0;" name="filstor"><span class="filename">No file selected</span><span class="action">Choose File</span></div>
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


  $s1="select * from ratelist where id ='$_GET[id]'";
  $rs1=mysqli_query($con,$s1);
  $r1=mysqli_fetch_array($rs1);

        ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>update ratelist</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
         
       
             <div class="control-group">
              <label class="control-label">Client :</label>
              <div class="controls">
                <select  class="span11"  name="client_id">
                <? $sqlc=mysqli_query($con, "select * from client");
                while($rowc=mysqli_fetch_array($sqlc)){ ?>
                  <option value="<? echo $rowc['id']; ?>" <? if($rowc['id']==$r1['client_id']){echo "selected"; }?>><? echo $rowc['name']; ?></option>
               <? } ?>
                </select>
              </div>
            </div>
            
            
              
             <div class="control-group">
              <label class="control-label">Commodity :</label>
              <div class="controls">
                <select  class="span11"  name="commodity_id">
                <? $sqlc=mysqli_query($con, "select * from commodity");
                while($rowc=mysqli_fetch_array($sqlc)){ ?>
                  <option value="<? echo $rowc['id']; ?>" <? if($rowc['id']==$r1['commodity_id']){echo "selected"; }?>><? echo $rowc['name']; ?></option>
               <? } ?>
                </select>
              </div>
            </div>
            
            
              
             <div class="control-group">
              <label class="control-label">Packaging :</label>
              <div class="controls">
                <select  class="span11"  name="packaging_id">
                <? $sqlc=mysqli_query($con, "select * from packaging");
                while($rowc=mysqli_fetch_array($sqlc)){ ?>
                  <option value="<? echo $rowc['id']; ?>" <? if($rowc['id']==$r1['packaging_id']){echo "selected"; }?>><? echo $rowc['name']; ?></option>
               <? } ?>
                </select>
              </div>
            </div>
            
             
 

                               <div class="control-group">
              <label class="control-label">Price :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Price" name="price" value="<? echo $r1['price']; ?>">
              </div>
            </div>
                           
       
            <div class="form-actions">  <input type="hidden" name="id" value="<? echo $r1['id']; ?>">
        
          <input type="submit" value="Update" name="Update" class="btn btn-success">
              
            </div>
          </form>
        </div>
      </div>

    <? } ?>

 <form name="form1" method="post" action="">




      <?  


  $s1="select * from valueparameter";
  $rs1=mysqli_query($con,$s1);
  $r1=mysqli_fetch_array($rs1);

        ?>
      <div class="widget-box">
        <!--<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>-->
        <!--  <h5>Discount</h5>-->
        <!--</div>-->
        <div class="widget-content nopadding">
     <!--     <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">-->
         
          
     <!--<div class="control-group">-->
     <!--         <label class="control-label">Discount:</label>-->
     <!--         <div class="controls">-->
     <!--           <input type="hidden" class="span11" placeholder="Discount" name="val" value="<? echo $r1['val']; ?>">-->
     <!--         </div>-->
     <!--       </div>-->
             
  
                           
       
     <!--       <div class="form-actions">  -->
        
     <!--     <input type="submit" value="Update" name="UpdateDiscount" class="btn btn-success">-->
              
     <!--       </div>-->
     <!--     </form>-->

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5 style="text-transform: capitalize;">ratelist list</h5>
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
 
       
 

            <table class="table table-bordered table-striped table-responsive">
              <thead>
                <tr>
                
                  <th>Destination</th>
                  <th>Code</th>
                  <th>Zone</th>  
                  <th>Service </th> 
                  <th>Estimated Delivery</th> 
                  <th>f</th> 
                  <th>g</th> 
                  <th>H</th> 
                  <th>I</th> 
                  <th>J</th> 
                  <th>K</th> 
                  <th>L</th> 
                  <th>M</th> 
                  <th>N</th> 
                  <th>O</th>  
                </tr>
              </thead>
              <tbody>
                <?
    $query = "SELECT COUNT(*) FROM ratelist";
  $result = mysqli_query($con,$query) or die(mysqli_error($con));
  $num_rows = mysqli_fetch_row($result);

  $pages = new Paginator;
  $pages->items_total = $num_rows[0];
  $pages->mid_range = 9; // Number of pages to display. Must be odd and > 3
  $pages->paginate();
  $i=1;
  $sql=mysqli_query($con,"select * from ratelist order by id desc $pages->limit");
  if(mysqli_num_rows($sql)>0) {
  while($row=mysqli_fetch_array($sql))
  {
  ?>
                <tr class="odd gradeX">
               
 <td><?php    echo $row['destination'];   ?></td>
 <td><?php    echo $row['code'];   ?></td>
 <td><?php    echo $row['zone'];   ?></td>
                 
 <td><?php    echo $row['service'];   ?></td>
 <td><?php    echo $row['estimated_delivery'];   ?></td> 
 <td><?php    echo $row['f'];   ?></td>
 <td><?php    echo $row['g'];   ?></td>
 <td><?php    echo $row['h'];   ?></td>
 <td><?php    echo $row['i'];   ?></td>
 <td><?php    echo $row['j'];   ?></td>
 <td><?php    echo $row['k'];   ?></td>
 <td><?php    echo $row['l'];   ?></td>
 <td><?php    echo $row['m'];   ?></td>
 <td><?php    echo $row['n'];   ?></td>
 <td><?php    echo $row['o'];   ?></td> 

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


