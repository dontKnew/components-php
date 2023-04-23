<div id="main-modal-content">
  <div class="modal-right">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <?php
          $ids = (!empty($user->ids))? $user->ids: '';
          if ($ids != "") {
            $url = cn($module."/ajax_add_funds_manualy/$ids");
          }else{
            $url = cn($module."/ajax_add_funds_manualy");
          }
        ?>
        <form class="form actionForm" action="<?=$url?>" data-redirect="<?=cn($module)?>" method="POST">
          <div class="modal-header bg-pantone">
            <h4 class="modal-title"><i class="fe fe-edit"></i> <?=lang("Add_Funds")?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <div class="form-body">
              <div class="row justify-content-md-center">
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?=lang('email')?></label>
                    <input type="text" class="form-control square" name="email_to" value="<?=(!empty($user->email) && $user->email != "") ? $user->email : ''?>" disabled>
                  </div>
                </div>     

                <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?=lang("first_name")?></label>
                    <input type="text" class="form-control square" name="first_name" value="<?=(!empty($user->first_name) && $user->first_name != "") ? $user->first_name : ''?>" disabled>
                  </div>
                </div> 

                <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?=lang("last_name")?></label>
                    <input type="text" class="form-control square" name="last_name" value="<?=(!empty($user->last_name) && $user->last_name != "") ? $user->last_name : ''?>" disabled>
                  </div>
                </div> 

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?=lang('Payment_method')?></label>
                    <select name="payment_method" class="form-control square">
                      <option value="manual">Bank/Other (Manual Payment)</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?=lang("Funds")?></label>
                    <input type="text" class="form-control square" name="funds">
                  </div>
                </div> 

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?=lang('Transaction_ID')?></label>
                    <input type="text" class="form-control square" name="tranaction_id">
                  </div>
                </div>  

              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary"><?=lang('Submit')?></button>
            <button type="button" class="btn btn-round btn-default" data-dismiss="modal"><?=lang('Cancel')?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
