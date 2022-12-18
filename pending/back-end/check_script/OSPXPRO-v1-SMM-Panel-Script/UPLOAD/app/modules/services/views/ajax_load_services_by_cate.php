<?php if (!empty($services)) {
?>
<table class="table table-hover table-bordered table-outline table-vcenter card-table">
  <thead>
    <tr>
      <?php
        if (get_role("admin")) {
      ?>
      <th class="text-center w-1">
        <div class="custom-controls-stacked">
          <label class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input check-all" data-name="chk_<?=$cate_id?>">
            <span class="custom-control-label"></span>
          </label>
        </div>
      </th>
      <?php }?>
      <th class="text-center w-1">ID</th>
      <th><?php echo lang("Name"); ?></th>
      <?php if (!empty($columns)) {
        foreach ($columns as $key => $row) {
      ?>
      <th class="text-center"><?=$row?></th>
      <?php }}?>
      
      <?php
        if (get_role("admin") || get_role("supporter")) {
      ?>
      <th><?=lang("Action")?></th>
      <?php }?>
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
      <?php
        if (get_role("admin")) {
      ?>
      <th class="text-center w-1">
        <div class="custom-controls-stacked">
          <label class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input chk_<?=$cate_id?>"  name="ids[]" value="<?=$row->ids?>">
            <span class="custom-control-label"></span>
          </label>
        </div>
      </th>
      <?php }?>
      <td class="text-center text-muted"><?=$row->id?></td>
      <td>
        <div class="title"> <?=$row->name?> </div>
      </td>
      
      <?php
        if (get_role("admin") || get_role("supporter")) {
      ?>
      <td style="width: 10%;">
        <div class="title">
          <?php
            if (!empty($row->add_type && $row->add_type == "api")) {
              echo truncate_string($row->api_name, 13);
            }else{
              echo lang('Manual');
            }
          ?>
        </div>
        <div class="text-muted small">
          <?=(!empty($row->api_service_id))? $row->api_service_id: ""?>
        </div>
      </td>
      <?php }?>
      <td class="text-center" style="width: 8%;">
        <div>
          <?=currency_format($row->price, $decimal_places, $decimalpoint, $separator)?>
        </div>
        <?php 
          if (get_role("admin") && isset($row->original_price)) {
            if ($row->original_price > $row->price) {
              $text_color = "text-danger";
            }else{
              $text_color = "text-muted";
            }
            echo '<small class="'.$text_color.'">'.currency_format($row->original_price, $decimal_places, $decimalpoint, $separator).'</small>';
          }
        ?>
      </td>

      <td class="text-center" style="width: 8%;"><?=$row->min?> / <?=$row->max?></td>

      <td class="text-center" style="width: 6%;">
        <a href="javascript:void(0);" data-ids="<?php echo $row->ids; ?>" class="ajaxGetServiceDescription">
          <span class="btn btn-info btn-sm"><?=lang("Details")?></span> 
        </a>
      </td>

      <?php
        if (get_role("admin") || get_role("supporter")) {
      ?>
      <td class="w-1 text-center">
        <?php if(!empty($row->dripfeed) && $row->dripfeed == 1){?>
          <span class="badge badge-info"><?=lang("Active")?></span>
          <?php }else{?>
          <span class="badge badge-warning"><?=lang("Deactive")?></span>
        <?php }?>
      </td>

      <td class="w-1 text-center" >
        <?php if(!empty($row->status) && $row->status == 1){?>
          <span class="badge badge-info"><?=lang("Active")?></span>
          <?php }else{?>
          <span class="badge badge-warning"><?=lang("Deactive")?></span>
        <?php }?>
      </td>  
      
      <td class="text-center"  style="width: 5%;">
        <div class="item-action dropdown">
          <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
          <div class="dropdown-menu">
            <a href="<?=cn("$module/update/".$row->ids)?>" class="dropdown-item ajaxModal"><i class="dropdown-icon fe fe-edit"></i> <?=lang('Edit')?> </a>
            <?php
              if (get_role("admin")) {
            ?>
            <a href="<?=cn("$module/ajax_delete_item/".$row->ids)?>" class="dropdown-item ajaxDeleteItem"><i class="dropdown-icon fe fe-trash"></i> <?=lang('Delete')?> </a>
            <?php }?>
          </div>
        </div>
      </td>
      <?php }?>

    </tr>
    <?php }}?>
    
  </tbody>
</table>
<?php } ?>

