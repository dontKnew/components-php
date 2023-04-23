
<div class="col-md-12 col-xl-12 tr_aeff775f290fcd8af02ac13f41467db1">
    <div class="card card-collapsed">
      <div class="card-header">
        <h3 class="card-title" data-toggle="card-collapse">
          <span class="bg-question"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i></span>
         Currency converter from USD to INR      </h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="card-body">
        <p><span>
    <center>
        
<b>Tyep Your Amount In Box To Check USD To INR </b>
        
        </br></br>
        <form class="frConverter">
<table border="0" cellpadding="3" cellspacing="0">
<tr>
	<td>From USD</td>
	<td><input type="hidden" name="base_currency" value="usd"></td>
	<td><input type="text" name="base_value" size="25" value="1"></td>
</tr>
<tr>
	<td>To INR</td>
	<td><input type="hidden" name="target_currency" value="inr"></td>
	<td><input type="text" name="target_value" size="25" value=""></td>
</tr>
</table>

</form>
</center>
 </span></p>      </div>
    </div>
  </div>
  
  

<script type="text/javascript">
  (function() {
    var js = document.createElement('script'); js.type = 'text/javascript'; js.async = true;
    js.src = '//www.floatrates.com/scripts/converter.js';
    var sjs = document.getElementsByTagName('script')[0]; sjs.parentNode.insertBefore(js, sjs);
  })();
</script>


<?php
  $data_tickets_log = $data_log->data_tickets;
  $data_orders_log  = $data_log->data_orders;

  switch (get_option('currency_decimal_separator', 'dot')) {
    case 'dot':
      $decimalpoint = '.';
      break;
    case 'comma':
      $decimalpoint = ',';
      break;
    default:
      $decimalpoint = '';
      break;
  } 

  switch (get_option('currency_thousand_separator', 'comma')) {
    case 'dot':
      $separator = '.';
      break;
    case 'comma':
      $separator = ',';
      break;
    case 'space':
      $separator = ' ';
      break;
    default:
      $separator = '';
      break;
  }

?>
<div class="row justify-content-center row-card statistics">
  <div class="col-sm-12">
    <div class="row">
      <?php
        if (get_role("admin")) {
      ?>
      
      

 <div class="col-sm-6 col-lg-3 item">
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-warning-gradient text-white mr-3">
              <i class="fe fe-shopping-cart"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                  
                <a href="/api_provider/cron/status" class="btn round">UPDATE</a> |
                
            
                <a href="/api_provider/cron/order" class="btn round">SEND</a>
                
              </div>
            </div>
          </div>
        </div>
      </div>


      
      
      
      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-success-gradient text-white mr-3">
              <i class="fe fe-users"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_log->total_users?></h4>
                <small class="text-muted "><?=lang("total_users")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <?php }else{ ?>
       <div class="col-sm-6 col-lg-3 item">
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-warning-gradient text-white mr-3">
              <i class="fe fe-shopping-cart"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <a href="/order/add" class="btn round btn-primary btn-min-width mr-1 mb-1">NEW ORDER</a>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-success-gradient text-white mr-3">
              <i class="fe fe-dollar-sign"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=get_option('currency_symbol',"$")?><?=(!empty($data_log->user_balance)) ? currency_format($data_log->user_balance, get_option('currency_decimal', 2), $decimalpoint, $separator) : 0?></h4>
                <small class="text-muted "><?=lang("your_balance")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-info-gradient text-white mr-3">
              <i class="fe fe-dollar-sign"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=get_option('currency_symbol',"$")?><?=(!empty($data_log->total_spent_receive)) ? currency_format($data_log->total_spent_receive, get_option('currency_decimal', 2), $decimalpoint, $separator) : 0?></h4>
                <small class="text-muted ">
                  <?=(get_role("admin") ? lang("total_amount_recieved") : lang("total_amount_spent"))?>
                </small>
              </div>
            </div>
          </div>
        </div>
      </div>

     

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-danger-gradient text-white mr-3">
              <i class="fa fa-ticket"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_tickets_log->total?></h4>
                <small class="text-muted "><?=lang("total_tickets")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="row">
      
      <!-- Order -->
     

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-list"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_orders_log->total?></h4>
                <small class="text-muted "><?=lang("total_orders")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-check"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 number"><?=$data_orders_log->completed?></h4>
                <small class="text-muted"><?=lang("Completed")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-trending-up"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_orders_log->processing?></h4>
                <small class="text-muted "><?=lang("Processing")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-loader"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_orders_log->inprogress?></h4>
                <small class="text-muted "><?=lang("In_progress")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-pie-chart"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_orders_log->pending?></h4>
                <small class="text-muted "><?=lang("Pending")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fa fa-hourglass-half"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_orders_log->partial?></h4>
                <small class="text-muted "><?=lang("Partial")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>    

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-x-square"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_orders_log->canceled?></h4>
                <small class="text-muted "><?=lang("Canceled")?></small>
              </div>
            </div>
          </div>
        </div>
      </div> 

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-rotate-ccw"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_orders_log->refunded?></h4>
                <small class="text-muted "><?=lang("Refunded")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>    
      <?php
        if (get_role('admin')) {
      ?>
      <!-- tickets
      <div class="col-sm-12 charts">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?=lang("recent_tickets")?></h3>
          </div>
          <div class="row">
            <div class="col-sm-8">
              <div class="p-4 card">
                <div id="tickets_chart_spline" style="height: 20rem;"></div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="p-4 card">
                <div id="tickets_chart_pie" style="height: 20rem;"></div>
              </div>
            </div>
          </div>
          
        </div>
      </div> -->

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fa fa-ticket"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_tickets_log->total?></h4>
                <small class="text-muted "><?=lang("total_tickets")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-mail"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 number"><?=$data_tickets_log->new?></h4>
                <small class="text-muted"><?=lang("New")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-pie-chart"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_tickets_log->pending?></h4>
                <small class="text-muted "><?=lang("Pending")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-check"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?=$data_tickets_log->closed?></h4>
                <small class="text-muted "><?=lang("Closed")?></small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
    </div>
  </div>
</div>


<div class="row justify-content-center">
  
  <!-- Top Best Sellers -->
  <div class="col-md-12">
    <?php

      if (get_role('admin')) {
        $columns_best_seller = array(
          "name"             => lang("Name"),
          "total_orders"     => lang("total_orders"),
          "add_type"         => lang("Type"),
          "provider"         => lang("api_provider"),
          "api_service_id"   => lang("api_service_id"),
          "price"            => lang("rate_per_1000")."(".get_option("currency_symbol","").")",
          "min_max"          => lang("min__max_order"),
          "desc"             => lang("Description"),
          "status"           => lang("Status"),
        );
      }else{
        $columns_best_seller = array(
          "name"             => lang("Name"),
          "price"            => lang("rate_per_1000")."(".get_option("currency_symbol","").")",
          "min_max"          => lang("min__max_order"),
          "desc"             => lang("Description"),
        );
      } 
      $data = array(
        'services' => $top_bestsellers,
        'columns'  => $columns_best_seller
      );
      $this->load->view('top_bestsellers', $data);
    ?>
  </div>  
  
  <?php 
    if (get_role('admin')) {
  ?>
  <!-- Last 5 Newest Users -->
  <div class="col-md-12">
    <?php 
      $data = array(
        'users' => $last_5_users,
        'columns'  => array(
            "name"                   => lang("name"),
            "Email"                  => lang("Email"),
            "type"                   => lang("Type"),
            "balance"                => lang('Funds'),
            "last_ip_address"        => 'Last IP Address',
            "created"                => lang("Created"),
            "status"                 => lang('Status'),
          )
      );
      $this->load->view('last_5_users', $data);
    ?>
  </div>
  
  <!-- Last 5 order -->
  <div class="col-md-12">
    <?php 
      $data = array(
        'order_logs' => $last_5_orders,
        'columns'  => array(
            "order_id"            => lang("order_id"),
            "uid"                 => lang("User"),
            "name"                => lang("name"),
            "type"                => lang("Type"),
            "link"                => lang("Link"),
            "quantity"            => lang("Quantity"),
            "amount"              => lang("Amount"),
            "created"             => lang("Created"),
            "status"              => lang("Status"),
          )
      );
      $this->load->view('last_5_orders', $data);
    ?>
  </div>
  <?php } ?>

</div>



<script>
  $(document).ready(function(){

    Chart_template.chart_spline('#orders_chart_spline', <?=$data_orders_log->data_orders_chart_spline?>);
    Chart_template.chart_pie('#orders_chart_pie', <?=$data_orders_log->data_orders_chart_pie?>);

    Chart_template.chart_spline('#tickets_chart_spline', <?=$data_tickets_log->data_tickets_chart_spline?>);
    Chart_template.chart_pie('#tickets_chart_pie', <?=$data_tickets_log->data_tickets_chart_pie?>);
  });
</script>

