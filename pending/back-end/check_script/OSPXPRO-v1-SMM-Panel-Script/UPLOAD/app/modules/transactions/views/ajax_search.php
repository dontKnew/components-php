  <?php if (!empty($transactions)) {
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
            <?php if (!empty($transactions)) {
              $i = 0;
              foreach ($transactions as $key => $row) {
              $i++;
            ?>
            <tr class="tr_<?=$row->ids?>">
              <td><?=$i?></td>
              <?php
                if (get_role("admin")) {
              ?>
              <td>
                <div class="title"><?=get_field('general_users', ["id" => $row->uid], "email")?></div>
              </td>
              <?php }?>
              <td>
                <?php
                  switch ($row->transaction_id) {
                    case 'empty':
                      if ($row->type == 'manual') {
                        echo lang($row->transaction_id);
                      }else{
                        echo lang($row->transaction_id)." ".lang("transaction_id_was_sent_to_your_email");
                      }
                      break;

                    default:
                      echo $row->transaction_id;
                      break;
                  }
                ?>
              </td>
              <td class="">
                <img class="payment" src="<?=BASE?>/assets/images/payments/<?=$row->type?>.png" alt="<?=$row->type?> icon">
              </td>
              <td><?=get_option("currency_symbol", '')?><?=$row->amount?></td>
              <td><?=convert_timezone($row->created, 'user')?></td>
              
              <td>
                <?php
                  switch ($row->status) {
                    case 1:
                        echo '<span class="badge badge-default">'.lang('Paid').'</span>';
                      break;

                    case 0:
                        echo '<span class="badge badge-warning">'.lang("waiting_for_buyer_funds").'</span>';
                      break; 

                    case -1:
                        echo '<span class="badge badge-danger">'.lang('cancelled_timed_out').'</span>';
                      break;
                  }
                ?>
              </td>
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
  <?php }else{
    echo Modules::run("blocks/empty_data");
  }?>
