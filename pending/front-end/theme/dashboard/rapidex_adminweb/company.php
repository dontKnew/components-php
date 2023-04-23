<?php
session_start();
$page="company";
include "config.php";
include('paginator.class.php'); 
if($_SESSION['admin']==""){
     header("location:index.php");
      }
if(isset($_POST["Submit"]) ){  
  $name=$_POST['name']; 
  $code=$_POST['code']; 
  $remote_area_charge=$_POST['remote_area_charge']; 
  $fuel_surcharge=$_POST['fuel_surcharge']; 

$img=$_FILES['filstor']['name'];

     $tmpName=$_FILES['filstor']['tmp_name']; 

     if($img<>"")

         {

          $ext = strrchr($img, ".");

          $prefix=str_replace(" ","-",$name);

          $newName = $prefix ."-". substr(md5(rand() * time()), 0, 5) . $ext;

            move_uploaded_file($tmpName,"photo/".$newName);

         } 
  
$sql="insert into company(remote_area_charge, name,code,fuel_surcharge, photo) 
    value('".$remote_area_charge."','".$name."','".$code."','".$fuel_surcharge."','".$newName."')";
$rs=mysqli_query($con,$sql);
if($rs)
{
$msg="New company has been added successfully.";
$msg=urlencode($msg);
header("Location:company.php?sts=$msg");
}
else
{
$msg=mysqli_error($con);
$msg=urlencode($msg);
header("Location:company.php?sts=$msg");
}
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=company.php?sts=inserted\">";
}
        
if(isset($_POST["Update"])) {
          
 
    $id= $_POST['id'];
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $code=mysqli_real_escape_string($con,$_POST['code']);
  $fuel_surcharge=mysqli_real_escape_string($con,$_POST['fuel_surcharge']); 
  $discount=mysqli_real_escape_string($con,$_POST['discount']); 
  $remote_area_charge=mysqli_real_escape_string($con,$_POST['remote_area_charge']);  
  $offered_packages=$_POST['offered_packages']; 
   $offered_packages_new="";

   foreach($offered_packages as $a){
    $offered_packages_new=$offered_packages_new.",".$a;
   }

   $offered_packages_new=substr($offered_packages_new,1);




 
$img=$_FILES['filstor']['name'];
$tmpName=$_FILES['filstor']['tmp_name'];
$oldimg=$_POST['oldimg'];

 

 if($img<>"")

  {

      $ext = strrchr($img, ".");

            $prefix=str_replace(" ","-",$name);

            $newName = $prefix ."-". substr(md5(rand() * time()), 0, 5) . $ext;

            move_uploaded_file($tmpName,"photo/".$newName);





  @unlink("photo/".$oldimg); 

  move_uploaded_file($tmpName,"photo/".$newName);



 }



else

{

$newName=$oldimg;

}

$sql="update company set remote_area_charge='".$remote_area_charge."', name='".$name."',code='".$code."',fuel_surcharge='".$fuel_surcharge."',photo='".$newName."',discount='".$discount."',offered_packages='".$offered_packages_new."'  where id='$id'"; 
$rs=mysqli_query($con,$sql);
if($rs)
{
$msg="company Details has been updated successfully";
$msg=urlencode($msg);
header("Location:company.php?sts=$msg");
}
else
{
$msg=mysqli_error($con);
$msg=urlencode($msg);
header("Location:company.php?sts=$msg");
}
          
          
          
          
          
      }
  if($_REQUEST['remove']=="yes"){
mysqli_query($con,"delete from company where id='$_REQUEST[id]'");
header("location:company.php?msg=Deleted");
}   
      
?><!DOCTYPE html>
<html lang="en">
 
<head>
<title>company</title>
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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current"  style="text-transform: capitalize;">company</a> </div>
    <h1  style="text-transform: capitalize;">company</h1>
  </div>
  <div class="container-fluid">  <div class="widget-content"> <a href="company.php?action=Add" class="btn btn-success" style="float: right;">Add company</a> 
             
    <hr>
    <div class="row-fluid">
      <? if($_GET['action']=="Add"){ ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>company</h5>
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
              <label class="control-label">Code :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="code" name="code" >
              </div>
            </div>
            

                   
            <div class="control-group">
              <label class="control-label">Fuel Surcharge :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Fuel Surcharge" name="fuel_surcharge" >
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Remote Area Charge :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Fuel Surcharge" name="remote_area_charge">
              </div>
            </div>

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
  $s1="select * from company where id ='$_GET[id]'";
  $rs1=mysqli_query($con,$s1);
  $r1=mysqli_fetch_array($rs1);
        ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>update company</h5>
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
              <label class="control-label">Code :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="code" name="code" value="<? echo $r1['code']; ?>">
              </div>
            </div>         
            <div class="control-group">
              <label class="control-label">Fuel Surcharge :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Fuel Surcharge" name="fuel_surcharge" value="<? echo $r1['fuel_surcharge']; ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Remote Area Charge :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Fuel Surcharge" name="remote_area_charge" value="<? echo $r1['remote_area_charge']; ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Discount :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Discount" name="discount" value="<? echo $r1['discount']; ?>">
              </div>
            </div>
           
            <div class="control-group">
                                 <label class="control-label">Photos</label>
                                 <img src="photo/<? echo $r1['photo']; ?>" width="100"> 
                                   <input type="file"  name="filstor"  class="form-control">
                                    <input type="hidden" name="oldimg" value="<? echo $r1['photo']; ?>">
                                  
                              </div>
         
             <div class="control-group">
              <label class="control-label">Offered Packages (to Remove) :</label>
              <div class="controls">
                
<select  class="span11" name="offered_packages[]" multiple  >

  <? $sqlop=mysqli_query($con,"select * from package_type");
  while($rowop=mysqli_fetch_array($sqlop)){ ?>

<option value="<? echo $rowop['option_val']; ?>"

<?  if(strpos($r1['offered_packages'], $rowop['option_val'])!==false){
  echo "selected"; 
} ?>

  ><? echo $rowop['name']; ?></option>
  <? } ?>
  

</select>

              
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
            <h5 style="text-transform: capitalize;">Company list</h5>
          </div>
          <div class="widget-content nopadding">  <form name="form1" method="post" action="">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                
                  <th>company</th>
                  <th>code</th>
                  <th>Fuel Surcharge %</th>
                  <th>Remote Area Charge</th>
                  <th>logo</th>
                  <th>Offered Packages</th>
                  <th>Discount</th>
                  
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?
    $query = "SELECT COUNT(*) FROM company";
  $result = mysqli_query($con,$query) or die(mysqli_error($con));
  $num_rows = mysqli_fetch_row($result);
  $pages = new Paginator;
  $pages->items_total = $num_rows[0];
  $pages->mid_range = 9; // Number of pages to display. Must be odd and > 3
  $pages->paginate();
  $i=1;
  $sql=mysqli_query($con,"select * from company order by id desc $pages->limit");
  if(mysqli_num_rows($sql)>0) {
  while($row=mysqli_fetch_array($sql))
  {
  ?>
                <tr class="odd gradeX">
                  
                  <td><?php echo $row["name"]; ?></td>
                  <td><?php echo $row["code"]; ?></td>
                  <td><?php echo $row["fuel_surcharge"]; ?></td>
                  <td><?php echo $row["remote_area_charge"]; ?></td>
                  <td><img src="photo/<?php echo $row["photo"]; ?>" width="100px"></td>
                  
                  <td><?php echo $row["offered_packages"]; ?></td><td><?php echo $row["discount"]; ?>%</td>

                  
                 
                  <td> 
<a href="company.php?action=edit&id=<?=$row['id'];?>" class="label   bg_db">Edit</a> 
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
