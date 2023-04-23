<?php if(!empty($users)){ ?>
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
      <table class="table table-hover table-bordered table-vcenter card-table">
        <thead>
          <tr>
            <th class="text-center w-1"><?=lang("No_")?></th>
            <?php if (!empty($columns)) {
              foreach ($columns as $key => $row) {
            ?>
            <th><?=$row?></th>
            <?php }}?>
            
            <?php
              if (!get_role("user")) {
            ?>
            <th><?=lang('Action')?></th>
            <?php }?>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($users)) {
            $i = 0;
            $currency_symbol = get_option('currency_symbol', '$');
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
              
            foreach ($users as $key => $row) {
            $i++;
          ?>
          <tr class="tr_<?=$row->ids?>">
            <td><?=$i?></td>
            <td>
              <div class="title"><h6><?=$row->first_name ." ".$row->last_name?></h6></div>
              <div class="sub"><small><?=$row->email?></small></div>
              <div class="sub">
                <small>
                  <?php
                    switch ($row->role) {
                      case 'admin':
                          echo lang("admin");
                        break;
                      case 'supporter':
                          echo lang("Supporter");
                        break;
                      default:
                        echo lang("regular_user");
                        break;
                    }
                  ?>
                </small>
              </div>
            </td>
            <td>
              <?=(!empty($row->balance)) ? $currency_symbol." ".currency_format($row->balance, get_option('currency_decimal', 2), $decimalpoint, $separator) : 0?>
            </td>
            <td><?=$row->custom_rate?>%</td>
            <td><?=$row->desc?></td>
            <td><?=$row->created?></td>
            <td>
              <?php if(!empty($row->status) && $row->status == 1){?>
                <span class="btn round btn-info btn-sm"><?=lang('Active')?></span>
                <?php }else{?>
                <span class="btn round btn-warning btn-sm"><?=lang('Deactive')?></span>
              <?php }?>
            </td>

            <?php
              if (get_role("admin") || get_role('supporter')) {
            ?>
            <td class="text-center">
              <div class="item-action dropdown">
                <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                <div class="dropdown-menu">

                  <?php
                    if (get_role("admin")) {
                  ?>
                  <a class="dropdown-item" href="<?=cn("$module/update/".$row->ids)?>"><i class="dropdown-icon fe fe-edit"></i> <?=lang('edit')?>
                  </a>

                  <a class="dropdown-item ajaxViewUser" href="<?=cn("$module/view_user/".$row->ids)?>"><i class="dropdown-icon fe fe-eye"></i> <?=lang('view_user')?>
                  </a>

                  <a class="dropdown-item ajaxDeleteItem" href="<?=cn("$module/ajax_delete_item/".$row->ids)?>"><i class="dropdown-icon fe fe-trash"></i> <?=lang('Delete')?>
                  </a>
                  <?php }?>
                  <a class="dropdown-item ajaxModal" href="<?=cn("$module/mail/".$row->ids)?>">
                    <i class="dropdown-icon fe fe-mail"></i> <?=lang("send_mail")?>
                  </a>
                  <a class="dropdown-item ajaxModal" href="<?=cn("$module/add_funds_manual/".$row->ids)?>">
                    <i class="dropdown-icon fe fe-dollar-sign"></i> <?=lang("Add_Funds")?>
                  </a>
                 
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