
    <div class="card content">
      <div class="card-header">
        <h3 class="card-title"><i class="fe fe-credit-card"></i> <?=lang("Paytm_QR_Integration")?></h3>
      </div>
      <div class="card-body">
        <form class="actionForm" action="<?=cn("$module/ajax_general_settings")?>" method="POST" data-redirect="<?=cn($module."?t=".$tab)?>">
          <?php if(!empty(get_option('paytm_qr_image',""))) {?>
          <center><img width="20%" src="<?=get_option('paytm_qr_image',"")?>" ></center>
          <?php }?>
          <div class="row">

            <div class="col-md-12 col-lg-12">
              <div class="form-group">
                <div class="form-label"><?=lang("Status")?></div>
                <div class="custom-controls-stacked">
                  <label class="custom-control custom-checkbox">
                    <input type="hidden" name="is_active_paytm" value="0">
                    <input type="checkbox" class="custom-control-input" name="is_active_paytmqr" value="1" <?=(get_option('is_active_paytmqr', "") == 1)? "checked" : ''?>>
                    <span class="custom-control-label"><?=lang("Active")?></span>
                  </label>
                </div>
              </div>

              <div class="row">
                <div style="display: none;" class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?=lang("transaction_fee")?></label>
                    <select type="hidden" name="paytm_qr_chagre_fee" class="form-control square">
                      <option  value="0">0%</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?=lang("currency_rate")?></label>
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text">1USD =</span>
                      </span>
                      <input type="text" class="form-control text-right" name="paytm_qr_currency_rate_to_usd" value="<?=get_option('paytm_qr_currency_rate_to_usd', 70)?>">
                      <span class="input-group-append">
                        <span class="input-group-text">INR</span>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="form-label"><?=lang("paytm_QR_image_link")?></label>
                <input class="form-control" name="paytm_qr_image" value="<?=get_option('paytm_qr_image',"")?>">
              </div>

              <div class="form-group">
                <label class="form-label"><?=lang("Paytm_mid_merchant_id")?></label>
                <input class="form-control" name="paytm_qr_merchant_id" value="<?=get_option('paytm_qr_merchant_id',"")?>">
              </div>

            </div> 
            <div class="col-md-12 col-lg-12">
              <div class="form-footer">
                <button class="btn btn-primary btn-min-width btn-lg text-uppercase"><?=lang("Save")?></button>
              </div>
            </div>

          </div>
        </form>
      </div>
    </div>
