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
  
           <p><?php echo $lang['189']; ?>
           </p>
           <form method="POST" action="<?php echo $toolOutputURL;?>" onsubmit="return fixData();"> 
           <textarea name="data" id="data" rows="3" style="height: 270px;" class="form-control"></textarea>
           <br />
           <?php if ($toolCap) echo $captchaCode; ?>
           <input class="btn btn-info" type="submit" value="<?php echo $lang['8']; ?>" name="submit"/>
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
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title lighter smaller">
                     <i class="fa fa-thumb-tack blue"></i>
                        &nbsp;&nbsp; <?php echo $lang['64']; ?>
                    </h4>
                </div>

                <div class="widget-body">
                    <div class="widget-main">

                    <br />
                   
                    <table class="table table-hover table-bordered">
                            <tbody><tr>
                                <th>#</th>
                                <th><?php echo $lang['187']; ?></th>
                                <th><?php echo $lang['108']; ?></th>
                                <th><?php echo $lang['188']; ?></th>
                            </tr>
                            <?php for($i=0; $i<$dataCount;$i++){ ?>
                            <tr>
                                <td><?php echo $i+1; ?></td>
                                <td><?php echo $myHost[$i]; ?></td>
                                <td><?php echo $ipList[$i]; ?></td>
                                <td><span class="badge bg-blue"><?php echo $classCList[$i]; ?></span></td>
                            </tr>
                            <?php } ?>
                        </tbody></table>
                            
                          </div><!-- /.widget-main -->
                </div><!-- /.widget-body -->
        </div>

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