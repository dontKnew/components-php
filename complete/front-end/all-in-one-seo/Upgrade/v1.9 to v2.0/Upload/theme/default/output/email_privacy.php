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
           <br />
           <p><?php echo $lang['23']; ?>
           </p>
           <form method="POST" action="<?php echo $toolOutputURL;?>" onsubmit="return fixURL();"> 
           <input type="text" name="url" id="url" value="" class="form-control"/>
           <br />
           <?php if ($toolCap) echo $captchaCode; ?>
           <div class="text-center">
           <input class="btn btn-info" type="submit" value="<?php echo $lang['8']; ?>" name="submit"/>
           </div>
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
           <p><?php echo $lang['98']; ?>: <strong><?php echo $my_url; ?></strong> </p>
           <?php if(isset($noEmail)){ ?>
           <p><?php echo $lang['69']; ?>: <strong style="color:green;"><?php echo $noEmail; ?></strong> </p>
           <br />
           <div class="text-center"> 
           <img  src="<?php echo $theme_path; ?>img/okay.png" alt="success" title="Success" />
           </div>
           <?php } else { ?>
           <p><?php echo $lang['69']; ?>: <strong style="color:red;"><?php echo $lang['191']; ?></strong> </p>
           <br />
             <table class="table table-bordered">
                    <thead>
                          <tr>
                            <th>#</th>
                            <th><?php echo $lang['192']; ?></th>
                        </tr>
                    </thead>
                        <tbody>
                        <?php $loopCount = 1; foreach($emailList as $email) { ?>
                        <tr>
                            <td><?php echo $loopCount; ?></td>
                            <td><strong><?php echo $email; ?></strong></td>
                        </tr>
                        <?php $loopCount = $loopCount +1; } ?>
             </tbody></table>
            <?php } ?>
        <div class="text-center">
        <br /> &nbsp; <br />
        <a class="btn btn-info" href="<?php echo $toolURL; ?>"><?php echo $lang['27']; ?></a>
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