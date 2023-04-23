<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright © 2018 ProThemes.Biz
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
                  <h3 class="box-title">Plagiarism Checker (PR02)</h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                 <?php
                if(isset($msg)){
                    echo $msg;
                }?>
                <div class="row">
                    <div class="col-md-8">
                        <form action="#" method="POST">
    
                        <br />
                        
                        <div class="form-group">
                            <label>
                                Select Plagiarism Checker Method
                            </label>
                            <select class="form-control" name="apiLevel" id="apiLevel">
                            <?php
                            if($apiLevel == '1'){
                               echo '<option value="1" selected="">Google Search Engine</option>'; 
                               echo '<option value="2">ProThemes.Biz Plagiarism API</option>';
                               echo '<option value="3">Google CSE Method (New)</option>'; 
                            } elseif($apiLevel == '2'){
                               echo '<option value="1">Google Search Engine</option>'; 
                               echo '<option value="2" selected="">ProThemes.Biz Plagiarism API</option>';
                               echo '<option value="3">Google CSE Method (New)</option>'; 
                            }else{    
                               echo '<option value="1">Google Search Engine</option>'; 
                               echo '<option value="2">ProThemes.Biz Plagiarism API</option>';
                               echo '<option value="3" selected="">Google CSE Method (New)</option>'; 
                            }
                            ?>
                            </select>
                        </div>
                                    
                        <div class="form-group">
                            <label for="wordLimit">Maximum Word Limit</label>
                            <input type="text" placeholder="Enter your word limit" name="wordLimit" id="wordLimit" value="<?php echo $wordLimit; ?>" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="minChar">Minimum Characters Limit</label>
                            <input type="text" placeholder="Enter your minimum characters limit" name="minChar" id="minChar" value="<?php echo $minChar; ?>" class="form-control">
                        </div>
                        
                        <input type="hidden" name="plagiarismSel" value="1" />
                        
                        <input type="submit" name="save" value="Save" class="btn btn-primary"/>                  
        
                        </form>
                    </div>
                </div>

                
                </div><!-- /.box-body -->
      
              </div><!-- /.box -->
              
              
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Mozrank Checker (PR24)</h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                 <?php
                if(isset($msg1)){
                    echo $msg1;
                }?>
                <div class="row">
                    <div class="col-md-8">
                        <form action="#" method="POST">
    
                        <br />
                                    
                        <div class="form-group">
                            <label for="mozAccess">MOZ Access ID</label>
                            <input type="text" placeholder="Enter your MOZ access id" name="mozAccess" id="mozAccess" value="<?php echo $mozAccess; ?>" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="mozSecret">MOZ Secret Key</label>
                            <input type="text" placeholder="Enter your MOZ secret key" name="mozSecret" id="mozSecret" value="<?php echo $mozSecret; ?>" class="form-control">
                        </div>
                        
                        <input type="hidden" name="mozSel" value="1" />
                        
                        <input type="submit" name="save" value="Save" class="btn btn-primary"/>                  
        
                        </form>
                    </div>
                </div>

                
                </div><!-- /.box-body -->
      
              </div><!-- /.box -->
      
      
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
