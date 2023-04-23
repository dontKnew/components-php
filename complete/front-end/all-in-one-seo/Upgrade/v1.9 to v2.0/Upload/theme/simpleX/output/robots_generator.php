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
var msg1 = "<?php makeJavascriptStr($lang['163'],true); ?>";
var msg2 = "# <?php makeJavascriptStr($lang['164'],true); ?>\n";
</script>
<script src='<?php createLink('core/library/robots.js',false,true); ?>'></script>
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
<form>
  <div>
	<table id="roboTable" class="nostyle">
      <tbody><tr>
      <td><b><?php echo $lang['150']; ?>:</b></td>
      <td>
		<select size="1" name="allow" id="allow" class="form-control" >
<option value=" " selected=""><?php echo $lang['151']; ?></option>
<option value=" /"><?php echo $lang['152']; ?></option> </select></td>
       <td>&nbsp;</td>
      </tr>
      
      <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr>
      
      <tr>
      <td><b><?php echo $lang['153']; ?>:</b></td>
      <td colspan="2">
		<select size="1" name="delay" id="delay" class="form-control">
			<option value="" selected=""><?php echo $lang['154']; ?></option>
			<option value="5">5 Seconds</option>
			<option value="10">10 Seconds</option>
			<option value="20">20 Seconds</option>
			<option value="60">60 seconds</option>
			<option value="120">120 Seconds</option> </select></td>
    	</tr>
        
      <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr>
      
      <tr>
      <td><strong><?php echo $lang['155']; ?>: <small><?php echo $lang['156']; ?>&nbsp;</small></strong></td>
      <td colspan="2">
		<input type="text" value="" placeholder="http://www.example.com/sitemap.xml" name="sitemap" class="form-control" /></td>
    	</tr>
      <tr>
      <td>&nbsp;</td>
      <td>
        &nbsp;</td>
      <td>
		&nbsp;</td>
      </tr><tr>
      <td><b><?php echo $lang['157']; ?>:</b></td>
      <td>
Google</td>
      <td>
		<select size="1" name="google" id="google" class="form-control">
<option value="" selected=""><?php echo $lang['158']; ?></option>
<option value=" "><?php echo $lang['151']; ?></option>
<option value=" /"><?php echo $lang['152']; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		Google Image</td>
      <td>
		<select size="1" name="gimage" id="gimage" class="form-control">
<option value="" selected=""><?php echo $lang['158']; ?></option>
<option value=" "><?php echo $lang['151']; ?></option>
<option value=" /"><?php echo $lang['152']; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		Google Mobile</td>
      <td>
		<select size="1" name="gmobile" id="gmobile" class="form-control">
<option value="" selected=""><?php echo $lang['158']; ?></option>
<option value=" "><?php echo $lang['151']; ?></option>
<option value=" /"><?php echo $lang['152']; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		MSN Search</td>
      <td>
		<select size="1" name="msn" id="msn" class="form-control">
<option value="" selected=""><?php echo $lang['158']; ?></option>
<option value=" "><?php echo $lang['151']; ?></option>
<option value=" /"><?php echo $lang['152']; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		Yahoo</td>
      <td>
		<select size="1" name="yahoo" id="yahoo" class="form-control">
<option value="" selected=""><?php echo $lang['158']; ?></option>
<option value=" "><?php echo $lang['151']; ?></option>
<option value=" /"><?php echo $lang['152']; ?></option>
</select></td>
    </tr>
            <tr>
      <td>&nbsp;</td>
      <td>
		Yahoo MM</td>
      <td>
		<select size="1" name="ymm" id="ymm" class="form-control">
<option value="" selected=""><?php echo $lang['158']; ?></option>
<option value=" "><?php echo $lang['151']; ?></option>
<option value=" /"><?php echo $lang['152']; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		Yahoo Blogs</td>
      <td>
		<select size="1" name="blogs" id="blogs" class="form-control">
<option value="" selected=""><?php echo $lang['158']; ?></option>
<option value=" "><?php echo $lang['151']; ?></option>
<option value=" /"><?php echo $lang['152']; ?></option>
</select></td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td>
		Ask/Teoma</td>
      <td>
		<select size="1" name="teoma" id="teoma" class="form-control">
<option value="" selected=""><?php echo $lang['158']; ?></option>
<option value=" "><?php echo $lang['151']; ?></option>
<option value=" /"><?php echo $lang['152']; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		GigaBlast</td>
      <td>
		<select size="1" name="gigablast" id="gigablast" class="form-control">
<option value="" selected=""><?php echo $lang['158']; ?></option>
<option value=" "><?php echo $lang['151']; ?></option>
<option value=" /"><?php echo $lang['152']; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		DMOZ Checker</td>
      <td>
		<select size="1" name="dmoz" id="dmoz" class="form-control">
<option value="" selected=""><?php echo $lang['158']; ?></option>
<option value=" "><?php echo $lang['151']; ?></option>
<option value=" /"><?php echo $lang['152']; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		Nutch</td>
      <td>
		<select size="1" name="nutch" id="nutch" class="form-control">
<option value="" selected=""><?php echo $lang['158']; ?></option>
<option value=" "><?php echo $lang['151']; ?></option>
<option value=" /"><?php echo $lang['152']; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		Alexa/Wayback</td>
      <td>
		<select size="1" name="alexa" id="alexa" class="form-control">
<option value="" selected=""><?php echo $lang['158']; ?></option>
<option value=" "><?php echo $lang['151']; ?></option>
<option value=" /"><?php echo $lang['152']; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		Baidu</td>
      <td>
		<select size="1" name="baidu" id="baidu" class="form-control">
<option value="" selected=""><?php echo $lang['158']; ?></option>
<option value=" "><?php echo $lang['151']; ?></option>
<option value=" /"><?php echo $lang['152']; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		Naver</td>
      <td>
		<select size="1" name="naver" id="naver" class="form-control">
<option value="" selected=""><?php echo $lang['158']; ?></option>
<option value=" "><?php echo $lang['151']; ?></option>
<option value=" /"><?php echo $lang['152']; ?></option>
</select></td>
    </tr>


    
    <tr>
      <td>&nbsp;</td>
      <td>
		MSN PicSearch</td>
      <td>
		<select size="1" name="psbot" id="psbot" class="form-control">
<option value="" selected=""><?php echo $lang['158']; ?></option>
<option value=" "><?php echo $lang['151']; ?></option>
<option value=" /"><?php echo $lang['152']; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">
		&nbsp;</td>
    </tr>
    <tr>
      <td><b><?php echo $lang['159']; ?>:</b></td>
      <td colspan="2">
		<i><?php echo $lang['160']; ?> "/"</i></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">
		<input type="text" value="/cgi-bin/" size="70" name="dir1" class="form-control" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">
		<input type="text" size="70" name="dir2" class="form-control" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">
		<input type="text" size="70" name="dir3" class="form-control" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">
		<input type="text" size="70" name="dir4" class="form-control" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">
		<input type="text" size="70" name="dir5" class="form-control" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">
		<input type="text" size="70" name="dir6" class="form-control" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">
		&nbsp;</td>
    </tr>
    	</tbody></table>
  </div>
    <p>
	<input type="button" class="btn btn-success" onclick="genRobots(this.form,msg1,msg2)" value="<?php echo $lang['161']; ?>" /> 
	<input type="button" class="btn btn-danger" onclick="genRobots(this.form,msg1,msg2,true)" value="Create and Save as Robots.txt" /> 
    <input type="reset" class="btn btn-primary" value="Clear" /> 
    <br /><br />
    <textarea class="form-control" readonly="" style="height: 270px;" rows="3" id="robolist" name="robolist"></textarea>
    </p>
	<p><?php echo $lang['162']; ?></p>

           </form>     
                      
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