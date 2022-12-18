<section class="page-title">
  <div class="row justify-content-between">
    <div class="col-md-6">
      <h1 class="page-title d-flex">
        <a href="<?=cn("$module/add")?>" class="d-inline-block d-sm-none ajaxModal "><span class="add-new" data-toggle="tooltip" data-placement="bottom" title="<?=lang("add_new")?>" data-original-title="Add new"><i class="fe fe-plus-square text-primary" aria-hidden="true"></i></span></a> 
        <span class="d-none d-sm-block"><i class="fa fa-comments-o text-primary" aria-hidden="true"></i></span> 
        &nbsp;<?=lang("Tickets")?>
      </h1>
    </div>
    <div class="col-md-2">
      <div class="form-group ">
        <select  name="status" class="form-control order_by ajaxChange" data-url="<?=cn($module."/ajax_order_by/")?>">
          <option value="all"> <?=lang("sort_by")?></option>
          <option value="all"> <?=lang("All")?></option>
          <?php 
            $status_array = ticket_status_array();
            if (!empty($status_array)) {
              foreach ($status_array as $row_status) {
          ?>
          <option value="<?=$row_status?>"><?=ticket_status_title($row_status)?></option>
          <?php }}?>
        </select>
      </div>
    </div>
  </div>
</section>

<div class="row justify-content-end">
  <div class="col-md-5 d-none d-sm-block">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <h4 class="modal-title"><i class="fe fe-edit"></i> <?=lang("add_new_ticket")?></h4>
        </h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>

      <div class="card-body o-auto" style="height: calc(100vh - 180px);">
        <form class="form actionForm" action="<?=cn($module."/ajax_add")?>" data-redirect="<?=cn($module)?>" method="POST">
          <div class="form-body" id="add_new_ticket">
            <div class="row justify-content-md-center">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label><?=lang("Subject")?></label>
                  <select name="subject" class="form-control square ajaxChangeTicketSubject">
                    <option value="subject_order"><?=lang("Order")?></option>
                    <option value="subject_payment"><?=lang("Payment")?></option>
                    <option value="subject_service"><?=lang("Service")?></option>
                    <option value="subject_other"><?=lang("Other")?></option>
                  </select>
                </div>

                <div class="form-group subject-order">
                  <label><?=lang("Request")?></label>
                  <select name="request" class="form-control square">
                    <option value="refill"><?=lang("Refill")?></option>
                    <option value="cancellation"><?=lang("Cancellation")?></option>
                    <option value="speed_up"><?=lang("Speed_Up")?></option>
                    <option value="other"><?=lang("Other")?></option>
                  </select>
                </div>

                <div class="form-group subject-order">
                  <label><?=lang("order_id")?></label>
                  <input class="form-control square" type="text" name="orderid" placeholder="<?=lang("for_multiple_orders_please_separate_them_using_comma_example_123451234512345")?>">
                </div>

                <div class="form-group subject-payment d-none">
                  <label><?=lang("Payment")?></label>
                  <select name="payment" class="form-control square">
                    <option value="paypal"><?=lang("Paypal")?></option>
                    <option value="stripe"><?=lang("Stripe")?></option>
                    <option value="twocheckout"><?=lang("2Checkout")?></option>
                    <option value="other"><?=lang("Other")?></option>
                  </select>
                </div>

                <div class="form-group subject-payment d-none">
                  <label><?=lang("Transaction_ID")?></label>
                  <input class="form-control square" type="text" name="transaction_id" placeholder="<?=lang("enter_the_transaction_id")?>">
                  </select>
                </div>
              </div> 
              
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label><?=lang("Description")?></label>
                  <textarea rows="3" id="editor" class="form-control square plugin_editor" name="description"></textarea>
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1"><?=lang('Submit')?></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-7">
    <div class="row" id="result_ajaxSearch">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fe fe-list"></i> <?=lang("Lists")?>
            </h3>
            <div class="card-options">
              <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
              <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
            </div>
          </div>

          <div class="card-body o-auto" style="height: calc(100vh - 180px);">
            
            <?php if(!empty($tickets)){?>
            <div class="ticket-lists">
              <?php
                $is_admin = get_role('admin');
                foreach ($tickets as $key => $row) {
                  $short_name_user = '<i class="fe fe-user"></i>';
                  if (!empty($row->first_name)) {
                    $last_name_user = $row->last_name;
                    $first_name_user = $row->first_name;
                    $short_name_user = $first_name_user[0].$last_name_user[0];
                  }
              ?>
              <div class="item tr_<?=$row->ids?>">
                <a href="<?=cn("$module/".$row->id)?>" class="p-l-5 d-flex text-decoration-none">
                  <div class="media-left p-r-10">
                      <span class="avatar avatar-md">
                        <span class="media-object rounded-circle text-circle text-uppercase <?=$row->status?> "><?=$short_name_user?></span>
                      </span>
                  </div>
                  <div class="content">
                    <div class="subject <?=(isset($row->status) && $row->status == "closed") ? "text-muted" : ""?>">
                      <?="#".$row->id." - ".$row->subject?>
                      <?php
                        $is_unread = false;
                        if ($row->status == 'new' && $is_admin) {
                          $is_unread = true;
                        }
                        if (!$is_unread) {
                          $is_unread = check_unread_ticket($row->id);
                        }
                      ?>
                      <?php if($is_unread){
                      ?>
                      <span class="badge badge-warning"><?=lang("Unread")?></span>
                      <?php }?>
                    </div>
                    <div class="email"><?=$row->first_name." ".$row->last_name." - ".$row->user_email?></div>
                    <div class="time">
                      <small><?=convert_timezone($row->changed, 'user')?> </small>
                    </div>
                  </div>
                </a>

                <div class="action item-action dropdown m-t-10">
                  <?php
                    $button_type = "btn-info";
                    if (!empty($row->status)) {
                      switch ($row->status) {
                        case 'pending':
                          $button_type = "btn-primary";
                          break;
                        case 'closed':
                          $button_type = "btn-gray";
                          break;
                        case 'new':
                          $button_type = "btn-info";
                          break;
                      }
                    }
                  ?>
                  <a href="javascript:void(0)"class="m-r-5">
                    <span class="btn <?=$button_type?> btn-sm"><small><?=ticket_status_title($row->status)?></small>
                    </span>
                  </a>
                  <?php 
                  if(get_role("admin") || get_role('supporter')) {?>
                  <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a href="javascript:void(0)" data-url="<?=cn($module."/ajax_change_status/".$row->ids)?>" data-status="new" class="ajaxChangeStatus dropdown-item"> <i class="dropdown-icon fe fe-mail"></i> <?=lang("mark_as_new")?></a>

                    <a href="javascript:void(0)" data-url="<?=cn($module."/ajax_change_status/".$row->ids)?>" data-status="pending" class="ajaxChangeStatus dropdown-item"> <i class="dropdown-icon fa fa-envelope-open"></i> <?=lang("mark_as_pending")?></a>

                    <a href="javascript:void(0)" data-url="<?=cn($module."/ajax_change_status/".$row->ids)?>" data-status="closed" class="ajaxChangeStatus dropdown-item"> <i class="dropdown-icon fe fe-unlock"></i> <?=lang("mark_as_closed")?></a>
                    <?php 
                      if (get_role('admin')) {
                    ?>
                    <a href="<?=cn("$module/ajax_delete_item/".$row->ids)?>" class="ajaxDeleteItem dropdown-item"> <i class="dropdown-icon fe fe-trash"></i> <?=lang("Delete")?></a>
                    <?php }?>
                  </div>
                  <?php }?>
                </div>
                <div class="clearfix"></div>
              </div>
              <?php }?>
            </div>
            <?php }else{
              echo Modules::run("blocks/empty_data");
            }?>  
          </div>
        </div>
      </div>
      <?php if(!empty($tickets)){?>
      <div class="col-md-12">
        <div class="float-right">
          <?=$links?>
        </div>
      </div>
      <?php } ?> 
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    plugin_editor('.plugin_editor', {height: 200});
  });
</script>


