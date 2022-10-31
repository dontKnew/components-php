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
        <h4><?php echo $lang['331']; ?></h4>
        <table class="table table-bordered table-hover table-striped">
            <tbody>
                    <tr>
                        <td style="width:200px;"><?php echo $lang['30']; ?></td>
                        <td><strong><?php echo $meta_title; ?></strong></td>
                    </tr>
                    <tr>
                        <td style="width:200px;"><?php echo $lang['31']; ?></td>
                        <td><strong><?php echo $meta_description; ?></strong></td>
                    </tr>
                    <tr>
                        <td style="width:200px;"><?php echo $lang['32']; ?></td>
                        <td><strong><?php echo $meta_keywords; ?></strong></td>
                    </tr>
            </tbody>
         </table>

        <br />    
                                         
        <h4><?php echo $lang['332']; ?></h4>
        <?php
        foreach($tags as $tagName => $tagVals) {
        ?>
		<table class="table table-hover table-bordered table-striped" style="margin-bottom: 30px;">
			<thead>
				<tr>
					<th class="text-center"><?php echo ucwords($tagName).' '.$lang['333']; ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($tagVals as $tagVal) {
				?>
				<tr>
					<td class="text-center"><?php echo $tagVal; ?></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
		<?php
		}
		?>
        <br />
        <h4><?php echo $lang['335']; ?></h4>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <td>No.</td>
                    <td><?php echo $lang['53']; ?></td>
                </tr>
             </thead>
                <tbody>
                <?php foreach($internal_links as $count=>$links) { ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <?php if ($links['follow_type'] == "dofollow") { ?>
                    <td><?php echo $links['href']; ?></td>
                    <?php } ?>
                </tr>
                <?php } ?>
        </tbody></table>
        
        <br />
        <h4><?php echo $lang['334']; ?></h4>
        <textarea rows="12" readonly="" class="form-control"><?php echo $textData; ?></textarea>
        
        <br /><br />
        <h4><?php echo $lang['110']; ?></h4>
        <textarea rows="12" readonly="" class="form-control"><?php echo htmlspecialchars($sourceData); ?></textarea>
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