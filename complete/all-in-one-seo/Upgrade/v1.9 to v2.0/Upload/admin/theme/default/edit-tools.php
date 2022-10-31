<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
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
        <li><a href="<?php adminLink(); ?>"><i class="<?php getAdminMenuIcon($controller,$menuBarLinks); ?>"></i> Admin</a></li>
        <li class="active"><a href="<?php adminLink($controller); ?>"><?php echo $pageTitle; ?></a> </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">General Settings</h3>
                </div><!-- /.box-header -->
                <form action="#" method="POST" onsubmit="return finalFixedLink();">
                <div class="box-body">
                <?php
                if(isset($msg)){
                    echo $msg;
                }?>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                      <label for="tool_name">Tool Name</label>
                      <input type="text" placeholder="Enter your tool name" value="<?php echo $tool_name; ?>" name="tool_name" class="form-control" />
                    </div>
                    <div class="form-group">
                      <label for="tool_url">Tool URL</label> <small id="linkBox"> (<?php createLink($tool_url); ?>) </small>
                      <input type="text" placeholder="Enter your tool url" value="<?php echo $tool_url; ?>" name="tool_url" id="toolUrlBox" class="form-control" />
                    </div>
                    
                    <div class="form-group">
                      <label for="meta_des">Meta Description</label>
                      <textarea placeholder="Description must be within 150 Characters" rows="3" name="meta_des" class="form-control"><?php echo $meta_des; ?></textarea>
                   </div>
                   
                    <div class="form-group">
                    <label for="tool_show">Enable the SEO Tool (Currently: <span style="color: #<?php echo $tool_show_color; ?>"><?php echo $tool_show_text; ?></span>)</label>
                    <select class="form-control" name="tool_show">
						<option <?php echo $tool_show_yes; ?> value="yes">Activate</option>
						<option <?php echo $tool_show_no; ?> value="no">Deactivate</option>
					</select>
                    </div>
                    
                    <div class="form-group">
                    <label for="tool_login">Login required to access this tool (Currently: <span style="color: #<?php echo $tool_login_color; ?>"><?php echo $tool_login_text; ?></span>)</label>
                    <select class="form-control" name="tool_login">
						<option <?php echo $tool_login_yes; ?> value="yes">Needed</option>
						<option <?php echo $tool_login_no; ?> value="no">Not Needed</option>
					</select>
                    </div>
                    
                    </div><!-- /.col-md-6 -->
                    
                    <div class="col-md-6">
                    
                    <div class="form-group">
                      <label for="tool_no">Sort Order</label>
                      <input type="text" placeholder="Enter sort order number" value="<?php echo $tool_no; ?>" name="tool_no" class="form-control" />
                    </div>
                    
                    <div class="form-group">
                      <label for="meta_title">Meta Title</label>
                      <input type="text" placeholder="Enter your meta title" value="<?php echo $meta_title; ?>" name="meta_title" class="form-control" />
                    </div>
                    
                    <div class="form-group">
                      <label for="meta_tags">Keywords (Separate with commas)</label>
                      <textarea placeholder="keywords1, keywords2, keywords3" rows="3" name="meta_tags" class="form-control"><?php echo $meta_tags; ?></textarea>
                   </div>
                   
                    <div class="form-group">
                    <label for="captcha">Enable captcha protection for this tool (Currently: <span style="color: #<?php echo $captcha_color; ?>"><?php echo $captcha_text; ?></span>)</label>
                    <select class="form-control" name="captcha">
						<option <?php echo $captcha_yes; ?> value="yes">Activate</option>
						<option <?php echo $captcha_no; ?> value="no">Deactivate</option>
					</select>
                    </div>

                    </div>
                </div><!-- /.row -->
                 
                 <div class="row">
                 
                 <div class="form-group" style="margin: 12px;">
                      <label for="about_tool">About this SEO Tool</label>
                      <textarea id="editor1" name="about_tool" class="form-control"><?php echo $about_tool; ?></textarea>
                   </div>
                 
                 </div>
                <input type="submit" name="save" value="Save" class="btn btn-primary"/>
                <br />
                
                </div><!-- /.box-body -->
                </form>
              </div><!-- /.box -->
      
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php
$pageLink = createLink('',true);
$filebrowserBrowseUrl = createLink('core/library/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',true);
$filebrowserUploadUrl = createLink('core/library/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',true);
$filebrowserImageBrowseUrl = createLink('core/library/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',true);

$footerAddArr[] = <<<EOD
      <script type="text/javascript">
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1',{ filebrowserBrowseUrl : '$filebrowserBrowseUrl', filebrowserUploadUrl : '$filebrowserUploadUrl', filebrowserImageBrowseUrl : '$filebrowserImageBrowseUrl' });
      CKEDITOR.on( 'dialogDefinition', function( ev )
   {
      // Take the dialog name and its definition from the event
      // data.
      var dialogName = ev.data.name;
      var dialogDefinition = ev.data.definition;

      // Check if the definition is from the dialog we're
      // interested on (the Link and Image dialog).
      if ( dialogName == 'link' || dialogName == 'image' )
      {
         // remove Upload tab
         dialogDefinition.removeContents( 'Upload' );
      }
   });
      
      });
    </script>
     <script>

        var mainLink = "$pageLink";
        
        $("#toolUrlBox").focus(function (){
            fixLinkBox()
            });
        $("#toolUrlBox").keypress(function (){
            fixLinkBox()
            });
        $("#toolUrlBox").blur(function (){
            fixLinkBox(); 
            });
        $("#toolUrlBox").click(function (){
            fixLinkBox()
            });

        function fixLinkBox(){
            var pageUrl= jQuery.trim($('input[name=tool_url]').val());
            var ref = uriFix(pageUrl);
            $("#linkBox").html(" (" + mainLink + ref + ") "); 
        }
        
        function finalFixedLink(){
            var pageUrl= jQuery.trim($('input[name=tool_url]').val());
            var ref = uriFix(pageUrl);
            $("#toolUrlBox").val(ref); 
            return true;
        }
        
        </script>
EOD;
?>