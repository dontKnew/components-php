<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name A to Z SEO Tools v2 - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */
$rawData = '';
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
        <table class="table table-bordered table-striped">
        <thead>
                <tr>
                <td><?php echo $lang['46']; ?></td>
                <td><?php echo $lang['47']; ?></td>
                </tr>
             </thead>
                <tbody>
                <tr>
                    <td><strong><?php echo $lang['48']; ?></strong></td>
                     <td><span class="badge bg-blue"><?php   echo $total_links; ?></span></td>

                </tr>
                <tr>
                    <td><strong><?php echo $lang['49']; ?></strong></td>
                    <td><span class="badge bg-green"><?php   echo $internal_links_count; ?></span></td>

                </tr>
                <tr>
                   <td><strong><?php echo $lang['50']; ?></strong></td>
                    <td><span class="badge bg-purple"><?php   echo $external_links_count; ?></span></td>
                </tr>
                <tr>
                   <td><strong><?php echo $lang['51']; ?></strong></td>
                   <td><span class="badge bg-orange"><?php   echo $total_nofollow_links; ?></span></td>
                </tr>
            </tbody>
                                
    </table>
    <br />
    <h3><?php echo $lang['49']; ?> <small><?php echo $lang['52']; ?></small></h3><br />
          <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <td>No.</td>
                    <td><?php echo $lang['53']; ?></td>
                    <td><?php echo $lang['54']; ?></td>
                </tr>
             </thead>
                <tbody>
                <?php 
                $rawData .= $lang['49']."\n"."\n";
                $rawData .= 'No.,'.$lang['53'].','.$lang['54']."\n";
                foreach($internal_links as $count=>$links) {
                $rawData .= $count .','.$links['href'].','.$links['follow_type']."\n";
                ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $links['href']; ?></td>
                    <td><?php echo $links['follow_type']; ?></td>
                </tr>
                <?php } ?>
            </tbody></table>
                                
            <br />
    <h3><?php echo $lang['50']; ?> <small><?php echo $lang['55']; ?></small></h3><br />
      <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <td>No.</td>
                <td><?php echo $lang['53']; ?></td>
                <td><?php echo $lang['54']; ?></td>
            </tr>
         </thead>
            <tbody>
            <?php 
            $rawData .= "\n"."\n".$lang['50']."\n";
            $rawData .= 'No.,'.$lang['53'].','.$lang['54']."\n";
            foreach($external_links as $count=>$links) { 
            $rawData .= $count .','.$links['href'].','.$links['follow_type']."\n";    
            ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $links['href']; ?></td>
                <td><?php echo $links['follow_type']; ?></td>
            </tr>
            <?php } ?>
        </tbody></table>
        <textarea class="hide" id="rawData"><?php echo $rawData; ?></textarea>
        <div class="text-center">
        <br /> &nbsp; <br />
        <button onclick="saveAsFile()" class="btn btn-danger"><i class="fa fa fa-cloud-download"></i> Export as CSV</button>
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
<script>

function saveAsFile() { 
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    
    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd;
    } 
    if(mm<10){
        mm='0'+mm;
    } 
    var today = dd+'-'+mm+'-'+yyyy;
    var textToWrite = document.getElementById("rawData").value;
    textToWrite = textToWrite.replace(/\n/g, '\r\n');
    var textFileAsBlob = new Blob([textToWrite], {type:'text/csv'});
    var downloadLink = document.createElement("a");
    downloadLink.download = 'links.csv';
    downloadLink.innerHTML = "My Link";
    window.URL = window.URL || window.webkitURL;
    downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
    downloadLink.onclick = destroyClickedElement;
    downloadLink.style.display = "none";
    document.body.appendChild(downloadLink);
    downloadLink.click();
}

function destroyClickedElement(event){
    document.body.removeChild(event.target);
}

</script>