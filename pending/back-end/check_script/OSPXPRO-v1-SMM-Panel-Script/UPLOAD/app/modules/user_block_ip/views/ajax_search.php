<?php if(!empty($block_ip_list)){ ?>
<div class="col-md-12 col-xl-12">
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
            <?php
              if (get_role("admin")) {
            ?>
            <th class="text-center w-1">
              <div class="custom-controls-stacked">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input check-all" data-name="chk_1">
                  <span class="custom-control-label"></span>
                </label>
              </div>
            </th>
            <?php }?>
            <th class="text-center w-1"><?=lang("No_")?></th>
            <?php if (!empty($columns)) {
              foreach ($columns as $key => $row) {
            ?>
            <th><?=$row?></th>
            <?php }}?>
            
            <?php
              if (get_role("admin")) {
            ?>
            <th><?=lang("Action")?></th>
            <?php }?>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($block_ip_list)) {
            $i = $from = 0;
            foreach ($block_ip_list as $key => $row) {
            $i++;
          ?>
          <tr class="tr_<?=$row->ids?>">
            <?php
              if (get_role("admin")) {
            ?>
            <th class="text-center w-1">
              <div class="custom-controls-stacked">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input chk_1"  name="ids[]" value="<?=$row->ids?>">
                  <span class="custom-control-label"></span>
                </label>
              </div>
            </th>
            <?php }?>
            <td  class="text-center"><?=$i?></td>
            <td>
              <div class="title"><?=$row->ip?></div>
            </td>
            <td>
              <strong><?=$row->first_name." ". $row->last_name?></strong>
              <span class="text-muted small">(<?=$row->account_type?>)</span>
            </td>
            <td><?=$row->description?></td>
            <td><?=$row->created?></td>
            <?php
              if (get_role("admin")) {
            ?>
            <td class="text-center">
              <div class="item-action dropdown">
                <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="<?=cn("$module/update/".$row->ids)?>" class="dropdown-item ajaxModal"><i class="dropdown-icon fe fe-edit-2"></i> <?=lang('Edit')?> </a>
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