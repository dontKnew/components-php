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
              <td> 
                <a href="<?=cn("users/update/".$row->received_user_ids)?>">
                  <?=$row->received_email?>
                </a>
              </td>
              <td>
                <?=$row->sent_by_user_email?>
                <br>
                <small class="text-muted"><?=$row->account_type?></small>
              </td>
              <td><?=truncate_string($row->subject, 35)?></td>
              <td style="width: 35%"><?=htmlspecialchars_decode($row->content, ENT_QUOTES)?></td>

              <td style="width: 8%"><?=convert_timezone($row->created, 'user')?></td>
              <?php
                if (get_role("admin")) {
              ?>
              <td class="text-center" style="width: 6%">
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

  <?php }else{
    echo Modules::run("blocks/empty_data");
  }?>