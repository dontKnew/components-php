<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name A to Z SEO Tools v2 - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */
?>
<script> var errMsg = "<?php makeJavascriptStr($lang['AS5'],true); ?>"; </script>
<script src='<?php createLink('core/library/word_counter.js',false,true); ?>'></script>

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
      
                <p><?php echo $lang['70']; ?>:
                </p>
                
                <textarea id="data" rows="3" style="height: 270px;" class="form-control"></textarea> <br /> 
                <div class="text-center">
                <button onclick="countData();" value="submit" name="submit" class="btn btn-info" id="countButton"><?php echo $lang['71']; ?></button>
                </div>
                
                <br /> 
                 
                <div class="result" id="result">

                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title lighter smaller">
                         <i class="fa fa-thumb-tack blue"></i>
                                <?php echo $lang['64']; ?>
                        </h4>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
		                    <div id="resultBox" class="text-center">
                            <div id="countBox" style="font-size: 19px;"> <?php echo $lang['72']; ?>: <span id="wordCount" style="font-weight: bold;">0</span> | <?php echo $lang['73']; ?>: <span id="charCount" style="font-weight: bold;">0</span> </div>
                            </div>
                        </div><!-- /.widget-main -->
                    </div><!-- /.widget-body -->
            </div>
            <br />                       
     
              </div>       
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