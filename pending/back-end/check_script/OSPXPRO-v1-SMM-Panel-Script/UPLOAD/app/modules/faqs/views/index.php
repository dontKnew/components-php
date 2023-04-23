
<div class="page-header">
  <?php 
  if(get_role("admin")  || get_role("supporter")) {
  ?>
  <h1 class="page-title">
    <a href="<?php echo cn("$module/update"); ?>" class="btn-add-new">
      <span class="add-new"><i class="fa fa-plus-square text-primary" aria-hidden="true"></i></span>
      <?php echo lang("FAQs"); ?>
    </a>
  </h1>
  <?php }?>
</div>

<div class="row" id="result_ajaxSearch">
  <?php if(!empty($faqs)){
  ?>
  <div class="col-md-12 col-xl-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?php echo lang("Lists"); ?></h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-bordered table-vcenter card-table">
          <thead>
            <tr>
              <th class="text-center w-1"><?php echo lang("No_"); ?></th>
              <?php if (!empty($columns)) {
                foreach ($columns as $key => $row) {
              ?>
              <th><?php echo strip_tags($row); ?></th>
              <?php }}?>
              
              <?php
                if (!get_role("user")) {
              ?>
              <th class="text-center"><?php echo lang('Action'); ?></th>
              <?php }?>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($faqs)) {
              $i = 0;
              $currency_symbol = get_option('currency_symbol', '$');
              foreach ($faqs as $key => $row) {
              $i++;
            ?>
            <tr class="tr_<?php echo strip_tags($row->ids); ?>">
              <td><?php echo strip_tags($i); ?></td>
              <td class="w-25">
                <div class="title"><?php echo truncate_string(strip_tags($row->question), 30); ?></div>
              </td>
              <td class="text-muted">
                <?php
                  $answer = html_entity_decode($row->answer, ENT_QUOTES);
                  $answer = strip_tag_css($answer);
                ?>
                <?php echo truncate_string($answer, 150); ?>
              </td>
              <td class="w-10"><?php echo convert_timezone($row->created, 'user'); ?></td>
              <td><?php echo strip_tags($row->sort); ?></td>
              <td class="w-10">
                <?php if(!empty($row->status) && $row->status == 1){?>
                  <span class="badge badge-info"><?php echo lang("Active"); ?></span>
                  <?php }else{?>
                  <span class="badge badge-warning"><?php echo lang("Deactive"); ?></span>
                <?php }?>
              </td> 
              <td class="text-center">
                <div class="btn-group">
                  <a href="<?php echo cn($module."/update/".$row->ids); ?>" class="btn btn-icon btn-outline-primary" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("Edit"); ?>"><i class="fe fe-edit"></i></a>
                  <a href="<?php echo cn("$module/ajax_delete_item/".$row->ids); ?>" class="btn btn-icon btn-outline-danger ajaxDeleteItem" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("Delete"); ?>"><i class="fe fe-trash-2"></i></a>
                </div>
              </td>
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
</div>

