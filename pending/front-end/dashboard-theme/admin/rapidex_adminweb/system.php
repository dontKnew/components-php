<?php
session_start();
$page="system";
include "config.php";
include('paginator.class.php');



if($_SESSION['admin']==""){
     header("location:index.php");
      }

        if($_POST["Update"]) {
          
          
          
          
 $id=$_POST['id'];  
 $name=$_POST['name'];  
 $domain=$_POST['domain'];  
$title=$_POST['title'];   
$description=$_POST['description'];   
$keywords=$_POST['keywords'];   
$mobile=$_POST['mobile'];   
$email=$_POST['email'];   
$address=$_POST['address'];   
$mobile1=$_POST['mobile1'];   
$mobile2=$_POST['mobile2'];   
$email1=$_POST['email1']; 
$email2=$_POST['email2'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];  
$google_map=$_POST['google_map'];  
$facebook=$_POST['facebook'];  
$twitter=$_POST['twitter'];  
$linkdin=$_POST['linkdin'];  
$youtube=$_POST['youtube'];  
$pinterest=$_POST['pinterest'];  
$instagram=$_POST['instagram'];  

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


$sql="update configuration set  name='".$name."',domain='".$domain."', title='".$title."', description='".$description."', keywords='".$keywords."',mobile='".$mobile."',email='".$email."',address='".$address."',mobile1='".$mobile1."',mobile2='".$mobile2."', email1='".$email1."', email2='".$email2."',  logo ='".$newName."', address1='".$address1."', address2='".$address2."', google_map='".$google_map."', facebook='".$facebook."', twitter='".$twitter."', linkdin='".$linkdin."', youtube='".$youtube."', pinterest='".$pinterest."', instagram='".$instagram."' where id='$id'"; 
$rs=mysqli_query($con,$sql);
if($rs)
{
$msg="configuration Details has been updated successfully";
$msg=urlencode($msg);
header("Location:system.php?action=edit&id=1&sts=$msg");
}
else
{
$msg=mysqli_error($con);
$msg=urlencode($msg);
header("Location:system.php?sts=$msg");
}
          
          
          
          
          
      }
     

?><!DOCTYPE html>
<html lang="en">
 
<head>
<title>System</title>
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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current"  style="text-transform: capitalize;">System </a> </div>
    <h1  style="text-transform: capitalize;">System</h1>
  </div>
  <div class="container-fluid">  <div class="widget-content">
      
             
    <hr>
    <div class="row-fluid">

   



      <? if($_GET['action']=="edit"){ 


  $s1="select * from configuration where id ='$_GET[id]'";
  $rs1=mysqli_query($con,$s1);
  $r1=mysqli_fetch_array($rs1);

        ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>update System </h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
              


            <div class="control-group">
              <label class="control-label">Site Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Site Name" name="name" value="<? echo $r1['name']; ?>">
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Domain :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="domain" name="domain" value="<? echo $r1['domain']; ?>">
              </div>
            </div>
            
            
            <div class="control-group">
              <label class="control-label">Title :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="title" name="title" value="<? echo $r1['title']; ?>">
              </div>
            </div>
            
            
            <div class="control-group">
              <label class="control-label">Description :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="description" name="description" value="<? echo $r1['description']; ?>">
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Keywords :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="keywords" name="keywords" value="<? echo $r1['keywords']; ?>">
              </div>
            </div>
          
            
            
             <div class="control-group">
                                 <label class="control-label">Logo</label>
                                 <img src="photo/<? echo $r1['logo']; ?>" width="100"> 
                                   <input type="file"  name="filstor"  class="form-control">
                                    <input type="hidden" name="oldimg" value="<? echo $r1['logo']; ?>">
                                  
                              </div>
                              
                              
                              
                               <div class="control-group">
              <label class="control-label">Mobile </label>
              <div class="controls">
                <input type="text" class="span11" placeholder="mobile" name="mobile" value="<? echo $r1['mobile']; ?>">
              </div>
            </div>   
                              
                               <div class="control-group">
              <label class="control-label">Mobile 1</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="mobile1" name="mobile1" value="<? echo $r1['mobile1']; ?>">
              </div>
            </div>
            
             <div class="control-group">
              <label class="control-label">Mobile 2</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="mobile2" name="mobile2" value="<? echo $r1['mobile2']; ?>">
              </div>
            </div>
            
             <div class="control-group">
              <label class="control-label">Email </label>
              <div class="controls">
                <input type="text" class="span11" placeholder="email" name="email" value="<? echo $r1['email']; ?>">
              </div>
            </div>
                           
                   
             <div class="control-group">
              <label class="control-label">Email 1</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="email1" name="email1" value="<? echo $r1['email1']; ?>">
              </div>
            </div>
                           
                           
                            <div class="control-group">
              <label class="control-label">Email 2</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="email2" name="email2" value="<? echo $r1['email2']; ?>">
              </div>
            </div>   
                              
                                  <div class="control-group">
              <label class="control-label">Address </label>
              <div class="controls">
                <textarea class="span11" name="address"><? echo $r1['address']; ?></textarea>
              </div>
            </div> 
                          
                                  <div class="control-group">
              <label class="control-label">Address 1</label>
              <div class="controls">
                <textarea class="span11" name="address1"><? echo $r1['address1']; ?></textarea>
              </div>
            </div> 
                              
                              
                      <div class="control-group">
              <label class="control-label">Address 2</label>
              <div class="controls">
                <textarea class="span11" name="address2"><? echo $r1['address2']; ?></textarea>
              </div>
            </div>   
            
            <div class="control-group">
              <label class="control-label">Google Map</label>
              <div class="controls">
                <textarea class="span11" name="google_map"><? echo $r1['google_map']; ?></textarea>
              </div>
            </div>     
            
            
             <div class="control-group">
              <label class="control-label">Facebook</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="facebook" name="facebook" value="<? echo $r1['facebook']; ?>">
              </div>
            </div>
            
             <div class="control-group">
              <label class="control-label">Twitter</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="twitter" name="twitter" value="<? echo $r1['twitter']; ?>">
              </div>
            </div>
            
             <div class="control-group">
              <label class="control-label">Linkdin</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="linkdin" name="linkdin" value="<? echo $r1['linkdin']; ?>">
              </div>
            </div>
            
             <div class="control-group">
              <label class="control-label">Youtube</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="youtube" name="youtube" value="<? echo $r1['youtube']; ?>">
              </div>
            </div>
            
             <div class="control-group">
              <label class="control-label">Pinterest</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="pinterest" name="pinterest" value="<? echo $r1['pinterest']; ?>">
              </div>
            </div>
            
             <div class="control-group">
              <label class="control-label">Instagram</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="instagram" name="instagram" value="<? echo $r1['instagram']; ?>">
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
            <h5 style="text-transform: capitalize;">About System list</h5>
          </div>
          <div class="widget-content nopadding">  <form name="form1" method="post" action="" >
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
    $query = "SELECT COUNT(*) FROM configuration";
  $result = mysqli_query($con,$query) or die(mysqli_error($con));
  $num_rows = mysqli_fetch_row($result);

  $pages = new Paginator;
  $pages->items_total = $num_rows[0];
  $pages->mid_range = 9; // Number of pages to display. Must be odd and > 3
  $pages->paginate();
  $i=1;
  $sql=mysqli_query($con,"select * from configuration order by id desc $pages->limit");
  if(mysqli_num_rows($sql)>0) {
  while($row=mysqli_fetch_array($sql))
  {
  ?>
                <tr class="odd gradeX">
                	 
                  <td><?php echo $row["title"]; ?></td>
                 <td><img src='photo/<? echo $row["logo"]; ?>' width="50"></td>
                 
                  <td> 

<a href="system.php?action=edit&id=<?=$row['id'];?>" class="label   bg_db">Edit</a> 
 
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
