<?php
session_start();
$page="question";
include "config.php";
include('paginator.class.php');
$query  = "SELECT * FROM  category";
$res=mysqli_query($con,$query);
$count=mysqli_num_rows($res);
if($_SESSION['admin']==""){
     header("location:index.php");
      }
if(isset($_POST["Submit"]) ){  
  $question_cat_id=$_POST['question_cat_id'];
  $questions= $_POST['questions'];
  $option_1= $_POST['option_1'];
  $option_2= $_POST['option_2'];
  $option_3=$_POST['option_3'];
  $option_4=$_POST['option_4'];
  $correct_ans=$_POST['correct_ans'];
$sql="insert into questions(question_cat_id,questions,option_1,option_2,option_3,option_4,	correct_ans) 
    value('".$question_cat_id."','".$questions."','".$option_1."','".$option_2."','".$option_3."','".$option_4."','".$correct_ans."')";
$rs=mysqli_query($con,$sql);
if($rs)
{
$msg="New question has been added successfully.";
$msg=urlencode($msg);
header("Location:question.php?sts=$msg");
}
else
{
$msg=mysqli_error($con);
$msg=urlencode($msg);
header("Location:question.php?sts=$msg");
}
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=question.php?sts=inserted\">";
}
        
if(isset($_POST["Update"])) {
          
 
    $id= $_POST['id'];
    $question_cat_id=mysqli_real_escape_string($con,$_POST['question_cat_id']);
    $questions=mysqli_real_escape_string($con, $_POST['questions']);
    $option_1=mysqli_real_escape_string($con, $_POST['option_1']);
     $option_2=mysqli_real_escape_string($con, $_POST['option_2']);
    $option_3=mysqli_real_escape_string($con, $_POST['option_3']);
    $option_4=mysqli_real_escape_string($con, $_POST['option_4']);
    $correct_ans=mysqli_real_escape_string($con, $_POST['correct_ans']);
    
$sql="update questions set question_cat_id='".$question_cat_id."',questions='".$questions."',option_1='".$option_1."',option_2='".$option_2."',option_3='".$option_3."',option_4='".$option_4."',correct_ans='".$correct_ans."' where id='$id'"; 
$rs=mysqli_query($con,$sql);
if($rs)
{
$msg="question Details has been updated successfully";
$msg=urlencode($msg);
header("Location:question.php?sts=$msg");
}
else
{
$msg=mysqli_error($con);
$msg=urlencode($msg);
header("Location:question.php?sts=$msg");
}
          
          
          
          
          
      }
  if($_REQUEST['remove']=="yes"){
mysqli_query($con,"delete from questions where id='$_REQUEST[id]'");
header("location:question.php?msg=Deleted");
}   
      
?><!DOCTYPE html>
<html lang="en">
 
<head>
<title>question</title>
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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current"  style="text-transform: capitalize;">question</a> </div>
    <h1  style="text-transform: capitalize;">question</h1>
  </div>
  <div class="container-fluid">  <div class="widget-content"> <a href="question.php?action=Add" class="btn btn-success" style="float: right;">Add question</a> 
             
    <hr>
    <div class="row-fluid">
      <? if($_GET['action']=="Add"){ ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>question-info</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
           
          
           <div class="control-group">
              <label class="control-label">Select Category</label>
              <div class="controls"> <select   name="question_cat_id"  class="span11">
                    
                    <option>Select Category</option>
                    	<?php
					$sql2= "SELECT * from question_category ";
					$result2= mysqli_query($con,$sql2);
					while($fetch2= mysqli_fetch_assoc($result2)){
						?>
                  <option value="<?php echo $fetch2['id']?>"><?php echo $fetch2['name']?></option>
                  <?php
					}	
					?>
                  
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Question :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Question" name="questions">
              </div>
            </div>
               <div class="control-group">
              <label class="control-label">Option 1 :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Option 1" name="option_1">
              </div>
            </div>
               <div class="control-group">
              <label class="control-label">Option 2 :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Option 2" name="option_2">
              </div>
            </div>
               <div class="control-group">
              <label class="control-label">Option 3 :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Option 3" name="option_3">
              </div>
            </div>
               <div class="control-group">
              <label class="control-label">Option 4 :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Option 4" name="option_4">
              </div>
            </div>
 <div class="control-group">
              <label class="control-label">Select Correct Answer</label>
              <div class="controls">
                <div class="select2-container" id="s2id_autogen1">
                    <div class="select2-drop select2-offscreen">   <div class="select2-search">       <input type="text" autocomplete="off" class="select2-input" tabindex="0">   </div>   <ul class="select2-results">   </ul></div></div><select style="display: none;" name="correct_ans">
                    
                    <option>Select Correct Answer</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                  <option value="4">Option 4</option>
                  
                  
                </select>
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
  $s1="select * from questions where id ='$_GET[id]'";
  $rs1=mysqli_query($con,$s1);
  $r1=mysqli_fetch_array($rs1);
        ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>update question</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
         
      
         
          
           <div class="control-group">
              <label class="control-label">Select Category</label>
              <div class="controls">
                
                    <select  class="span11"  name="question_cat_id">
                        
                    	<?php
					$sql2= "SELECT * from question_category ";
					$result2= mysqli_query($con,$sql2);
					while($fetch2= mysqli_fetch_assoc($result2)){
						?>
                 <option value="<?php echo $fetch2['id']?>"<?php if($fetch2['id']== $r1['question_cat_id']){echo "selected";}?>> <?php echo $fetch2['name']?></option>
                  <?php
					}	
					?>
                  
                </select>
              </div>
            </div>
         
    
         
            <div class="control-group">
              <label class="control-label">Question :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Question" name="questions" value="<? echo $r1['questions']; ?>">
              </div>
            </div>
               <div class="control-group">
              <label class="control-label">Option 1 :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Option 1" name="option_1" value="<? echo $r1['option_1']; ?>">
              </div>
            </div>
               <div class="control-group">
              <label class="control-label">Option 2 :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Option 2" name="option_2" value="<? echo $r1['option_2']; ?>">
              </div>
            </div>
               <div class="control-group">
              <label class="control-label">Option 3 :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Option 3" name="option_3" value="<? echo $r1['option_3']; ?>">
              </div>
            </div>
               <div class="control-group">
              <label class="control-label">Option 4 :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Option 4" name="option_4" value="<? echo $r1['option_4']; ?>">
              </div>
            </div>
           
            
            
           <div class="control-group">
              <label class="control-label">Select Correct Answer</label>
              <div class="controls">
                <div class="select2-container" id="s2id_autogen1">
                    <div class="select2-drop select2-offscreen">   <div class="select2-search">       <input type="text" autocomplete="off" class="select2-input" tabindex="0">   </div>   <ul class="select2-results">   </ul></div></div>
                    
                    <select style="display: none;" name="correct_ans">
                        
                    
                 <option value="1"<?php if(1== $r1['correct_ans']){echo "selected";}?>>Option 1</option>
                 
                 
                 <option value="2"<?php if(2== $r1['correct_ans']){echo "selected";}?>>Option 2</option>
                 
                 
                 <option value="3"<?php if(3== $r1['correct_ans']){echo "selected";}?>>Option 3</option>
                 
                 
                 <option value="4"<?php if(4== $r1['correct_ans']){echo "selected";}?>>Option 4</option>
                 
                 
                  
                  
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
            <h5 style="text-transform: capitalize;">Package list</h5>
          </div>
          <div class="widget-content nopadding">  <form name="form1" method="post" action="">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                
                  <th>Question</th>
                  
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?
    $query = "SELECT COUNT(*) FROM questions";
  $result = mysqli_query($con,$query) or die(mysqli_error($con));
  $num_rows = mysqli_fetch_row($result);
  $pages = new Paginator;
  $pages->items_total = $num_rows[0];
  $pages->mid_range = 9; // Number of pages to display. Must be odd and > 3
  $pages->paginate();
  $i=1;
  $sql=mysqli_query($con,"select * from questions order by id desc $pages->limit");
  if(mysqli_num_rows($sql)>0) {
  while($row=mysqli_fetch_array($sql))
  {
  ?>
                <tr class="odd gradeX">
                  
                  <td><?php echo $row["questions"]; ?></td>
                  
                 
                  <td> 
<a href="question.php?action=edit&id=<?=$row['id'];?>" class="label   bg_db">Edit</a> 
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
