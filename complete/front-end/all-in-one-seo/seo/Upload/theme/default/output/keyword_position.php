<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name A to Z SEO Tools v2 - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */
?>
<style>
.percentbox {
    text-align: center;
    font-size: 18px;
}
.percentimg {
    text-align: center;
    display: none;
}
#resultBox{
    display:none;
}
</style>
<script>
var msgDomain = "<?php makeJavascriptStr($lang['28'],true); ?>";
var msgKey = "<?php makeJavascriptStr($lang['170'],true); ?>";
var msgTab1 = "<?php makeJavascriptStr($lang['171'],true); ?>";
var msgTab2 = "Google";
var msgTab3 = "Yahoo";
</script>
<script src='<?php createLink('core/library/keywordPosition.js',false,true); ?>'></script>

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
               <div id="posBox"></div>
               <h2 id="title"><?php echo $data['tool_name']; ?></h2>
               <br />
               <div id="mainbox">
               <?php if ($pointOut != 'output') { ?>
               <p><?php echo $lang['165']; ?> :
               </p>
               <input type="text" id="myurl" value="" class="form-control"/>
               <br />
               <div class="row"> 
              
               <div class="col-md-8">
               <p><?php echo $lang['171']; ?> : </p>
               <textarea class="form-control" rows="8" id="keyData"></textarea>
               <input type="hidden" id="authCode" value="<?php echo $secKey.$secVal; ?>" />
               <br />
               <p><?php echo $lang['172']; ?> :
               <select id="posData"  class="form-control">
						<option value="50">50</option>
						<option value="100">100</option>
                        <option value="200">200</option>
                        <option value="250">250</option>
						<option value="300">300</option>
						<option value="400">400</option>
						<option value="450">450</option>
						<option value="500">500</option>
			   </select></p>
               </div>
               
               <div class="col-md-4">
              	<p>&nbsp; <br/><br/><br/><?php echo $lang['173']; ?>.<br/><br/>
                <?php echo $lang['174']; ?>:<br/>
                keyword1<br/>
                keyword2<br/>
                keyword3 <br/></p>
               </div>
               
               </div>
               
               <br />
               <?php if ($toolCap) echo $captchaCode; ?>
               <div class="text-center">
               <a class="btn btn-info" style="cursor:pointer;" id="checkButton"><?php echo $lang['166']; ?></a>
               </div>     
               </div>           
               <?php 
               } 
               ?>
            <div id="resultBox">
            <div class="percentimg">
            <img src="<?php themeLink('img/load.gif'); ?>" />
            <br />
            <?php echo $lang['146']; ?>...
            <br />
            </div>

            <div id="results"></div>

            <div class="text-center">
            <br /> &nbsp; <br />
            <a class="btn btn-info" href="<?php echo $toolURL; ?>"><?php echo $lang['27']; ?></a>
            <br />
            </div>
            </div>
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