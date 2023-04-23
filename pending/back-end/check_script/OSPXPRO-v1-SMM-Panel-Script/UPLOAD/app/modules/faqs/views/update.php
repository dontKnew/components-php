<?php
  $ids = (!empty($faq->ids))? $faq->ids: '';
  if ($ids != "") {
    $url = cn($module."/ajax_update/$ids");
  }else{
    $url = cn($module."/ajax_update");
  }
?>

<div class="row justify-content-md-center">
  <div class="col-md-10">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> <span><i class="fe fe-edit"></i></span> Add/Edit FAQ</h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="card-body">
        <form class="form actionForm" action="<?php echo strip_tags($url); ?>" data-redirect="<?php echo cn("$module/update/".$ids); ?>" method="POST">
          <div class="form-body">
            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label><?php echo lang("Question"); ?></label>
                  <input type="text" class="form-control square" name="question" value="<?php echo (!empty($faq->question)) ? strip_tags($faq->question) : ''; ?>">
                </div>
              </div>  

              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="eventRegInput1"><?php echo lang("Default_sorting_number"); ?></label>
                  <input type="number" class="form-control square" name="sort" value="<?php echo (!empty($faq->sort)) ? $faq->sort : ''; ?>">
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label><?php echo lang("Status"); ?></label>
                  <select name="status" class="form-control square">
                    <option value="1" <?php echo (!empty($faq->status) && $faq->status == 1) ? 'selected' : ''; ?>><?php echo lang("Active"); ?></option>
                    <option value="0" <?php echo (isset($faq->status) && $faq->status != 1) ? 'selected' : '';?>><?php echo lang("Deactive"); ?></option>
                  </select>
                </div>
              </div> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label><?php echo lang("Answer"); ?></label>
                  <textarea rows="3" class="form-control square plugin_editor" name="answer" placeholder="About Project"><?php echo (!empty($faq->answer)) ? html_entity_decode($faq->answer, ENT_QUOTES) : '';?></textarea>
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-primary btn-min-width mr-1 mb-1"><?php echo lang('Save'); ?></button>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div> 
</div>

<script>
  $(document).ready(function() {
    plugin_editor('.plugin_editor', {height: 500});
  });
</script>