
    <div class="card content">
      <div class="card-header">
        <h3 class="card-title"><i class="fe fe-credit-card"></i> <?=lang("perfect_money_integration")?></h3>
      </div>
      <div class="card-body">
        <form class="actionForm" action="<?=cn("$module/ajax_general_settings")?>" method="POST" data-redirect="<?=cn($module."?t=".$tab)?>">
          <div class="row">

            <div class="col-md-12 col-lg-12">

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("perfect_money")?></h5>

              <div class="form-group">
                <div class="form-label"><?=lang("Status")?></div>
                <div class="custom-controls-stacked">
                  <label class="custom-control custom-checkbox">
                    <input type="hidden" name="is_active_perfectmoney" value="0">
                    <input type="checkbox" class="custom-control-input" name="is_active_perfectmoney" value="1" <?=(get_option('is_active_perfectmoney', "") == 1)? "checked" : ''?>>
                    <span class="custom-control-label"><?=lang("Active")?></span>
                  </label>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label ><?=lang("transaction_fee")?></label>
                    <select name="perfectmoney_chagre_fee" class="form-control square">
                      <?php
                        for ($i = 0; $i <= 10; $i++) {
                      ?>
                      <option value="<?=$i?>" <?=(get_option("perfectmoney_chagre_fee", 4) == $i)? "selected" : ''?>><?=$i?>%</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="form-label"><?=lang("minimum_amount")?></label>
                    <input class="form-control" name="perfectmoney_payment_transaction_min" value="<?=get_option("perfectmoney_payment_transaction_min", 50)?>">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <?php 
                      $currencies_code = ['USD', 'EUR', 'BTC'];
                      $perfect_money_currency_code = get_option("perfect_money_currency_code", 'USD');
                    ?>
                    <label class="form-label">Curency Code</label>
                    <select name="perfect_money_currency_code" class="form-control square ajaxChangeCurrencyCode">
                      <?php
                        foreach ($currencies_code as $row) {
                      ?>
                      <option value="<?php echo $row; ?>" <?php echo ($perfect_money_currency_code == $row) ? "selected" : ''?>><?php echo $row; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

              </div>
              <h5 class="text-info"><i class="fe fe-link"></i> PerfectMoney Wallets</h5>
              <div class="form-group">
                <label class="form-label">USD wallets (USD)</label>
                <input class="form-control" name="perfect_money_account_usd_client_id" value="<?=get_option('perfect_money_account_usd_client_id',"")?>">
              </div>

              <div class="form-group">
                <label class="form-label">EUR wallets (EUR)</label>
                <input class="form-control" name="perfect_money_account_eur_client_id" value="<?=get_option('perfect_money_account_eur_client_id',"")?>">
              </div>

              <div class="form-group">
                <label class="form-label">BTC wallets (BTC)</label>
                <input class="form-control" name="perfect_money_account_btc_client_id" value="<?=get_option('perfect_money_account_btc_client_id',"")?>">
              </div>


            </div> 
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-label" for="form-label">Alternate Passphrase <small>(Alternate Passphrase can be found and set under Settings section in your account.)</small></label>
                <input class="form-control" type="password" name="perfectmoney_alternate_passphrase" value="<?=get_option("perfectmoney_alternate_passphrase", '')?>">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="form-label">Perfect Money API Settings:</label>
                <span class="text-danger"><strong><?=lang('note')?></strong></span>
                <ul class="small">
                  <li> Login to Perfect Money Account </li>
                  <li> Go to <strong>My Account</strong> → <strong>Modify settings</strong> </li>
                  <li> Get <strong>Alternate Passphrase</strong>
                      <ol>
                        <li>Generate Alternate Passphrase</li>
                        <li>Apply Changes</li>
                      </ol>
                  </li>
                  <li>Copy Alternate Passphrase and save it</li>
                </ul>
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
