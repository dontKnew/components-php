<style>
  .action-options{
    margin-left: auto;
  }  
</style>

<form class="actionForm"  method="POST">

<div class="page-header">
  <h1 class="page-title">
    <?php 
      if(get_role("admin")  || get_role("supporter")) {
    ?>
    <a href="<?=cn("$module/update")?>" class="ajaxModal"><span class="add-new" data-toggle="tooltip" data-placement="bottom" title="<?=lang("add_new")?>" data-original-title="Add new"><i class="fa fa-plus-square text-primary" aria-hidden="true"></i></span></a> 
    <?php }?>
    <?=lang("Category")?>
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
          <a class="dropdown-item ajaxActionOptions" href="<?=cn($module.'/ajax_actions_option')?>" data-type="delete"><i class="fe fe-trash-2 text-danger mr-2"></i> <?=lang("Delete")?></a>
          <a class="dropdown-item ajaxActionOptions" href="<?=cn($module.'/ajax_actions_option')?>" data-type="all_deactive"><i class="fe fe-trash-2 text-danger mr-2"></i> <?=lang("all_deactivated_categories")?></a>
          <a class="dropdown-item ajaxActionOptions" href="<?=cn($module.'/ajax_actions_option')?>" data-type="deactive"><i class="fe fe-x-square text-danger mr-2"></i> <?=lang('Deactive')?></a>   
          <a class="dropdown-item ajaxActionOptions" href="<?=cn($module.'/ajax_actions_option')?>" data-type="active"><i class="fe fe-check-square text-success mr-2"></i> <?=lang('Active')?></a>
        </div>
      </div>
    </div>
    <?php }?>
  </div>
</div>  

<div class="row" id="result_ajaxSearch">
  <?php if(!empty($categories)){
  ?>
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
                if (get_role("admin")  || get_role("supporter")) {
              ?>
              <th class="text-center"><?=lang("Action")?></th>
              <?php }?>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($categories)) {
              $i = $from;
              foreach ($categories as $key => $row) {
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
                <div class="title"><?=$row->name?></div>
              </td>
              <td><?php echo html_entity_decode($row->desc, ENT_QUOTES); ?></td>
              <td><?=$row->sort?></td>
              <td>
                <?php if(!empty($row->status) && $row->status == 1){?>
                  <span class="badge badge-info"><?=lang("Active")?></span>
                  <?php }else{?>
                  <span class="badge badge-warning"><?=lang("Deactive")?></span>
                <?php }?>
              </td>

              <?php
                if (get_role("admin") || get_role("supporter")) {
              ?>
              <td class="text-center">
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