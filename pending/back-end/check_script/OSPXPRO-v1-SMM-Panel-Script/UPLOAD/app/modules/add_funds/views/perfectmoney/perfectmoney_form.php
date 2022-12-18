<section class="add-funds m-t-30">   
  <div class="container-fluid">
    <div class="row justify-content-md-center" id="result_ajaxSearch">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="card-title"><?=lang("perfect_money_confirmation")?></h3>
          </div>
          <div class="card-body">
            <div class="tab-content" id="result_notification">
              <form id="paymentFrom" method="post" action="<?=cn($module."/perfectmoney/create_payment")?>">
                <div class="form-group">
                  <label class="form-label"><?php echo sprintf(lang("total_amount_XX_includes_fee"), $perfectmoney->PAYMENT_UNITS)?></label>
                  <input type="text" class="form-control" value="<?=$amount?>" disabled>
                </div>
                <!-- submit button -->
                <input type="hidden" name="PAYMENT_AMOUNT" value="<?=$amount?>">
                <input type="hidden" class="form-control" name="payment_type" value="perfectmoney">
                <input type="submit" class="btn btn-primary btn-lg btn-block" name="PAYMENT_METHOD" value="<?=lang("Submit")?>">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

