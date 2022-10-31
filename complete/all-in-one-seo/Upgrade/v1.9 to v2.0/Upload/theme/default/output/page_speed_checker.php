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
     
        <table class="table table-bordered table-hover table-striped">
            <tbody>
                    <tr>
                        <td style="width:200px;"><?php echo $lang['98']; ?></td>
                        <td><strong><?php echo $my_url; ?></strong></td>
                    </tr>
                    <tr>
                        <td style="width:200px;"><?php echo $lang['99']; ?></td>
                        <td><strong><?php echo $timeTaken; ?> Sec</strong></td>
                    </tr>
            </tbody>
         </table>
         
         <table class="table table-bordered table-hover table-striped">
            <tbody>
                    <tr>
                        <td style="width:200px;"><?php echo $lang['100']; ?></td>
                        <td><strong><?php echo count($cssLinks); ?></strong></td>
                    </tr>
                    <tr>
                        <td style="width:200px;"><?php echo $lang['101']; ?></td>
                        <td><strong><?php echo count($scriptLinks); ?></strong></td>
                    </tr>
                    <tr>
                        <td style="width:200px;"><?php echo $lang['102']; ?></td>
                        <td><strong><?php echo count($imgLinks); ?></strong></td>
                    </tr>
                    
                    <tr> 
                        <td style="width:200px;"><?php echo $lang['103']; ?></td>
                        <td><strong><?php echo count($otherLinks); ?></strong></td>
                    </tr>
                    
                </tbody>
                
            </table>
        <br />                     
        <h4><?php echo $lang['100']; ?></h4>
		<table class="table table-hover table-bordered table-striped" style="margin-bottom: 30px;">
			<thead>
				<tr>
					<th><?php echo $lang['104']; ?></th>
					<th><?php echo $lang['98']; ?></th>
					<th><?php echo $lang['105']; ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($cssLinks as $cssLink) {
				?>
				<tr>
					<td><?php echo $cssLink[0]; ?></td>
					<td><?php echo $cssLink[1]; ?></td>
					<td><?php echo $cssLink[2]; ?> Sec</td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
    <h4><?php echo $lang['102']; ?></h4>
		<table class="table table-hover table-bordered table-striped" style="margin-bottom: 30px;">
			<thead>
				<tr>
					<th><?php echo $lang['104']; ?></th>
					<th><?php echo $lang['98']; ?></th>
					<th><?php echo $lang['105']; ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($imgLinks as $imgLink) {
				?>
				<tr>
					<td><?php echo $imgLink[0]; ?></td>
					<td><?php echo $imgLink[1]; ?></td>
					<td><?php echo $imgLink[2]; ?> Sec</td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>

<h4><?php echo $lang['101']; ?></h4>
		<table class="table table-hover table-bordered table-striped" style="margin-bottom: 30px;">
			<thead>
				<tr>
					<th><?php echo $lang['104']; ?></th>
					<th><?php echo $lang['98']; ?></th>
					<th><?php echo $lang['105']; ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($scriptLinks as $scriptLink) {
				?>
				<tr>
					<td><?php echo $scriptLink[0]; ?></td>
					<td><?php echo $scriptLink[1]; ?></td>
					<td><?php echo $scriptLink[2]; ?> Sec</td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
        
<h4><?php echo $lang['103']; ?></h4>
		<table class="table table-hover table-bordered table-striped" style="margin-bottom: 30px;">
			<thead>
				<tr>
					<th><?php echo $lang['104']; ?></th>
					<th><?php echo $lang['98']; ?></th>
					<th><?php echo $lang['105']; ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($otherLinks as $otherLink) {
				?>
				<tr>
					<td><?php echo $otherLink[0]; ?></td>
					<td><?php echo $otherLink[1]; ?></td>
					<td><?php echo $otherLink[2]; ?> Sec</td>
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