<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name A to Z SEO Tools - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */
?>
<style>
table {
    table-layout: fixed; width: 100%;
}
td {
  word-wrap: break-word;
}
</style>
<script>
function processLoadBar() {
    var myUrl= jQuery.trim($('input[name=url]').val());
    if (myUrl==null || myUrl=="") {}else if(myUrl.indexOf(".") == -1){}else{
        jQuery("#percentimg").css({"display":"block"});
       	jQuery("#mainBox").fadeOut();
    }
}
</script>
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
           <form method="POST" action="<?php echo $toolOutputURL;?>" onsubmit="return fixURL();" id="mainBox"> 
           <input type="text" name="url" id="url" value="" class="form-control"/>
           <br />
            <?php if ($toolCap) echo $captchaCode; ?>
           <div class="text-center">
           <input class="btn btn-info" onclick="processLoadBar();" type="submit" value="<?php echo $lang['8']; ?>" name="submit"/>
           </div>
           </form>     
          
           <div id="percentimg" class="text-center" style="display:none;">
                <img src="<?php themeLink('img/load.gif'); ?>" />
                <br /><br />
                <?php echo $lang['146']; ?>...
                <br /><br />
           </div>  
                   
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

               
        <h4><?php echo $lang['49']; ?><small> <?php echo $lang['52']; ?> </small></h4>
		<table class="table table-hover table-bordered table-striped" style="margin-bottom: 30px;">
			<thead>
				<tr>
					<th><?php echo $lang['98']; ?></th>
					<th style="width: 10%;"><?php echo $lang['322']; ?></th>
                    <th style="width: 15%;"><?php echo $lang['69']; ?></th>
			    </tr>
			</thead>
			<tbody>
				<?php
					foreach($internalLinks as $internalLink) {
				?>
				<tr>
					<td><?php echo $internalLink[0]; ?></td>
					<td style="color: <?php echo $internalLink[2]; ?>;"><?php echo $internalLink[1]; ?></td>
					<td style="color: <?php echo $internalLink[2]; ?>;"><?php echo ($internalLink[1] == 404) ? $lang['323'] : $lang['324']; ?></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>

        
        <h4><?php echo $lang['50']; ?><small> <?php echo $lang['55']; ?> </small></h4>
		<table class="table table-hover table-bordered table-striped" style="margin-bottom: 30px;">
			<thead>
				<tr>
					<th><?php echo $lang['98']; ?></th>
					<th style="width: 10%;"><?php echo $lang['322']; ?></th>
                    <th style="width: 15%;"><?php echo $lang['69']; ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($externalLinks as $externalLink) {
				?>
				<tr>
					<td><?php echo $externalLink[0]; ?></td>
					<td style="color: <?php echo $externalLink[2]; ?>;"><?php echo $externalLink[1]; ?></td>
					<td style="color: <?php echo $externalLink[2]; ?>;"><?php echo ($externalLink[1] == 404) ? $lang['323'] : $lang['324']; ?></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
        <br />


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