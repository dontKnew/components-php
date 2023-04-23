    <div class="card content">
      <div class="card-header">
        <h3 class="card-title"><i class="fe fe-credit-card"></i> Coinbase Integration</h3>
      </div>
      <div class="card-body">
        <form class="actionForm" action="<?=cn("$module/ajax_general_settings")?>" method="POST" data-redirect="<?=cn($module."?t=".$tab)?>">
          <div class="row">

            <div class="col-md-12 col-lg-12">
              <div class="form-group">
                <div class="form-label"><?=lang("Status")?></div>
                <div class="custom-controls-stacked">
                  <label class="custom-control custom-checkbox">
                    <input type="hidden" name="is_active_coinbase" value="0">
                    <input type="checkbox" class="custom-control-input" name="is_active_coinbase" value="1" <?=(get_option('is_active_coinbase', "") == 1)? "checked" : ''?>>
                    <span class="custom-control-label"><?=lang("Active")?></span>
                  </label>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?=lang("transaction_fee")?></label>
                    <select name="coinbase_chagre_fee" class="form-control square">
                      <?php
                        for ($i = 0; $i <= 30; $i++) {
                      ?>
                      <option value="<?=$i?>" <?=(get_option("coinbase_chagre_fee", 4) == $i)? "selected" : ''?>><?=$i?>%</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?=lang("minimum_amount")?></label>
                    <input class="form-control" name="coinbase_payment_transaction_min" value="<?=get_option("coinbase_payment_transaction_min", 10)?>">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-label">API Key</label>
                    <input class="form-control" name="coinbase_api_key" value="<?=get_option('coinbase_api_key', "")?>">
                  </div>
                  <div class="form-group">
                    <p class="text-danger">Note: Login to:
                      <a href="https://commerce.coinbase.com/signin" target="_blank">Coinbase Commerce</a> to get API keys
                    </p>
                  </div>
                </div> 
                
                
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
