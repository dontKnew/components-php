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
                <br /><br />
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <td><strong><?php echo $lang['175']; ?></strong></td>
                     <td><span class="badge bg-green"><?php   echo $browser; ?></span></td>
    
                </tr>
                <tr>
                    <td><strong><?php echo $lang['176']; ?></strong></td>
                    <td><span class="badge bg-aqua"><?php   echo $version; ?></span></td>
    
                </tr>
                <tr>
                   <td><strong><?php echo $lang['177']; ?></strong></td>
                    <td><span class="badge bg-purple"><?php   echo $platform; ?></span></td>
                </tr>
                <tr>
                   <td><strong><?php echo $lang['178']; ?></strong></td>
                   <td><span class="badge bg-orange"><?php   echo $myUA; ?></span></td>
                </tr>
            </tbody>
                                    
            </table>  
                      
           <?php 
           } 
           ?>

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