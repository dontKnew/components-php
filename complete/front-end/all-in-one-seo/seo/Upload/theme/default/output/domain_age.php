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
           <input class="btn btn-info" type="submit" value="<?php echo $lang['87']; ?>" name="submit"/>
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


            <br />
        <table class="table table-bordered table-hover">
           <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo $lang['88']; ?></th>
                </tr>
           </thead>
            <tbody>
                    <tr>
                        <td><?php echo $lang['89']; ?></td>
                        <td><strong style="color: #c0392b;"><?php echo $myHost; ?></strong></td>
                    </tr>
                    <tr>
                        <td><?php echo $lang['262']; ?></td>
                        <td><strong><?php echo $domainAge; ?></strong></td>
                    </tr>

                    <tr>
                        <td><?php echo $lang['90']; ?></td>
                        <td><strong><?php echo $createdDate; ?></strong></td>
                    </tr>
                    <tr>
                        <td><?php echo $lang['91']; ?></td>
                        <td><strong><?php echo $updatedDate; ?></strong></td>
                    </tr>
                    <tr>
                        <td><?php echo $lang['92']; ?></td>
                        <td><strong><?php echo $expiredDate; ?></strong></td>
                    </tr>
                    
                </tbody>
                
            </table>
                            

        <div class="text-center">
        <br /> &nbsp; <br />
        <a class="btn btn-info" href="<?php echo $toolURL; ?>"><?php echo $lang['93']; ?></a>
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