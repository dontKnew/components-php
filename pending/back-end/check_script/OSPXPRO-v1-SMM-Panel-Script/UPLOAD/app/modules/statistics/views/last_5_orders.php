<?php if(!empty($order_logs)){
?>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Last 5 Orders</h3>
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
          <td><?=$row->user_email?></td>
          <td>
            <?php echo truncate_string($row->service_id." - ".$row->service_name, 37)?> 
          </td>
          <td style="width: 10%;"><?=(!empty($row->api_service_id) && $row->api_service_id != "")? lang("API")." (".truncate_string($row->api_name, 13).")" : lang("Manual")?></td>
          <td>
            <a href="<?php echo $row->link; ?>" target="_blank"><?php echo truncate_string($row->link, 47)?></a>
          <td class="text-muted w-1"><?php echo $row->quantity; ?></td>
          <td class="text-muted w-1"><?php echo $row->charge; ?></td>
          <td class="text-muted" style="width: 7%;"><?=convert_timezone($row->created, "user")?></td>
          <td style="width: 8%;">
            <?php
              if ($row->status == "pending" || $row->status == "processing") {
                $btn_background = "btn-info";
              }elseif ($row->status == "inprogress") {
                $btn_background = "btn-orange";
              }elseif($row->status == "completed"){
                $btn_background = "btn-blue";
              }else{
                $btn_background = "btn-danger";
              }
            ?>
            <span class="btn round btn-sm <?=$btn_background?>"><?=order_status_title($row->status)?></span>
          </td>
        </tr>  
        <?php }}?>
      </tbody>
    </table>
  </div>
</div>
<?php }?>
