<?php
session_start();
$page="subcategory";
include "config.php";
include('paginator.class.php');

$query  = "SELECT * FROM  category";
$res=mysqli_query($con,$query);
$count=mysqli_num_rows($res);

if($_SESSION['admin']==""){
     header("location:index.php");
      }


if(isset($_POST["Submit"]) ){  
    
    
    $CatId=$_POST['cateid'];
	$Title=$_POST['title'];
	$Price=$_POST['price'];
	$Details=$_POST['details'];

   $img=$_FILES['filstor']['name'];

   $tmpName=$_FILES['filstor']['tmp_name']; 
  $img=$_FILES['filstor']['name'];

     $tmpName=$_FILES['filstor']['tmp_name']; 

     if($img<>"")

         {

          $ext = strrchr($img, ".");

          $prefix=str_replace(" ","-",$name);

          $newName = $prefix ."-". substr(md5(rand() * time()), 0, 5) . $ext;

            move_uploaded_file($tmpName,"photo/".$newName);

         } 
  

    

$sql="insert into subcategory(catid,title,price,subcategory_image,details) 
    value('".$CatId."','".$Title."','".$Price."','".$newName."','".$Details."')";
$rs=mysqli_query($con,$sql);
if($rs)
{
$msg="New subcategory has been added successfully.";
$msg=urlencode($msg);
header("Location:subcategory.php?sts=$msg");
}
else
{
$msg=mysql_error();
$msg=urlencode($msg);
header("Location:subcategory.php?sts=$msg");
}
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=subcategory.php?sts=inserted\">";
}
        



if(isset($_POST["Update"])) {
          
 

    $id= $_POST['id'];
 

    $Name=$_POST['cateid'];
	$Title=$_POST['title'];
	$Price=$_POST['price'];
	$Details=$_POST['details'];
    

 
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

$sql="update subcategory set catid='".$Name."',title='".$Title."',price='".$Price."', subcategory_image='".$newName."',details='".$Details."' where id='$id'"; 
$rs=mysqli_query($con,$sql);
if($rs)
{
$msg="subcategory Details has been updated successfully";
$msg=urlencode($msg);
header("Location:subcategory.php?sts=$msg");
}
else
{
$msg=mysql_error();
$msg=urlencode($msg);
header("Location:subcategory.php?sts=$msg");
}
          
          
          
          
          
      }
  if($_REQUEST['remove']=="yes"){
mysqli_query($con,"delete from subcategory where id='$_REQUEST[id]'");

header("location:subcategory.php?msg=Deleted");
}   
      


?><!DOCTYPE html>
<html lang="en">
 
<head>
<title>Subcategory</title>
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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current"  style="text-transform: capitalize;">subcategory</a> </div>
    <h1  style="text-transform: capitalize;">subcategory</h1>
  </div>
  <div class="container-fluid">  <div class="widget-content"> <a href="subcategory.php?action=Add" class="btn btn-success" style="float: right;">Add subcategory</a> 
             
    <hr>
    <div class="row-fluid">

      <? if($_GET['action']=="Add"){ ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Personal-info</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
           
           
           <div class="control-group">
              <label class="control-label">Select Category</label>
              <div class="controls">
                <div class="select2-container" id="s2id_autogen1">
                    <div class="select2-drop select2-offscreen">   <div class="select2-search">       <input type="text" autocomplete="off" class="select2-input" tabindex="0">   </div>   <ul class="select2-results">   </ul></div></div><select style="display: none;" name="cateid">
                    
                    <option>Select Category</option>
                    	<?php
					$sql2= "SELECT * from category ";
					$result2= mysqli_query($con,$sql2);
					while($fetch2= mysqli_fetch_assoc($result2)){
						?>
                  <option value="<?php echo $fetch2['id']?>"><?php echo $fetch2['title']?></option>
                  <?php
					}	
					?>
                  
                </select>
              </div>
            </div>
           
           
             <div class="control-group">
              <label class="control-label">Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Name" name="title">
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Price :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Price" name="price">
              </div>
            </div>
            
             
            <div class="control-group">
              <label class="control-label">File upload input</label>
              <div class="controls">
                <div class="uploader" id="uniform-undefined"><input type="file" size="19" style="opacity: 0;" name="filstor"><span class="filename">No file selected</span><span class="action">Choose File</span></div>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Details</label>
              <div class="controls">
                <textarea class="span11" placeholder="Details" name="details"></textarea>
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


  $s1="select * from subcategory where id ='$_GET[id]'";
  $rs1=mysqli_query($con,$s1);
  $r1=mysqli_fetch_array($rs1);

        ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>update subcategory</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
         
         
         <div class="control-group">
              <label class="control-label">Select Category</label>
              <div class="controls">
                <div class="select2-container" id="s2id_autogen1">
                    <div class="select2-drop select2-offscreen">   <div class="select2-search">       <input type="text" autocomplete="off" class="select2-input" tabindex="0">   </div>   <ul class="select2-results">   </ul></div></div>
                    
                    <select style="display: none;" name="cateid">
                        
                    	<?php
					$sql2= "SELECT * from category ";
					$result2= mysqli_query($con,$sql2);
					while($fetch2= mysqli_fetch_assoc($result2)){
						?>
                 <option value="<?php echo $fetch2['id']?>"<?php if($fetch2['id']== $r1['catid']){echo "selected";}?>> <?php echo $fetch2['title']?></option>
                  <?php
					}	
					?>
                  
                </select>
              </div>
            </div>

         
          
            <div class="control-group">
              <label class="control-label">Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Name" name="title" value="<? echo $r1['title']; ?>">
              </div>
            </div>
          
          <div class="control-group">
              <label class="control-label">Price :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Price" name="price" value="<? echo $r1['price']; ?>">
              </div>
            </div>
          
           
         
          
                  <div class="control-group">
                                 <label class="control-label">Photos</label>
                                 <img src="photo/<? echo $r1['subcategory_image']; ?>" width="100"> 
                                   <input type="file"  name="filstor"  class="form-control">
                                    <input type="hidden" name="oldimg" value="<? echo $r1['subcategory_image']; ?>">
                                  
                              </div>
                              
                              
                              
                               <div class="control-group">
              <label class="control-label">Details</label>
              <div class="controls">
                <textarea class="span11" name="details"><? echo $r1['details']; ?></textarea>
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
            <h5 style="text-transform: capitalize;">subcategory list</h5>
          </div>
          <div class="widget-content nopadding">  <form name="form1" method="post" action="">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                
                  <th>Name</th>
                  <th>Photo</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?
    $query = "SELECT COUNT(*) FROM subcategory";
  $result = mysqli_query($con,$query) or die(mysqli_error($con));
  $num_rows = mysqli_fetch_row($result);

  $pages = new Paginator;
  $pages->items_total = $num_rows[0];
  $pages->mid_range = 9; // Number of pages to display. Must be odd and > 3
  $pages->paginate();
  $i=1;
  $sql=mysqli_query($con,"select * from subcategory order by id desc $pages->limit");
  if(mysqli_num_rows($sql)>0) {
  while($row=mysqli_fetch_array($sql))
  {
  ?>
                <tr class="odd gradeX">
                	
                  <td><?php echo $row["title"]; ?></td>
                  <td><img src='photo/<? echo $row["subcategory_image"]; ?>' width="50"></td>
                 
                  <td> 

<a href="subcategory.php?action=edit&id=<?=$row['id'];?>" class="label   bg_db">Edit</a> 
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
