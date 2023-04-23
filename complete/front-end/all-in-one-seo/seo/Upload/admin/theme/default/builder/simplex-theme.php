<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright © 2017 ProThemes.Biz
 *
 */
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $pageTitle; ?>  
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php adminLink(); ?>"> Admin</a></li>
        <li class="active"><a href="<?php adminLink($controller); ?>"><?php echo $pageBuilderTitle; ?></a></li>
        <li class="active"><a href="<?php adminLink($controller); ?>"><?php echo $pageTitle; ?></a> </li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="<?php echo $page1; ?>"><a href="#general" data-toggle="tab"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; General</a></li>
          <li class="hide <?php echo $page2; ?>"><a href="#widgets" data-toggle="tab"><i class="fa fa-tasks" aria-hidden="true"></i>&nbsp; Widgets</a></li>
          <li class="<?php echo $page3; ?>"><a href="#add-new" data-toggle="tab"><i class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp; Add Custom Stylesheet</a></li>
        </ul>
        <div class="tab-content">
        
        <div class="tab-pane <?php echo $page1; ?>" id="general">
        <br />
        <?php if(isset($msg)) echo $msg; ?>


        <form method="POST" action="#" enctype="multipart/form-data"> 
        <div class="mycontainer">
        
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Language Switcher</label> <br />
                    <input <?php isSelected($to['general']['langSwitch'], true, 2); ?> type="checkbox" name="langSwitch" id="langSwitch" />
                </div>    
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Sidebar Position</label> <br />
                    <input <?php isSelected($to['general']['sidebar'], true, 2, 'right'); ?> type="checkbox" name="sidebar" id="sidebar" />
                </div> 
            </div> 

            <div class="col-md-3">
                <div class="form-group">
                    <label>Index Searcbar</label> <br />
                    <input <?php isSelected($to['general']['iSearch'], true, 2); ?> type="checkbox" name="iSearch" id="iSearch" />
                </div> 
            </div> 
            <div class="col-md-3">
                <div class="form-group">
                    <label>Sidebar Searcbar</label> <br />
                    <input <?php isSelected($to['general']['sSearch'], true, 2); ?> type="checkbox" name="sSearch" id="sSearch" />
                </div> 
            </div>
            
            <div class="col-md-12">
                <br />
                <div class="form-group">
                    <label>Limit tools on homepage with "Browse More Tools" button</label> <br />
                    <input <?php isSelected($to['general']['browseBtn'], true, 2); ?> type="checkbox" name="browseBtn" id="browseBtn" />
                </div> 
                <hr />
                <br />
            </div> 
           
            <div class="col-md-6">
                <label> Favicon </label> <br />
                <img class="favLogoBox" id="favLogoBox" src="<?php echo $baseURL.$to['general']['favicon']; ?>" />
                <br /> Upload a new favicon
                <input type="file" name="favUpload" id="favUpload" class="btn btn-default" />
                <br />
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label> Logo Type </label>
                    <select name="to[general][imgLogo]" id="imgLogo" class="form-control">
                        <option <?php isSelected($to['general']['imgLogo'],true,'1'); ?> value="on">Image Logo</option>
                        <option <?php isSelected($to['general']['imgLogo'],false,'1'); ?> value="off">Text / HTML Logo</option>
                    </select>
                </div>
                <div class="hide" id="on">  
                    <img class="userLogoBox" id="userLogoBox" src="<?php echo $baseURL.$to['general']['logo']; ?>" />
                    <br /> Upload a new Logo
                    <input type="file" name="logoUpload" id="logoUpload" class="btn btn-default" />
                </div>  
                <div class="hide" id="off">  
                    <div class="form-group">
                        <label>Logo Text</label>                                        
                        <textarea class="form-control inputTextArea" name="to[general][htmlLogo]"><?php echo htmlspecialchars_decode($to['general']['htmlLogo']); ?></textarea>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12">
                <hr />
                <br />
                 <div class="box-header with-border">
                    <h3 class="box-title">Top 5 Tools<small>(Footer)</small></h3>
                </div>
                <br />
                
                <div class="form-group">
                <label>Select top 5 tools displayed on footer:</label>
                <select name="topTools[]" class="form-control select2" multiple="multiple" data-placeholder="Select tools..." style="width: 100%;">
                  <?php foreach($toolsList as $toolName=>$toolUid) echo '<option '.(in_array($toolUid,$to['general']['topTools']) ? 'selected=""' : '').' value="'.$toolUid.'">'.$toolName.'</option>'; ?>
                </select>
              </div><!-- /.form-group -->
            </div>
            
            <div class="col-md-12">
                 <div class="box-header with-border">
                    <h3 class="box-title">About Us<small>(Footer)</small></h3>
                </div>
                <br />
                
                <div class="form-group">
                    <textarea class="form-control" rows="10" name="to[contact][about]"><?php echo $to['contact']['about']; ?></textarea>
                </div>
    
               <br /> <br /><br />
                <div class="text-center">
                    <input type="hidden" value="1" name="page1" />
                    <input type="submit" name="save" value="Save Settings" class="btn btn-primary"/>
                </div>
                <br /><br />
                </form>
            </div>
          </div>
        </div>
        </div>
        
        <div class="tab-pane <?php echo $page2; ?>" id="widgets">
        <br />
        <?php if(isset($msg)) echo $msg; ?>


        </div>
            
        <div class="tab-pane <?php echo $page3; ?>" id="add-new">
        <br />
        <?php if(isset($msg)) echo $msg; ?>

        <form action="#" method="POST">
            <div class="form-group">
                <label>Enter custom stylesheet code:</label> <br />
                <textarea placeholder=".test{ width: 20px; }" class="form-control" rows="15" name="to[custom][css]"><?php echo htmlspecialchars_decode($to['custom']['css']); ?></textarea>
            </div>
 
        <br /><br />
        <div class="text-center">
            <input type="hidden" value="1" name="page3" />
            <input type="submit" name="save" value="Save Settings" class="btn btn-primary"/>
        </div>
        <br /><br />
        </form> 
                
        </div>
    </div>
  
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
<?php
$footerAddArr[] = <<<EOD
    <script> 
       var oldSel;
       $(function () {
        $(".select2").select2({maximumSelectionLength: 5});
        var selVal = jQuery('select[id="imgLogo"]').val();
        oldSel = selVal;
        $('#'+selVal).removeClass("hide");
        $('#'+selVal).fadeIn();
       });
        
       $('select[id="imgLogo"]').on('change', function() {
            var selVal = jQuery('select[id="imgLogo"]').val();
            $('#'+oldSel).fadeOut();
            $('#'+selVal).removeClass("hide");
            $('#'+selVal).fadeIn();
            oldSel = selVal;
        });
        function readURL(input,box){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
        
                reader.onload = function (e) {
                    $(box).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }  
        $("#logoUpload").change(function(){
            readURL(this,'#userLogoBox');
        });
        $("#favUpload").change(function(){
            readURL(this,'#favLogoBox');
        });
        $('#langSwitch').checkboxpicker({onLabel:"Enable",offLabel:"Disable"});
        $('#sidebar').checkboxpicker({onLabel:"Right",offLabel:"Left"});
        $('#iSearch').checkboxpicker({onLabel:"Enable",offLabel:"Disable"});
        $('#sSearch').checkboxpicker({onLabel:"Enable",offLabel:"Disable"});
        $('#browseBtn').checkboxpicker({onLabel:"Enable",offLabel:"Disable"});
    </script>
EOD;
?>