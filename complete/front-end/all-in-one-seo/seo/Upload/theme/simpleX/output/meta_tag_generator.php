<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name A to Z SEO Tools v2 - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */
?>
<div class="container main-container">
<div class="row">
  	  	<?php
        if($themeOptions['general']['sidebar'] == 'left')
            require_once(THEME_DIR."sidebar.php");
        ?>
      	<div class="col-md-8 main-index">
        
        <div class="xd_top_box">
         <?php echo $ads_720x90; ?>
        </div>
        
          	<h2 id="title"><?php echo $data['tool_name']; ?></h2>

            <?php if ($pointOut != 'output') { ?>
  

           <form method="POST" action="<?php echo $toolOutputURL;?>" onsubmit="return metaData();"> 
		  
            <div class="row">
                
                <div class="col-md-12" style="margin-bottom: 20px;">
                    <h5><?php echo $lang['114']; ?> <small id="limitBarT"></small></h5>
                    <input type="text" id="metatitle" name="title" class="form-control" placeholder="<?php echo $lang['122']; ?>" />
                </div>
        
			<div class="col-md-6">
				<h5><?php echo $lang['115']; ?> <small id="limitBar"></small></h5>
				
				<textarea id="description" name="description" class="form-control" rows="3" placeholder="<?php echo $lang['123']; ?>"></textarea>
                
			</div>
			<div class="col-md-6">
				<h5><?php echo $lang['116']; ?></h5>
				
				<textarea id="keywords" name="keywords" class="form-control" rows="3" placeholder="<?php echo $lang['124']; ?>"></textarea>
			
            </div>
		 </div>
		<div class="row" style="margin-top: 20px;">
			<div class="col-md-6">
				<h5><?php echo $lang['117']; ?></h5>
				
				<select name="robotsIndex" class="form-control">
					<option value="index"><?php echo $lang['118']; ?></option>
					<option value="noindex"><?php echo $lang['119']; ?></option>
				</select>
			</div>
			<div class="col-md-6">
				<h5><?php echo $lang['121']; ?></h5>
				
				<select name="robotsLinks" class="form-control">
					<option value="follow"><?php echo $lang['118']; ?></option>
					<option value="nofollow"><?php echo $lang['119']; ?></option>
				</select>
			</div>
		</div>
		
        <div class="row"  style="margin-top: 20px; margin-bottom: 30px;">
			<div class="col-md-6">
				<h5><?php echo $lang['120']; ?></h5>
				
				<select name="contentType" class="form-control">
					<option value="text/html; charset=utf-8">UTF-8</option>
					<option value="text/html; charset=utf-16">UTF-16</option>
					<option value="text/html; charset=iso-8859-1">ISO-8859-1</option>
                    <option value="text/html; charset=windows-1252">WINDOWS-1252</option>
				</select>
			</div>
			<div class="col-md-6">
				<h5><?php echo $lang['125']; ?></h5>
				
				<select name="language" class="form-control">
					<option value="English">English</option>
					<option value="French">French</option>
                    <option value="Spanish">Spanish</option>
                    <option value="Russian">Russian</option>
					<option value="Arabic">Arabic</option>
					<option value="Japanese">Japanese</option>
					<option value="Korean">Korean</option>
					<option value="Hindi">Hindi</option>
					<option value="Portuguese">Portuguese</option>
					<option value="N/A">No Language Tag</option>
				</select>
			</div>
		</div>
        
        <hr />
        <div class="text-center" style="margin-bottom: 30px;" ><b><?php echo $lang['126']; ?></b></div>
        <p>
        <input type="checkbox" value="yes" name="revisit" style="margin-top: 5px;" /> <?php echo $lang['127']; ?> &nbsp;
        <input type="text" class="form-control" style="width:10%; display: inline;" name="revisitdays" />  &nbsp; <?php echo $lang['128']; ?>.
        </p>
        <br />
        <p><input type="checkbox" value="yes" name="author" /> <?php echo $lang['129']; ?>: 
        <input type="text" class="form-control" name="authorname" style="width:50%; display: inline;"  />
        </p>
         
         
           <br />
           <?php if ($toolCap) echo $captchaCode; ?>
           <input class="btn btn-info" type="submit" value="<?php echo $lang['113']; ?>" name="submit"/>
           </form>     
                      
           <?php 
           } else { 
           //Output Block
           if(isset($error)) {
            
            echo '<br/><br/><div class="alert alert-error">
            <strong>Alert!</strong> '.$error.'
            </div><br/><br/>
            <div class="text-center"><a class="btn btn-info" href="'.$toolURL.'">'.$lang['12'].'</a>
            </div><br/>';
            
           } else {
           ?>
        <br />
        <div class="text-center">
        <?php echo $lang['130']; ?>
        </div>
        <pre><?php echo $outData; ?></pre>
        <br /> 
        <div class="text-center">
        <br /> &nbsp; <br />
        <a class="btn btn-info" href="<?php echo $toolURL; ?>"><?php echo $lang['9']; ?></a>
        <br />
        </div>
        
        <?php } } ?>
        
        <br />
        
        <div class="xd_top_box">
        <?php echo $ads_720x90; ?>
        </div>
        
        <h2 id="sec1" class="about_tool"><?php echo $lang['11'].' '.$data['tool_name']; ?></h2>
        <p>
        <?php echo $data['about_tool']; ?>
        </p> <br />
        </div>              
        
        <?php
        if($themeOptions['general']['sidebar'] == 'right')
            require_once(THEME_DIR."sidebar.php");
        ?>       		
    </div>
</div> <br />