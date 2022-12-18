<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright 2019 ProThemes.Biz
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

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Complete SEO Tools List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php
                if(isset($msg)){
                    echo $msg;
                }?>
                  <div class="table-responsive">
                  <table id="seoToolTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Tool UID</th>
                        <th>Tool Name</th>
                        <th>Status</th>
                        <th>Position</th>
                        <th>Edit</th>
                        <th>Disable</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($toolList as $seoTool){
                        $toolActive = filter_var($seoTool["tool_show"], FILTER_VALIDATE_BOOLEAN);
                        
                        if($toolActive){
                         $toolActive = "<span style='color: #27ae60;'>Active</span>";
                         $toolActiveBut = '<a class="btn btn-block btn-danger btn-sm" href="'.adminLink('manage-tools&id='.$seoTool["id"].'&disable',true).'">Disable</a>';
                        }else{
                           $toolActive = "<span style='color: #c0392b;'>Not Active</span>"; 
                           $toolActiveBut = '<a class="btn btn-block btn-success btn-sm" href="'.adminLink('manage-tools&id='.$seoTool["id"].'&enable',true).'">Enable</a>';
                        }
                
                        echo '<tr>
                        <td>'.$seoTool["uid"].'</td>
                        <td>'.shortCodeFilter($seoTool["tool_name"]).'</td>
                        <td>'.$toolActive.'</td>
                        <td>'.$seoTool["tool_no"].'</td>
                        <td><a class="btn btn-block btn-primary btn-sm" href="'.adminLink('edit-tools&id='.$seoTool["id"].'&edit',true).'">Edit</a></td>
                        <td>'.$toolActiveBut.'</td>
                      </tr>';
                    }
                    ?>

                    </tbody>
                  </table>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
      
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php
$footerAddArr[] = <<<EOD
    <script type="text/javascript">
      $(function () {
        $('#seoToolTable').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
EOD;
?>