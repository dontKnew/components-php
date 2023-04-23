<style>
  .action-options{
    margin-left: auto;
  }  
</style>

<form class="actionForm"  method="POST">
<div class="page-header">
  <h1 class="page-title">
    <i class="fe fe-calendar" aria-hidden="true"></i></span>
      <?=lang("user_activity_logs")?>
  </h1>
  <div class="page-options d-flex">
    <?php
      if (get_role("admin")) {
    ?>
    <div class="form-group d-flex">
      <div class="item-action dropdown action-options">
        <button type="button" class="btn btn-pill btn-outline-info dropdown-toggle" data-toggle="dropdown">
           <i class="fe fe-menu mr-2"></i> <?=lang("Action")?>
        </button>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item ajaxActionOptions" href="<?=cn($module.'/ajax_actions_option')?>" data-type="delete"><i class="fe fe-trash-2 text-danger mr-2"></i> <?=lang('Delete')?></a>
          <a class="dropdown-item ajaxActionOptions" href="<?=cn($module.'/ajax_actions_option')?>" data-type="clear_all"><i class="fe fe-trash-2 text-danger mr-2"></i> <?=lang('Clear_all')?></a>
        </div>
      </div>
    </div>
    <?php }?>
  </div>
</div>
<div class="row" id="result_ajaxSearch">
  <?php if (!empty($user_logs)) {
  ?>
  <div class="col-md-12 col-xl-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?=lang('Lists')?></h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-bordered table-outline table-vcenter card-table">
          <thead>
            <tr>
              <th class="text-center w-1">
                <div class="custom-controls-stacked">
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input check-all" data-name="chk_1">
                    <span class="custom-control-label"></span>
                  </label>
                </div>
              </th>
              <th class="text-center w-1"><?=lang('No_')?></th>
              <?php if (!empty($columns)) {
                foreach ($columns as $key => $row) {
              ?>
              <th><?=$row?></th>
              <?php }}?>
              
              <?php
                if (get_role("admin")) {
              ?>
              <th class="text-center"><?=lang('Action')?></th>
              <?php }?>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($user_logs)) {
              $i = 0;
              foreach ($user_logs as $key => $row) {
              $i++;
            ?>
            <tr class="tr_<?=$row->ids?>">
              <th class="text-center w-1">
                <div class="custom-controls-stacked">
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input chk_1"  name="ids[]" value="<?=$row->ids?>">
                    <span class="custom-control-label"></span>
                  </label>
                </div>
              </th>
              <td><?=$i?></td>
              <td> 
                <a href="<?=cn("users/update/".$row->user_ids)?>">
                  <?=$row->first_name." ". $row->last_name?>
                </a>
              </td>
              <td><?=$row->user_email?></td>
              <td><?=$row->account_type?></td>
              <td><?=($row->type == 1) ? lang('Check_in') : lang('Check_out')?></td>
              <td><?=$row->ip?></td>
              <td><?=$row->country?></td>

              <td><?=convert_timezone($row->created, 'user')?></td>
              <?php
                if (get_role("admin")) {
              ?>
              <td class="text-center">
                <div class="item-action dropdown">
                  <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?=cn("$module/ajax_delete_item/".$row->ids)?>" class="dropdown-item ajaxDeleteItem"><i class="dropdown-icon fe fe-trash"></i> <?=lang('Delete')?> </a>
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
</form>