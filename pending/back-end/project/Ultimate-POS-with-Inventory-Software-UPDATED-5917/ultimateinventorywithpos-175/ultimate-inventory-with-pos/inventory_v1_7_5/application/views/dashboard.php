<!DOCTYPE html>
<html>
<head>
<!-- FORM CSS CODE -->
<?php include"comman/code_css_datatable.php"; ?>
<!-- </copy> -->  
<!-- jvectormap -->
<link rel="stylesheet" href="<?php echo $theme_link; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
<style type="text/css">
   #chart_container {
   min-width: 320px;
   max-width: 600px;
   margin: 0 auto;
   }
   
</style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- Notification sound -->
  <audio id="login">
    <source src="<?php echo $theme_link; ?>sound/login.mp3" type="audio/mpeg">
    <source src="<?php echo $theme_link; ?>sound/login.ogg" type="audio/ogg">
  </audio>
  <script type="text/javascript">
    var login_sound = document.getElementById("login"); 
  </script>
  <!-- Notification end -->
  <script type="text/javascript">
  <?php if($this->session->flashdata('success')!=''){ ?>
        login_sound.play();
  <?php } ?>
  </script>
  
  <?php include"sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$page_title;?>
        <small>Overall Information on Single Screen</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Home</li>
      </ol>
    </section><br/>
    <div class="row">
    <div class="col-md-12">
      <!-- ********** ALERT MESSAGE START******* -->
       <?php include"comman/code_flashdata.php"; ?>
       <!-- ********** ALERT MESSAGE END******* -->
     </div>
     </div>
     
     
      
        

      
    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
             <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-bag"></i></span>
                <div class="info-box-content">
                   <span class="text-bold text-uppercase"><?= $this->lang->line('total_purchase_due'); ?></span>
                   <span class="info-box-number"><?= $CI->currency(app_number_format($purchase_due)); ?></span>
                </div>
                <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
             <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-dollar"></i></span>
                <div class="info-box-content">
                   <span class="text-bold text-uppercase"><?= $this->lang->line('total_sales_due'); ?></span>
                   <span class="info-box-number"><?= $CI->currency(app_number_format($sales_due)); ?></span>
                </div>
                <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
             <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-cart-plus"></i></span>
                <div class="info-box-content">
                   <span class="text-bold text-uppercase"><?= $this->lang->line('total_sales_amount'); ?></span>
                   <span class="info-box-number"><?= $CI->currency(app_number_format($tot_sal_grand_total)); ?></span>
                </div>
                <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
             <div class="info-box">
                <span class="info-box-icon bg-red "><i class="fa fa-minus-square-o"></i></span>
                <div class="info-box-content">
                   <span class="text-bold text-uppercase"><?= $this->lang->line('total_expense_amount'); ?></span>
                     <span class="info-box-number"><?= $CI->currency(app_number_format($tot_exp)); ?></span>
                   </span>
                </div>
                <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
          </div>
          <!-- /.col -->
       </div>
       <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
             <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-bag"></i></span>
                <div class="info-box-content">
                   <span class="text-bold text-uppercase"><?= $this->lang->line('todays_total_purchase'); ?></span>
                   <span class="info-box-number"><?= $CI->currency(app_number_format($todays_total_purchase)); ?></span>
                </div>
                <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
             <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-dollar"></i></span>
                <div class="info-box-content">
                   <span class="text-bold text-uppercase"><?= $this->lang->line('today_payment_received'); ?>(Sales)</span>
                   <span class="info-box-number"><?= $CI->currency(app_number_format($today_payment_received)); ?></span>
                </div>
                <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
             <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-cart-plus"></i></span>
                <div class="info-box-content">
                   <span class="text-bold text-uppercase"><?= $this->lang->line('todays_total_sales'); ?></span>
                   <span class="info-box-number"><?= $CI->currency(app_number_format($todays_total_sales)); ?></span>
                </div>
                <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
             <div class="info-box">
                <span class="info-box-icon bg-red "><i class="fa fa-minus-square-o"></i></span>
                <div class="info-box-content">
                   <span class="text-bold text-uppercase"><?= $this->lang->line('todays_total_expense'); ?></span>
                     <span class="info-box-number"><?= $CI->currency(app_number_format($todays_total_expense)); ?></span>
                   </span>
                </div>
                <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
          </div>
          <!-- /.col -->
       </div>
       <!-- /.row -->
      <!-- Info boxes -->
      <div class="row">
      	<div class="col-lg-3 col-xs-6">
          <div class="small-box bg-dream-pink">
            <div class="inner text-uppercase">
              <h3><?= $tot_cust;?></h3><p><?= $this->lang->line('customers'); ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-group "></i>
            </div>
            <?php if($CI->session->userdata('inv_userid')==1){ ?> 
            <a href="<?= base_url('customers') ?>" class="small-box-footer text-uppercase">View <i class="fa fa-arrow-circle-right"></i>
        	</a>
        	<?php } ?>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-dream-purple">
            <div class="inner text-uppercase">
              <h3><?= $tot_sup;?></h3><p><?= $this->lang->line('suppliers'); ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-group "></i>
            </div>
            <?php if($CI->session->userdata('inv_userid')==1){ ?> 
            <a href="<?= base_url('suppliers') ?>" class="small-box-footer text-uppercase">View <i class="fa fa-arrow-circle-right"></i>
        	</a>
        	<?php } ?>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-dream-maroon">
            <div class="inner text-uppercase">
              <h3><?= $tot_pur;?></h3><p><?= $this->lang->line('purchase_invoice'); ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-paper-outline"></i>
            </div>
            <?php if($CI->session->userdata('inv_userid')==1){ ?> 
            <a href="<?= base_url('purchase') ?>" class="small-box-footer text-uppercase">View <i class="fa fa-arrow-circle-right"></i>
        	</a>
        	<?php } ?>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-dream-green">
            <div class="inner text-uppercase">
              <h3><?= $tot_sal;?></h3><p><?= $this->lang->line('sales_invoice'); ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-paper-outline"></i>
            </div>
            <?php if($CI->session->userdata('inv_userid')==1){ ?> 
            <a href="<?= base_url('sales') ?>" class="small-box-footer text-uppercase">View <i class="fa fa-arrow-circle-right"></i>
        	</a>
        	<?php } ?>
          </div>
        </div>

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <!-- /.col -->
        
      </div>
      <!-- /.row -->
     <div class="row">
     <div class="col-md-8">
     	<!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title text-uppercase"><?= $this->lang->line('purchase_and_sales_bar_chart'); ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">


          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title text-uppercase"><?= $this->lang->line('recently_added_items'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              
              
                      <table class="table table-bordered table-responsive">
                        <tr class='bg-blue'>
                          <td>Sl.No</td>
                          <td><?= $this->lang->line('item_name'); ?></td>
                          <td><?= $this->lang->line('item_sales_price'); ?></td>
                        </tr>
                        <tbody>
                <?php
                    $i=1;
                    $qs5="SELECT item_name,sales_price FROM db_items where status=1 ORDER BY id desc limit 5";
                    $q5=$this->db->query($qs5);
                    if($q5->num_rows() >0){
                      
                      foreach($q5->result() as $res5){
                        ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $res5->item_name; ?></td>
                          <td><?php echo $CI->currency($res5->sales_price,$with_comma=true); ?></td>
                        </tr>
                        
                        <?php
                      }
                    }
                    ?>
                    </tbody>
                    <?php if($CI->session->userdata('inv_userid')==1){ ?> 
                      <tfoot>
                      <tr>
                        <td colspan="3" class="text-center"><a href="<?php echo $base_url; ?>items" class="uppercase"><?= $this->lang->line('view_all'); ?></a></td>
                      </tr>
                    </tfoot>
                    <?php } ?>
                  </table>
                
               
            
            </div>
            <!-- /.box-body -->
          
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
     </div>
     
      <!-- ############################# GRAPHS ############################## -->
     
      <!-- /.row -->
      <div class="row">
        <!-- /.row -->
     
     <div class="col-md-5">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title text-uppercase"><?= $this->lang->line('expired_items'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example3" class=" datatable table table-bordered table-hover">
                <thead>
                <tr class='bg-blue'>
                  <th>#</th>
                  <th><?= $this->lang->line('item_code'); ?></th>
                  <th><?= $this->lang->line('item_name'); ?></th>
                  <th><?= $this->lang->line('category_name'); ?></th>
                  <th><?= $this->lang->line('expire_date'); ?></th>
                </tr>
                </thead>
                <tbody>
        <?php
        $qs6="SELECT a.item_name,a.item_code,b.category_name,a.expire_date from db_items as a,db_category as b where b.id=a.category_id and a.expire_date<='".date("Y-m-d")."' and a.status=1";
        $q6=$this->db->query($qs6);
       
        if($q6->num_rows()>0){
          $i=1;
          foreach ($q6->result() as $row){
            echo "<tr>";
            echo "<td>".$i++."</td>";
            echo "<td>".$row->item_code."</td>";
            echo "<td>".$row->item_name."</td>";
            echo "<td>".$row->category_name."</td>";
            echo "<td>".show_date($row->expire_date)."</td>";
            echo "</tr>";
          }
        }
        ?>
        
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <!-- /.col (LEFT) -->
        <div class="col-md-7">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title text-uppercase"><?= $this->lang->line('stock_alert'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr class='bg-blue'>
                  <th>#</th>
                  <th><?= $this->lang->line('category_name'); ?></th>
                  <th><?= $this->lang->line('item_name'); ?></th>
                  <th><?= $this->lang->line('stock'); ?></th>
                </tr>
                </thead>
                <tbody>
        <?php
        $qs4="SELECT b.category_name,a.item_name,a.stock FROM db_items a,db_category b WHERE 
              a.stock<=a.alert_qty and b.id=a.category_id and a.status=1 GROUP BY a.id";

        $q4=$this->db->query($qs4);
       
        if($q4->num_rows()>0){
          $i=1;
          foreach ($q4->result() as $row){
            echo "<tr>";
            echo "<td>".$i++."</td>";
            echo "<td>".$row->category_name."</td>";
            echo "<td>".$row->item_name."</td>";
            echo "<td>".$row->stock."</td>";
            echo "</tr>";
          }
        }
        ?>
        
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <div class="row">
          <!-- /.col -->
          <div class=" col-sm-12 col-md-12 col-lg-12 col-xs-12">
             <!-- PRODUCT LIST -->
             <div class="box box-primary">
                <!-- /.box-header -->
                <div class="box-body ">
                   <div id="bar_container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                </div>
                <!-- /.box-body -->
             </div>
             <!-- /.box -->
          </div>
          <!-- /.col -->
       </div>
      <?php 
        //Bar chart information
        $jan_pur=$feb_pur=$mar_pur=$apr_pur=$may_pur=$jun_pur=$jul_pur=$aug_pur=$sep_pur=$oct_pur=$nov_pur=$dec_pur=0;
        $jan_sal=$feb_sal=$mar_sal=$apr_sal=$may_sal=$jun_sal=$jul_sal=$aug_sal=$sep_sal=$oct_sal=$nov_sal=$dec_sal=0;

        $q1=$this->db->query("SELECT COALESCE(SUM(grand_total),0) AS pur_total,MONTH(purchase_date) AS purchase_date FROM db_purchase where purchase_status='Received'  GROUP BY MONTH(purchase_date) ");
        if($q1->num_rows() >0){
          foreach($q1->result() as $res1){
            if($res1->purchase_date == '1'){ $jan_pur = $res1->pur_total; }
            else if($res1->purchase_date == '2'){ $feb_pur = $res1->pur_total; }
            else if($res1->purchase_date == '3'){ $mar_pur = $res1->pur_total; }
            else if($res1->purchase_date == '4'){ $apr_pur = $res1->pur_total; }
            else if($res1->purchase_date == '5'){ $may_pur = $res1->pur_total; }
            else if($res1->purchase_date == '6'){ $jun_pur = $res1->pur_total; }
            else if($res1->purchase_date == '7'){ $jul_pur = $res1->pur_total; }
            else if($res1->purchase_date == '8'){ $aug_pur = $res1->pur_total; }
            else if($res1->purchase_date == '9'){ $sep_pur = $res1->pur_total; }
            else if($res1->purchase_date == '10'){ $oct_pur = $res1->pur_total; }
            else if($res1->purchase_date == '11'){ $nov_pur = $res1->pur_total; }
            else if($res1->purchase_date == '12'){ $dec_pur = $res1->pur_total; }
          }
        }

        //DONUS CHART
        $q2=$this->db->query("SELECT COALESCE(SUM(grand_total),0) AS sal_total,MONTH(sales_date) AS sales_date FROM db_sales where sales_status='Final' GROUP BY MONTH(sales_date)");
        if($q2->num_rows() >0){
          foreach($q2->result() as $res2){
            if($res2->sales_date == '1'){ $jan_sal = $res2->sal_total; }
            else if($res2->sales_date == '2'){ $feb_sal = $res2->sal_total; }
            else if($res2->sales_date == '3'){ $mar_sal = $res2->sal_total; }
            else if($res2->sales_date == '4'){ $apr_sal = $res2->sal_total; }
            else if($res2->sales_date == '5'){ $may_sal = $res2->sal_total; }
            else if($res2->sales_date == '6'){ $jun_sal = $res2->sal_total; }
            else if($res2->sales_date == '7'){ $jul_sal = $res2->sal_total; }
            else if($res2->sales_date == '8'){ $aug_sal = $res2->sal_total; }
            else if($res2->sales_date == '9'){ $sep_sal = $res2->sal_total; }
            else if($res2->sales_date == '10'){ $oct_sal = $res2->sal_total; }
            else if($res2->sales_date == '11'){ $nov_sal = $res2->sal_total; }
            else if($res2->sales_date == '12'){ $dec_sal = $res2->sal_total; }
          }
        }
      ?>
      <!-- ############################# GRAPHS END############################## -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('footer'); ?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- SOUND CODE -->
<?php include"comman/code_js_sound.php"; ?>
<!-- TABLES CODE -->
<?php include"comman/code_js_datatable.php"; ?>
<!-- bootstrap datepicker -->

<!-- ChartJS 1.0.1 -->
<script src="<?php echo $theme_link; ?>plugins/chartjs/Chart.min.js"></script>


<!-- Sparkline -->
<script src="<?php echo $theme_link; ?>plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo $theme_link; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo $theme_link; ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

 <!-- BAR CHART -->
<script src="<?php echo $theme_link; ?>plugins/highcharts/highcharts.js"></script>
<script src="<?php echo $theme_link; ?>plugins/highcharts/highcharts-more.js"></script>
<script src="<?php echo $theme_link; ?>plugins/highcharts/exporting.js"></script>
<!-- BAR CHART END -->
<!-- PIE CHART -->
<script src="<?php echo $theme_link; ?>plugins/highcharts/export-data.js"></script>
<!-- PIE CHART END -->

<!-- Make sidebar menu hughlighter/selector -->
<script>$(".<?php echo basename(__FILE__,'.php');?>-active-li").addClass("active");</script>
<script>
  $(function () {
    $('#example2,#example3').DataTable({
      "pageLength" : 5,
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */


    //-------------
    //- BAR CHART -
    //-------------
    var barChartData = {
      labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
      datasets: [
        {
          label: "Purchase Amt(in <?= $CI->currency();?>)",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [<?php echo $jan_pur; ?>, <?php echo $feb_pur; ?>, <?php echo $mar_pur; ?>, <?php echo $apr_pur; ?>, <?php echo $may_pur; ?>, <?php echo $jun_pur; ?>, <?php echo $jul_pur; ?>, <?php echo $aug_pur; ?>, <?php echo $sep_pur; ?>, <?php echo $oct_pur; ?>, <?php echo $nov_pur; ?>, <?php echo $dec_pur; ?>]
        },
        {
          label: "Sales Amt(in <?= $CI->currency();?>)",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $jan_sal; ?>, <?php echo $feb_sal; ?>, <?php echo $mar_sal; ?>, <?php echo $apr_sal; ?>, <?php echo $may_sal; ?>, <?php echo $jun_sal; ?>, <?php echo $jul_sal; ?>, <?php echo $aug_sal; ?>, <?php echo $sep_sal; ?>, <?php echo $oct_sal; ?>, <?php echo $nov_sal; ?>, <?php echo $dec_sal; ?>]
        }
      ]
    };
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    barChartData.datasets[1].fillColor = "#00a65a";
    barChartData.datasets[1].strokeColor = "#00a65a";
    barChartData.datasets[1].pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  });


  /* PIE CHART*/
         Highcharts.chart('bar_container', {
             chart: {
                 plotBackgroundColor: null,
                 plotBorderWidth: null,
                 plotShadow: false,
                 type: 'pie'
             },
             title: {
                 text: '<?= $this->lang->line('top_10_trending_items'); ?> %'
             },
             tooltip: {
                 /*pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'*/
                 pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
             },
             plotOptions: {
                 pie: {
                     allowPointSelect: true,
                     cursor: 'pointer',
                     dataLabels: {
                         enabled: true,
                         format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                         style: {
                             color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                         }
                     }
                 }
             },
             series: [{
                 name: 'Item',
                 colorByPoint: true,
                 data: [
                 <?php 
            //PIE CHART
            $q3=$this->db->query("SELECT COALESCE(SUM(b.sales_qty),0) AS sales_qty, a.item_name FROM db_items AS a, db_salesitems AS b ,db_sales AS c WHERE a.id=b.`item_id` AND b.sales_id=c.`id` AND c.`sales_status`='Final' GROUP BY a.id limit 10");
            if($q3->num_rows() >0){
              foreach($q3->result() as $res3){
                  //extract($res3);
                  if($res3->sales_qty>0){
                  echo "{name:'".$res3->item_name."', y:".$res3->sales_qty."},";
                  }
              }
            }
            ?>
                 ]
             }]
         });
         /* PIE CHART END*/
</script>
</body>
</html>
