<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name A to Z SEO Tools v2
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

                    <table class="table table-bordered">
                            <tbody>
                                    <tr>
                                        <td style="width: 200px;"><?php echo $lang['89']; ?>: </td>
                                        <td><strong><?php echo $myHost; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 200px;"><?php echo $lang['107']; ?>: </td>
                                        <td><strong><?php echo $getHostIP; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 200px;"><?php echo $lang['207']; ?>: </td>
                                        <?php 
                                        if ($overAll == 1)
                                        echo '<td style="color:#c0392b; font-weight:bold;">'.$lang['205'].'</td>';
                                        else
                                        echo '<td style="color:#27ae60; font-weight:bold;">'.$lang['206'].'</td>';
                                        ?>
                                    </tr>
                                </tbody>
                    </table>
                         <br />
                         <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <th>#</th>
                                <th><?php echo $lang['208']; ?></th>
                                <th><?php echo $lang['69']; ?></th>
                            </thead>
                                    <tbody>
                                    <?php $loop=1; foreach($outArr as $outData){ ?>
                                    <tr>
                                        <td><?php echo $loop; ?></td>
                                        <td><strong><?php echo $outData[0]; ?></strong></td>
                                        <?php
                                        if ($outData[1] == 1){
                                            //Listed
                                            echo '<td style="color:#c0392b; font-weight:bold;">'.$lang['205'].'</td>';
                                        }else{
                                            //Not Listed
                                            echo '<td style="color:#27ae60; font-weight:bold;">'.$lang['206'].'</td>';
                                        }
                                        ?>
                                    </tr>
                                    <?php $loop++; } ?>
                                    </tbody>
                         </table>

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