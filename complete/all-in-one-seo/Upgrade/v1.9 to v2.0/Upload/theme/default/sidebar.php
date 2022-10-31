<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));
/*
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @Theme: Default Style
 * @copyright © 2017 ProThemes.Biz
 *
 */
?>

<div class="col-md-4" id="rightCol">       	
    <div class="well">  
    
        <?php if(isSelected($themeOptions['general']['sSearch'])){ ?>   
        <div id="sidebarSc" class="col-md-12">
            <div class="form-group">
                <div class="input-group green shadow">
                    <div class="input-group-addon"><i class="fa fa-search"></i></div>
                        <input type="text" class="form-control" placeholder="<?php echo $lang['AS39']; ?>" autocomplete="off" id="sidebarsearch" />
                    </div>
               	</div>
            <div class="search-results" id="sidebar-results"></div>
        </div>
        <?php } ?>
        
        <div class="sideXd">
        <?php echo $ads_250x300; ?>
        </div>
                
        <div class="sideXd">
        <?php echo $ads_250x125; ?>
        </div>
        
    </div>
</div>