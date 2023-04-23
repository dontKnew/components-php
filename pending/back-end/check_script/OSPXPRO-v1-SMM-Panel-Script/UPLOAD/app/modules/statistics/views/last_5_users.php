<div class="card">
  <div class="card-header">
    <h3 class="card-title">Last 5 Newest Users</h3>
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
          </td>
          <td><?php echo $row->email; ?></td>
          <td class="text-muted" style="width: 8%;">
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
          </td>
          <td style="width: 10%;">
            <?=(!empty($row->balance)) ? $currency_symbol." ".currency_format($row->balance, get_option('currency_decimal', 2), $decimalpoint, $separator) : 0?>
          </td>
          <td class="text-muted w-10"><?php echo $row->history_ip; ?></td>
          <td class="text-muted" style="width: 7%;"><?=convert_timezone($row->created, 'user')?></td>
          <td class="w-1">
            <?php if(!empty($row->status) && $row->status == 1){?>
              <span class="badge badge-info"><?=lang("Active")?></span>
              <?php }else{?>
              <span class="badge badge-warning"><?=lang("Deactive")?></span>
            <?php }?>
          </td>
        </tr>
        <?php }}?>
        
      </tbody>
    </table>
  </div>
</div>
