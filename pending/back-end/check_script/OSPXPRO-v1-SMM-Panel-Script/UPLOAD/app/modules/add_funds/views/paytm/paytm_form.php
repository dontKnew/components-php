<section class="add-funds m-t-30">   
  <div class="container-fluid">
    <div class="row justify-content-md-center" id="result_ajaxSearch">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="card-title"> <?=lang("paytm_confirmation")?></h3>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <form id="paymentFrm" method="post" action="<?=cn($module."/paytm/create_payment")?>">

                <div class="form-group">
                  <label class="form-label"><?=sprintf(lang("total_amount_XX_includes_fee"), 'INR')?></label>
                  <input title="TXN_AMOUNT" tabindex="10" type="hidden" name="TXN_AMOUNT" value="<?=$amount?>">
                  <input type="text" class="form-control" value="<?=$amount?>" disabled>
                </div>

                <div class="form-group">
                  <span class="small"><?=lang("note")?> <?=lang("the_system_will_convert_automatically_from_INR_to_USD_and_add_funds_to_your_blance_when_payment_is_made")?></span>
                </div>

                <input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS" . rand(10000,99999999)."_".session("uid")."_".session("real_amount")?>">
                <input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001">
                <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
                <input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
                <input type="hidden" name="user_id" value="<?=session("uid")?>"/>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                <!-- submit button -->
                <input type="submit" class="btn btn-primary btn-lg btn-block" name="PAYMENT_METHOD" value="<?=lang("Submit")?>">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
