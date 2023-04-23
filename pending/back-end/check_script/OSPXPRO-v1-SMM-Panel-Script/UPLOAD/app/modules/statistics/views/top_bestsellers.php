<div class="card">
  <div class="card-header">
    <h3 class="card-title">Top bestsellers </h3>
    <div class="card-options">
      <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
      <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
    </div>
  </div>

  <div class="table-responsive">
    
    <?php if (!empty($services)) {
    ?>
    <table class="table table-hover table-bordered table-outline table-vcenter card-table">
      <thead>
        <tr>
          <th class="text-center w-1">ID</th>
          <?php if (!empty($columns)) {
            foreach ($columns as $key => $row) {
          ?>
          <th><?=$row?></th>
          <?php }}?>

        </tr>
      </thead>
      <tbody>
        <?php if (!empty($services)) {
          $decimal_places = get_option('currency_decimal', 2);
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

          $i = 0;
          foreach ($services as $key => $row) {
          $i++;
        ?>
        <tr class="tr_<?=$row->ids?>">
          <td class="text-center text-muted"><?=$row->id?></td>
          <td>
            <div class="title"><?=$row->name?></div>
          </td>
          <?php
            if (get_role('admin')) {
          ?>
          <td class="w-5"><?php echo $row->total_orders; ?></td>

          <td class="text-muted w-5"><?=(!empty($row->add_type) && $row->add_type == "api")? lang("API"): lang('Manual')?></td>
          <td class="text-muted" style="width: 10%;"><?=(!empty($row->api_name))? truncate_string($row->api_name, 20) : ""?></td>
          <td class="text-muted w-5"><?=(!empty($row->api_service_id))? $row->api_service_id: ""?></td>
          <?php }?>
          <td style="width: 8%;">
            <?=currency_format($row->price, $decimal_places, $decimalpoint, $separator)?>
            <?php 
              if (get_role("admin") && isset($row->original_price)) {
                echo '<small class="text-muted"> - '.currency_format($row->original_price, $decimal_places, $decimalpoint, $separator).'</small>';
            }?>
          </td>
          <td style="width: 8%;"><?=$row->min?> / <?=$row->max?></td>
          <td style="width: 6%;">
            <a href="javascript:void(0);" data-ids="<?php echo $row->ids; ?>" class="ajaxGetServiceDescription">
              <span class="btn btn-info btn-sm"><?=lang("Details")?></span> 
            </a>
          </td>
          <?php
            if (get_role('admin')) {
          ?>
          <td class="w-1" >
            <?php if(!empty($row->status) && $row->status == 1){?>
              <span class="badge badge-info"><?=lang("Active")?></span>
              <?php }else{?>
              <span class="badge badge-warning"><?=lang("Deactive")?></span>
            <?php }?>
          </td>  
          <?php }?>
        </tr>
        <?php }}?>
        
      </tbody>
    </table>
    <?php } ?>
  </div>
</div>


