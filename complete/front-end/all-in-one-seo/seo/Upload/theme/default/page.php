<?php

defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @theme: Default Style
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
            <div class="row">
              <div class="col-md-1">
                <div class="date_1">
                  <div class="date_up2">
                    <div class="center2 feb2"><?php echo $post_month; ?> </div>
                  </div>
                  <div class="date_down2">
                    <div class="text_word"><?php echo $post_day; ?> </div>
                  </div>
                </div>
              </div>
              <div class="col-md-11 pad_left26">
              <div class="romantic_free">
                <h4 style="margin-left: 2px; font-size: 24px;"><?php echo ucfirst($page_title); ?></h4>
                  </div>
                <div class="text_size12 mr_top8 clock"> <span class="color_text_in"> 
                <i style="font-size:14px;" class="fa fa-clock-o color-grey"></i><b class="color_grap"> <?php echo $posted_date; ?>    
                </b> </span>  </div>
              </div>
            </div>
            
            <div class="csContent">
                <?php echo $page_content; ?>
            </div>
            
            <div class="top40 xd_top_box text-center">
                <?php echo $ads_720x90; ?>
            </div>

            <br />
        </div>
        <?php
        if($themeOptions['general']['sidebar'] == 'right')
            require_once(THEME_DIR."sidebar.php");
        ?> 
    </div>
</div>
<br />