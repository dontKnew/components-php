
    <div class="card content">
      <div class="card-header">
        <h3 class="card-title"><i class="fe fe-credit-card"></i> <?=lang("payment_integration")?></h3>
      </div>
      <div class="card-body">
        <form class="actionForm" action="<?=cn("$module/ajax_general_settings")?>" method="POST" data-redirect="<?=cn($module."?t=".$tab)?>">
          <div class="row">

            <div class="col-md-12 col-lg-12">
              
              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("transaction_limits")?></h5>
              <div class="form-group">
                <label for="form-label"><?=lang("minimum_amount")?></label>
                <input class="form-control" name="payment_transaction_min" value="<?=get_option("payment_transaction_min", 10)?>">
              </div>

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("Environment")?></h5>
              <div class="form-group">
                <select  name="payment_environment" class="form-control square">
                  <option value="sandbox" <?=(get_option("payment_environment", "sandbox") == 'sandbox')? 'selected': ''?>><?=lang("sandbox_test")?></option>
                  <option value="live" <?=(get_option("payment_environment", "sandbox") == 'live')? 'selected': ''?>><?=lang("Live")?></option>
                </select>
              </div>

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("Paypal")?></h5>

              <div class="form-group">
                <div class="form-label"><?=lang("Status")?></div>
                <div class="custom-controls-stacked">
                  <label class="custom-control custom-checkbox">
                    <input type="hidden" name="is_active_paypal" value="0">
                    <input type="checkbox" class="custom-control-input" name="is_active_paypal" value="1" <?=(get_option('is_active_paypal', "") == 1)? "checked" : ''?>>
                    <span class="custom-control-label"><?=lang("Active")?></span>
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label class="form-label"><?=lang("transaction_fee")?></label>
                <select name="paypal_chagre_fee" class="form-control square">
                  <?php
                    for ($i = 0; $i <= 10; $i++) {
                  ?>
                  <option value="<?=$i?>" <?=(get_option("paypal_chagre_fee", 4) == $i)? "selected" : ''?>><?=$i?>%</option>
                  <?php } ?>
                </select>
              </div>


              <div class="form-group">
                <label class="form-label"><?=lang("paypal_client_id")?></label>
                <input class="form-control" name="paypal_client_id" value="<?=get_option('paypal_client_id',"")?>">
              </div>

              <div class="form-group">
                <label class="form-label"><?=lang("paypal_client_secret")?></label>
                <input class="form-control" name="paypal_client_secret" value="<?=get_option('paypal_client_secret',"")?>">
              </div>

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("Stripe")?></h5>

              <div class="form-group">
                <div class="form-label"><?=lang("Status")?></div>
                <div class="custom-controls-stacked">
                  <label class="custom-control custom-checkbox">
                    <input type="hidden" name="is_active_stripe" value="0">
                    <input type="checkbox" class="custom-control-input" name="is_active_stripe" value="1" <?=(get_option('is_active_stripe', "") == 1)? "checked" : ''?>>
                    <span class="custom-control-label"><?=lang("Active")?></span>
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label class="form-label"><?=lang("transaction_fee")?></label>
                <select name="stripe_chagre_fee" class="form-control square">
                  <?php
                    for ($i = 0; $i <= 10; $i++) {
                  ?>
                  <option value="<?=$i?>" <?=(get_option("stripe_chagre_fee", 4) == $i)? "selected" : ''?>><?=$i?>%</option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label class="form-label"><?=lang("publishable_key")?></label>
                <input class="form-control" name="stripe_publishable_key" value="<?=get_option('stripe_publishable_key',"")?>">
              </div>

              <div class="form-group">
                <label class="form-label"><?=lang("secret_key")?></label>
                <input class="form-control" name="stripe_secret_key" value="<?=get_option('stripe_secret_key',"")?>">
              </div>
			  
				<h5 class="text-info"><i class="fe fe-link"></i> <?=lang("RazorPay")?></h5>

              <div class="form-group">
                <div class="form-label"><?=lang("Status")?></div>
                <div class="custom-controls-stacked">
                  <label class="custom-control custom-checkbox">
                    <input type="hidden" name="is_active_razor_pay" value="0">
                    <input type="checkbox" class="custom-control-input" name="is_active_razor_pay" value="1" <?=(get_option('is_active_razor_pay', "") == 1)? "checked" : ''?>>
                    <span class="custom-control-label"><?=lang("Active")?></span>
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label class="form-label"><?=lang("transaction_fee")?></label>
                <select name="razor_pay_chagre_fee" class="form-control square">
                  <?php
                    for ($i = 0; $i <= 10; $i++) {
                  ?>
                  <option value="<?=$i?>" <?=(get_option("razor_pay_chagre_fee", 4) == $i)? "selected" : ''?>><?=$i?>%</option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label class="form-label"><?=lang("publishable_key")?></label>
                <input class="form-control" name="razor_pay_publishable_key" value="<?=get_option('razor_pay_publishable_key',"")?>">
              </div>

              <div class="form-group">
                <label class="form-label"><?=lang("secret_key")?></label>
                <input class="form-control" name="razor_pay_secret_key" value="<?=get_option('razor_pay_secret_key',"")?>">
              </div>

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("2Checkout")?></h5 class="text-info">
              <div class="form-group">
                <div class="form-label"><?=lang("Status")?></div>
                <div class="custom-controls-stacked">
                  <label class="custom-control custom-checkbox">
                    <input type="hidden" name="is_active_2checkout" value="0">
                    <input type="checkbox" class="custom-control-input" name="is_active_2checkout" value="1" <?=(get_option('is_active_2checkout', "") == 1)? "checked" : ''?>>
                    <span class="custom-control-label"><?=lang("Active")?></span>
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label class="form-label"><?=lang("transaction_fee")?></label>
                <select name="twocheckout_chagre_fee" class="form-control square">
                  <?php
                    for ($i = 0; $i <= 10; $i++) {
                  ?>
                  <option value="<?=$i?>" <?=(get_option("twocheckout_chagre_fee", 4) == $i)? "selected" : ''?>><?=$i?>%</option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label class="form-label"><?=lang("publishable_key")?></label>
                <input class="form-control" name="2checkout_publishable_key" value="<?=get_option('2checkout_publishable_key',"")?>">
              </div>

              <div class="form-group">
                <label class="form-label"><?=lang("private_key")?></label>
                <input class="form-control" name="2checkout_private_key" value="<?=get_option('2checkout_private_key',"")?>">
              </div>

              <div class="form-group">
                <label class="form-label"><?=lang("2checkout_account_number_sellerid")?></label>
                <input class="form-control" name="2checkout_seller_id" value="<?=get_option('2checkout_seller_id',"")?>">
              </div> 

              <h5 class="text-info"><i class="fe fe-link"></i> <?=lang("manual_payment")?></h5 class="text-info">
              <div class="form-group">
                <div class="form-label"><?=lang("Status")?></div>
                <div class="custom-controls-stacked">
                  <label class="custom-control custom-checkbox">
                    <input type="hidden" name="is_active_manual" value="0">
                    <input type="checkbox" class="custom-control-input" name="is_active_manual" value="1" <?=(get_option('is_active_manual', "") == 1)? "checked" : ''?>>
                    <span class="custom-control-label"><?=lang("Active")?></span>
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label"><?=lang("Content")?></label>
                <textarea rows="3" name="manual_payment_content" id="manual_payment_content" class="form-control plugin_editor"><?=get_option('manual_payment_content', lang("you_can_make_a_manual_payment_to_cover_an_outstanding_balance_you_can_use_any_payment_method_in_your_billing_account_for_manual_once_done_open_a_ticket_and_contact_with_administrator"))?>
                </textarea>
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
    <script>
      $(document).ready(function() {
        plugin_editor('.plugin_editor', {height: 200, toolbar: 'code'});
      });
    </script>
