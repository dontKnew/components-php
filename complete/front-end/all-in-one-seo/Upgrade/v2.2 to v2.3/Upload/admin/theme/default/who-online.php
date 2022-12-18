<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright 2019 ProThemes.Biz
 *
 */
?>
<style>
td {
  word-wrap: break-word;
}
@media only screen and (min-width: 600px) {
    .table-responsive {
        overflow-x: hidden;
    }
}
</style>
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
              <h3 class="box-title"><?php echo $subTitle; ?></h3>
            </div><!-- /.box-header ba-la-ji -->
            <form action="#" method="POST">
            <div class="box-body">
          
            <?php if(isset($msg)) echo $msg; ?><br />

                <div class="table-responsive">
          <table id="visitorsTable" class="table table-bordered table-striped visitorsTable">
            <thead>
              <tr>
                <th>IP</th>
                <th>Country</th>
                <th>Customer</th>
                <th>Browser</th>
                <th>Last Page Visited</th>
                <th>Referer</th>
                <th>Last Click</th>
              </tr>
            </thead>
            <tbody id="visitorsTableBody">
                <?php echo $rainbowTrackBalaji; ?>
            </tbody>
          </table>
                </div>
            
            <br />
            
            </div><!-- /.box-body -->
            </form>
          </div><!-- /.box -->
  
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
<?php 
metaRefresh(null,10);
$footerAddArr[] = <<<EOD
<script type="text/javascript">
var visitTab;
$(function () {
    visitTab = $('#visitorsTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});
jQuery(document).ready(function(){
    $(document).on("click",".paginate_button", function(){
        setTimeout(function(){
        var pos = $('#contentBox').offset();
        $('body,html').animate({ scrollTop: pos.top });
        }, 1);
    });
});
</script>
EOD;
?>