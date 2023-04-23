<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name A to Z SEO Tools v2 - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */
?>
<style>#resultBox {
    display: none;
}
.percentbox {
    text-align: center;
    font-size: 18px;
}
.percentimg {
    text-align: center;
}

</style>
<script>
var dateErr = "<?php makeJavascriptStr($lang['AS2'],true); ?>";
var ccErr = "<?php makeJavascriptStr($lang['AS3'],true); ?>";
var ssLimit = "<?php makeJavascriptStr($lang['AS4'],true); ?>";
var msgDomain = "<?php makeJavascriptStr($lang['28'],true); ?>";
var msgDown = "<?php makeJavascriptStr($lang['AS6'],true); ?>";
var crawlingStr = "<?php makeJavascriptStr($lang['AS29'],true); ?>";
var linksFound = "<?php makeJavascriptStr($lang['142'],true); ?>";
</script>
<script src='<?php createLink('core/library/doSitemap.js',false,true); ?>'></script>

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
                <div class="topBox"></div>
              	<h2 id="title"><?php echo $data['tool_name']; ?></h2>

               <?php if ($pointOut != 'output') { ?>
               <br />
               
               <div id="mainBox">
               <p><?php echo $lang['139']; ?>
               </p>
               <form method="POST" action="<?php echo $toolOutputURL;?>" onsubmit="doSitemap(); return false"> 
               <input type="text" name="url" id="url" value="" class="form-control"/>
               <input type="hidden" id="authCode" value="<?php echo $secKey.$secVal; ?>" />
               <br />
                <div class="row">
				    <div class="col-md-6">
                    <h5><?php echo $lang['132']; ?></h5>
                    
                    <select name="mapDate" id="mapDate" class="form-control">
						<option value="0"><?php echo $lang['135']; ?></option>
	                    <option value="1"><?php echo $lang['137']; ?></option>
	                    <option value="2"><?php echo $lang['138']; ?></option>
					</select>
                    
                     </div>
                     
				    <div class="col-md-6">
                    <h5>dd/mm/yyyy</h5>
                    <input type="text" name="mapdateBox" id="mapdateBox" value="" class="form-control"/>
                    
                    </div>
                </div>
                
                <div class="row"  style="margin-top: 20px; margin-bottom: 30px;">
                    <div class="col-md-6">
                    <h5><?php echo $lang['133']; ?></h5>
                    
                    <select name="mapFre" id="mapFre" class="form-control">
	                   <option value="N/A">None</option>
	                   <option value="Always">Always</option>
	                   <option value="Hourly">Hourly</option>
	                   <option value="Daily">Daily</option>
	                   <option value="Weekly">Weekly</option>
	                   <option value="Monthly">Monthly</option>
	                   <option value="Yearly">Yearly</option>
					</select>
                    
                    </div>
                    
                    <div class="col-md-6">
                    <h5><?php echo $lang['134']; ?></h5>
                    
                    <select name="mapPri" id="mapPri" class="form-control">
	                   <option value="N/A">None</option>
	                   <option value="0.0">0.0</option>
	                   <option value="0.1">0.1</option>
	                   <option value="0.2">0.2</option>
	                   <option value="0.3">0.3</option>
	                   <option value="0.4">0.4</option>
	                   <option value="0.5">0.5</option>
	                   <option value="0.6">0.6</option>
    	               <option value="0.7">0.7</option>
	                   <option value="0.8">0.8</option>
	                   <option value="0.9">0.9</option>
	                   <option value="1.0">1.0</option>
					</select>
                    
                    </div>
                    
                    <div class="col-md-12" style="margin-top: 20px;">
                        <h5><?php echo $lang['140']; ?></h5>
					       <select name="mapPages" id="mapPages" class="form-control">
						      <option value="50">50</option>
						      <option value="100">100</option>
                              <option value="200">200</option>
                              <option value="250">250</option>
                              <option value="500">500</option>
                              <option value="750">750</option>
                              <option value="1000">1000</option>
                              <option value="2500">2500</option>
                              <option value="3000">3000</option>
                              <option value="4500">4500</option>
                              <option value="5000">5000</option>
					       </select>
                    </div>
                </div>
               <?php if ($toolCap) echo $captchaCode; ?>
               <div class="text-center">
               <input class="btn btn-info" type="submit" value="<?php echo $lang['131']; ?>" name="submit"/>
               </div>
               </form>     
               </div>  
               
                <div class="resultBox" id="resultBox">
                    <div class="percentimg">
                    <img src="<?php themeLink('img/load.gif'); ?>" />
                    <br />
                    <?php echo $lang['141']; ?>...
                    <br />
                    <div class="linksCount"><?php echo $lang['142']; ?>: 0</div>
                    </div>
                    <div class="genCount"></div>
                <br />
                <pre id="resultList" style="max-height: 400px;"></pre>
                <div class="text-center">
                <br /> &nbsp; <br />
                <a id="saveXMLFile" class="btn btn-success" title="<?php echo $lang['338']; ?>"><?php echo $lang['337']; ?></a>
                <a class="btn btn-info" href="<?php echo $toolURL; ?>"><?php echo $lang['27']; ?></a>
                <br />
                </div>
                </div> 

            <br />
                        
               <?php 
               }?>
     
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