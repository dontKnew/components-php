<div id="paytm" class="tab-pane fade">
  <form class="form actionForm" action="<?=cn($module."/process")?>" data-redirect="<?=cn($module."/paytm")?>" method="POST">
    <div class="row">
      <div class="col-md-12">


        <div class="for-group text-center">
          <img src="<?=BASE?>/assets/images/paytm.jpg" alt="2checkout icon">
          <p class="p-t-10"><small><?=sprintf(lang("you_can_deposit_funds_with_paypal_they_will_be_automaticly_added_into_your_account"), 'Paytm')?></small></p>
        </div>

        <div class="form-group">
          <label><?=sprintf(lang("amount_usd"), 'INR')?></label>
          <input class="form-control square" type="number" name="amount" placeholder="5000" id="">
          <input type="hidden" name="payment_method" value="paytm">
        </div>

        <div class="form-group">
          <small class=""><?=lang("transaction_fee")?>: <strong><?=(get_option("paytm_chagre_fee", 4))?>%</strong></small>
        </div>

        <div class="form-group">
          <label class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="agree" value="1">
            <span class="custom-control-label"><?=lang("yes_i_understand_after_the_funds_added_i_will_not_ask_fraudulent_dispute_or_chargeback")?></span>
          </label>
        </div>
        
        <div class="form-actions left">
          <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1">
            <?=lang("Pay")?>
          </button>
        </div>

      </div>  
    </div>
  </form>
</div>