<?php

defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @theme: Default Style
 * @copyright © 2017 ProThemes.Biz
 *
 */
?>
   
<style>
label{
    display: block;
}
.form-control[readonly]{
    background-color: #F4F4F4;
}
</style>
    <div class="container main-container">
        <div class="row">
            <div class="col-md-8 main-index">
            <h2 id="title" class="text-center"><?php echo $lang['259']; ?></h2>
<br /><br />

<?php 

if (isset($successMsg))
{
echo '<div class="alert alert-success">
<strong>Alert!</strong> '.$successMsg.' <br /> '.$lang['248'].'
</div>'; 
header("Location: ../");
echo '<meta http-equiv="refresh" content="1;url=../">'; 
}
elseif (isset($error))
{
    echo '<div class="alert alert-error">
<strong>Alert!</strong> '.$error.'
</div>'; 
}
if (isset($old_user))
{
echo '<br/> <div class="alert alert-info">
<strong>Alert!</strong> Login Success.. '.$lang['248'].'
</div>'; 
header("Location: ../");
echo '<meta http-equiv="refresh" content="1;url=../">'; 
}
else
{
if(isset($_GET['successInt'])){
?>
<div class="alert alert-success">
<strong>Alert!</strong> <?php echo $lang['250']; ?>
</div>
<?php } ?>

<br />
  <form method="POST" action="/?route=oauth&newuser" class="loginme-form">
			<div class="modal-body">
            				
                <div class="form-group">
					<label><?php echo $lang['251']; ?><br />
						<input readonly="" style="cursor:not-allowed;" type="text" name="autoname" class="form-control readonly" value="<?php echo $username; ?>"/>
					</label>
				</div>	
                
				<div class="form-group">
					<label><?php echo $lang['252']; ?> <br />
						<input type="text" name="new_username" class="form-control" />
					</label>
				</div>	
			</div>
			 <input type="hidden" name="user_change" value="<?php echo md5($date.$ip); ?>" />

 			<div class="modal-footer">
				<br />
                <button type="submit" class="btn btn-success"><?php echo $lang['8']; ?></button>	
   	            <a href="/" class="btn btn-danger"><?php echo $lang['253']; ?></a>	
			</div>
<?php } ?>                
                
                
                <div class="xd_top_box">
                    <?php echo $ads_720x90; ?>
                </div>

                <br />
            </div>
            <?php 
            // Sidebar 
            require_once(THEME_DIR. "sidebar.php"); 
            ?>
        </div>
    </div>
    <br />