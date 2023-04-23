<style type="text/css">
  .order_btn_group .list-inline-item{
    margin-right: 0px!important;
  }
  .order_btn_group .list-inline-item a.btn{
    font-size: 0.9rem;
    font-weight: 400;
  }
  
</style>
<div class="page-header">
  <h1 class="page-title">
    <a href="<?=cn("$module/add")?>">
      <span class="add-new" data-toggle="tooltip" data-placement="bottom" data-original-title="<?=lang("add_new")?>"><i class="fa fa-plus-square text-primary" aria-hidden="true"></i></span>
    </a>
    <?=lang("dripfeed")?>
  </h1>

  <div class="page-options d-flex">
    <ul class="list-inline mb-0 order_btn_group">
      <li class="list-inline-item"><a class="nav-link btn <?=($order_status == 'all') ? 'btn-info' : ''?>" href="<?=cn($module."/all")?>">All</a></li>
      <?php 
        $status_array = order_dripfeed_status_array();
        if (!empty($status_array)) {
          foreach ($status_array as $row_status) {
      ?>
      <li class="list-inline-item"><a class="nav-link btn <?=($order_status == $row_status) ? 'btn-info' : ''?>" href="<?=cn($module."/".$row_status)?>"><?=order_status_title($row_status)?></a></li>
      <?php }}?>
    </ul>
  </div>
</div>

<div class="row" id="result_ajaxSearch">
  <?php if(!empty($order_logs)){
  ?>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?=lang("Lists")?></h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-bordered table-vcenter card-table">
          <thead>
            <tr>
              <?php if (!empty($columns)) {
                foreach ($columns as $key => $row) {
              ?>
              <th><?=$row?></th>
              <?php }}?>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($order_logs)) {
              $i = 0;
              foreach ($order_logs as $key => $row) {
              $i++;
            ?>
            <tr class="tr_<?=$row->ids?>">
              <td class="text-center"><?=$row->id?></td>
              <?php
                if (get_role("admin") || get_role("supporter")) {
              ?>
              <td class="text-center"><?=($row->api_order_id == 0 || $row->api_order_id ==-1)? "" : $row->api_order_id?></td>
              <td><?=$row->user_email?></td>
              <?php } ?>
              <td>
                <div class="title">
                  <h6><?=$row->service_id." - ".$row->service_name?></h6>
                </div>
                <div>
                  <small>
                    <?php
                      if (!empty($row->sub_response_orders) ) {
                        $real_runs = get_value($row->sub_response_orders, 'runs');
                      }else{
                        $real_runs = 0;
                      } 
                    ?>
                    <ul style="margin:0px">
                      <?php
                        if (get_role("admin")) {
                      ?>
                      <li><?=lang("Type")?>: <?=(!empty($row->api_service_id) && $row->api_service_id > 0)? lang("API")." (".$row->api_name.")" : lang("Manual")?></li>
                      <?php }?>
                      <li><?=lang("Link")?>: 
                        <strong>
                          <a href="<?=$row->link?>"><?=$row->link?></a>
                        </strong>
                      </li>
                      <li><?=lang("Quantity")?>: <strong><?=$row->dripfeed_quantity?></strong></li>
                      <li><?=lang("Amount")?>: <strong><?=get_option("currency_symbol").$row->charge?></strong></li>
                      <li><?=lang("Runs")?>: 
                        <strong>
                          <a href="<?php echo cn('dripfeed/order/'.$row->id); ?>"><?=$real_runs?></a> / <?=$row->runs?>
                        </strong>
                      </li>
                      <li><?=lang("interval")?>: <strong><?=$row->interval?></strong></li>
                      <li><?=lang("total_quantity")?>: <strong><?=$row->quantity?></strong></li>
                    </ul>
                  </small>
                </div>
              </td>
              <td><?=convert_timezone($row->created, "user")?></td>
              <td><?=convert_timezone($row->changed, "user")?></td>
              <td>
                <?php
                  if ($row->status == "pending" || $row->status == "inprogress" ) {
                    $btn_background = "btn-info";
                  }elseif($row->status == "completed"){
                    $btn_background = "btn-blue";
                  }else{
                    $btn_background = "btn-danger";
                  }
                ?>
                <span class="btn round btn-sm <?=$btn_background?>"><?=($row->status == 'inprogress') ? lang("Active") : order_status_title($row->status)?></span>
              </td>
              <?php 
                if (get_role("admin")  || get_role('supporter')) {
              ?>
              <td class="text-red"><?=(empty($row->note))? "" : $row->note?></td>
              <td class="text-center">
                <div class="item-action dropdown">
                  <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                  <div class="dropdown-menu">

                    <a href="<?=cn("$module/update/".$row->ids)?>" class="dropdown-item ajaxModal"><i class="dropdown-icon fe fe-edit"></i> <?=lang('Edit')?> </a>

                    <?php
                      if (get_role("admin")) {
                    ?>
                    <a href="<?=cn("$module/ajax_log_delete_item/".$row->ids)?>" class="dropdown-item ajaxDeleteItem"><i class="dropdown-icon fe fe-trash"></i> <?=lang('Delete')?> </a>
                    <?php }?>
                  </div>
                </div>
              </td>
              <?php }?>

            </tr>  
            <?php }}?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="float-right">
      <?=$links?>
    </div>
  </div>
  <?php }else{
    echo Modules::run("blocks/empty_data");
  }?>
</div>
