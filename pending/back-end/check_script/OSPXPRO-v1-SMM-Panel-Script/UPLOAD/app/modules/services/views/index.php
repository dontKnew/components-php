<style>
  .action-options{
    margin-left: auto;
  }  
  .dropdown-item.ajaxActionOptions{
    padding-top: 0px!important;
    padding-bottom: 0px!important;
  }
</style>

<form class="actionForm"  method="POST">
  <section class="page-title">
    <div class="row justify-content-between">
      <div class="col-md-2">
        <h1 class="page-title">
          <?php 
            if(get_role("admin") || get_role("supporter")) {
          ?>
          <a href="<?=cn("$module/update")?>" class="ajaxModal"><span class="add-new" data-toggle="tooltip" data-placement="bottom" title="<?=lang("add_new")?>" data-original-title="Add new"><i class="fa fa-plus-square text-primary" aria-hidden="true"></i></span></a> 
          <?php }else{?>
            <i class="fe fe-list" aria-hidden="true"> </i> 
          <?php }?>
          <?=lang("Services")?>
        </h1>
      </div>
      <div class="col-md-7">
        <?php
          if (get_option("enable_explication_service_symbol")) {
        ?>
        <div class="btn-list">
          <span class="btn round btn-secondary ">⭐ = <?=lang("__good_seller")?></span>
          <span class="btn round btn-secondary ">⚡️ = <?=lang("__speed_level")?></span>
          <span class="btn round btn-secondary ">🔥 = <?=lang("__hot_service")?></span>
          <span class="btn round btn-secondary ">💎 = <?=lang("__best_service")?></span>
          <span class="btn round btn-secondary ">💧 = <?=lang("__drip_feed")?></span>
        </div>
        <?php } ?>
      </div>

      <div class="col-md-3">
        <div class="form-group ">
          <select  name="status" class="form-control order_by ajaxChange" data-url="<?=cn($module."/ajax_service_sort_by_cate/")?>">
            <option value="all"> <?=lang("sort_by")?></option>
            <?php 
              if (!empty($categories)) {
                foreach ($categories as $key => $category) {
            ?>
            <option value="<?=$category->id?>"><?=$category->name?></option>
            <?php }}?>
          </select>
        </div>
      </div>
      <?php
        if (get_role("admin")) {
      ?>
      <div class="col-12">
        <div class="form-group d-flex">
          <div>
            <a href="<?=cn('api_provider/services')?>" class="btn btn-secondary ">Import Services</a>
          </div>
          <div class="item-action dropdown action-options">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
               <i class="fe fe-menu mr-2"></i> Actions
            </button>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item ajaxActionOptions" href="<?=cn($module.'/ajax_actions_option')?>" data-type="delete"><i class="fe fe-trash-2 text-danger mr-2"></i> <?=lang("Delele")?></a>
              <a class="dropdown-item ajaxActionOptions" href="<?=cn($module.'/ajax_actions_option')?>" data-type="all_deactive"><i class="fe fe-trash-2 text-danger mr-2"></i> <?=lang("all_deactivated_services")?></a>
              <a class="dropdown-item ajaxActionOptions" href="<?=cn($module.'/ajax_actions_option')?>" data-type="deactive"><i class="fe fe-x-square text-danger mr-2"></i> <?=lang("Deactive")?></a>   
              <a class="dropdown-item ajaxActionOptions" href="<?=cn($module.'/ajax_actions_option')?>" data-type="active"><i class="fe fe-check-square text-success mr-2"></i> <?=lang("Active")?></a>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
     
    </div>
  </section>

  <div class="row m-t-5" id="result_ajaxSearch">
    <?php if(!empty($all_services)){
      foreach ($all_services as $key => $category) {
        if ($category->is_exists_services) {
    ?>
    <div class="col-md-12 col-xl-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?=$category->name?></h3>
          <div class="card-options">
            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
          </div>
        </div>
        <?php 
          if ($category->is_exists_services) {
          $services = (isset($category->services))? $category->services : "";
        ?>
        <div class="table-responsive dimmer ajaxLoadServices_<?=$category->id?>" data-url="<?=cn($module."/ajax_load_services_by_cate/".$category->id)?>">
          <div class="loader"></div>
          <table class="dimmer-content table table-hover table-bordered table-outline table-vcenter card-table">
          </table>
        </div>
        <script type="text/javascript">
          $(function() {
            var _that       = $(".ajaxLoadServices_<?=$category->id?>");
                _action     = _that.data("url");
                _data       = $.param({token:token});
            $.post( _action, _data, function(_result){
              $(_that).html(_result);
              if (_that.hasClass('active')) {
                _that.removeClass('active');
              }
            });
          });
        </script>

        <?php }?>
      </div>
    </div>
    <?php }}}else{
      echo Modules::run("blocks/empty_data");
    }?>
    
  </div>
</form>