<section class="add-funds m-t-30">   
  <div class="container-fluid">
    <div class="row justify-content-md-center" id="result_ajaxSearch">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="card-title text-uppercase"><?php echo lang("coinbase_confirm_form"); ?></h3>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <form method="post" action="<?php echo cn($module."/coinbase/create_payment"); ?>">
                <div class="form-group">
                  <label class="form-label"><?php echo lang("total_amount_usd_includes_fee"); ?></label>
                  <input type="text" class="form-control" value="<?=$amount?>" disabled>
                  <input type="hidden" class="form-control" name="amount" value="<?=$amount?>">
                </div>
                <div class="form-group">
                    
                    
                  
                    
                  <p class="text-info"><?php echo lang("note"); ?> <?php echo lang('coinbase_confirm_form_note'); ?></p>
                </div>

                <!-- submit button -->
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <input type="submit" class="btn btn-primary btn-lg btn-block" name="PAYMENT_METHOD" value="<?php echo lang("Submit"); ?>">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


