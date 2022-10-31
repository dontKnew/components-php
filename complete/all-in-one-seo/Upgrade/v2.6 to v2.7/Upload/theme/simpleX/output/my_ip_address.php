<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name A to Z SEO Tools v2 - PHP Script
 * @copyright 2019 ProThemes.Biz
 *
 */
$footerAddArr[] = '<script>var pos = $(\'#title\').offset();$(\'body,html\').animate({ scrollTop: pos.top });</script>';
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

            <div id="map" style="width: 100%; height: 280px; float: right">
                <iframe style="border:none; outline:none; width: 100%; height: 280px" id="gmap_canvas" src="https://maps.google.com/maps?ll=<?=$latitude?>,<?=$longitude?>&z=13&output=embed"></iframe>
            </div>
                
            <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <td><strong><?php echo $lang['15']; ?></strong></td>
                    <td><span class="badge bg-green"><?php echo $ip; ?></span></td>

                </tr>
                <tr>
                    <td><strong><?php echo $lang['16']; ?></strong></td>
                    <td><span class="badge bg-aqua"><?php echo $city; ?></span></td>

                </tr>
                <tr>
                   <td><strong><?php echo $lang['17']; ?></strong></td>
                    <td><span class="badge bg-purple"><?php echo $region; ?></span></td>
                </tr>
                <tr>
                   <td><strong><?php echo $lang['18']; ?></strong></td>
                   <td><span class="badge bg-orange"><?php echo $country; ?></span></td>
                </tr>
                <tr>
                   <td><strong><?php echo $lang['22']; ?></strong></td>
                   <td><span class="badge bg-olive"><?php echo $country_code; ?></span></td>
                </tr>
                <tr>
                   <td><strong><?php echo $lang['19']; ?></strong></td>
                   <td><span class="badge bg-blue"><?php echo $isp; ?></span></td>
                </tr>
               <tr>
                   <td><strong><?php echo $lang['20']; ?></strong></td>
                   <td><span class="badge bg-red"><?php echo $latitude; ?></span></td>
                </tr>
                <tr>
                   <td><strong><?php echo $lang['21']; ?></strong></td>
                   <td><span class="badge bg-maroon"><?php echo $longitude; ?></span></td>
                </tr>
            </tbody>
            </table>   
        <?php  } ?>
        
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