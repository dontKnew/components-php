<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name A to Z SEO Tools v2 - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */
?>
<script>
var wordsLimit = '<?php echo $wordLimit; ?>';
var minLimit = '<?php echo $minChar; ?>';
var apiType = '<?php echo $api_type; ?>';
var placeHolderText = '<?php makeJavascriptStr($lang['61'],true); ?>';
var inputEm = '<?php makeJavascriptStr($lang['AS5'],true); ?>';
var articleLm = '<?php makeJavascriptStr($lang['AS23'],true); ?>';
var wordLm = '<?php makeJavascriptStr($lang['AS24'],true); ?>';
var stringStr = '<?php makeJavascriptStr($lang['AS25'],true); ?>';
var uniqueStr = '<?php makeJavascriptStr($lang['AS26'],true); ?>';
var goodStr = '<?php makeJavascriptStr($lang['179'],true); ?>';
var alreadyStr = '<?php makeJavascriptStr($lang['AS27'],true); ?>';
var unqStr = '<?php makeJavascriptStr($lang['AS28'],true); ?>';
</script>
<script src='<?php createLink('core/library/plagiarism.js',false,true); ?>'></script>
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
  
           <p><?php echo $lang['56']; ?>
           </p>
           
        <div id="mainbox">
            <textarea id="mycontent" rows="3" style="height: 270px;" class="form-control"></textarea> <br />
            <input type="hidden" id="authCode" value="<?php echo $secKey.$secVal; ?>" />
            <?php if ($toolCap) echo $captchaCode; ?>
            <div class="text-center"> 
            <a class="btn btn-info" style="cursor:pointer;" id="checkButton"><?php echo $lang['57']; ?></a>
            </div>
            <br />  
            
            <div class="tbox">
            <div class="max-text"><?php echo $lang['59']; ?> <span id="max_words_limit"><?php echo $wordLimit; ?></span> <?php echo $lang['60']; ?>.</div>
            <div class="total-word"><?php echo $lang['58']; ?>: <span id="words-count">0</span></div>
            </div>
        </div>

        <div class="percentimg">
        <img src="<?php themeLink('img/load.gif'); ?>" />
        <br />
        <?php echo $lang['AS10']; ?>
        <br />
        </div>
        
        <div class="percentbox" id="percent">

        </div>
        
        <div>
            <table class="table table-bordered" id="resultList">
                
            </table>
           <div id="tryNew" class="text-center hide">
                <a class="btn btn-info" style="cursor:pointer;" href="<?php echo $toolURL; ?>"><?php echo $lang['9']; ?></a>
           </div>  
        </div>


                      
           <?php } ?>

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