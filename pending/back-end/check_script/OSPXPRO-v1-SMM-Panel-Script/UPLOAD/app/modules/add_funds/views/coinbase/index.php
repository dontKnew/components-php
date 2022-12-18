<div id="coinbase" class="tab-pane fade">
  <form class="form actionAddFundsForm" action method="POST">
    <div class="row">
      <div class="col-md-12">
        <?php 
          if (get_option("coinbase_api_key", '') != "") {
        ?>
        <div class="for-group text-center">
          <img src="<?=BASE?>/assets/images/payments/coinbase.png" style="max-width: 250px;" alt="coinbase icon">
          <p class="p-t-10"><small><?=sprintf(lang("you_can_deposit_funds_with_paypal_they_will_be_automaticly_added_into_your_account"), 'Coinbase')?></small></p>
        </div>
        <div class="form-group">
          <label><?=sprintf(lang("amount_usd"), 'USD')?></label>
          <input class="form-control square" type="number" name="amount" placeholder="10">
          <input type="hidden" name="payment_method" value="coinbase">
        </div>
        <div class="form-group">
          
       
        
        
          <p><strong>Note:</strong></p>
<ul>
<li><?=lang("transaction_fee")?>:<span> </span><strong><?=(get_option("coinbase_chagre_fee", 1))?>%</strong></li>
<li>Estimated Time:<strong><b>30 </b></strong>Minutes</li>
<li><strong>THIS PAYMENT IS FOR SERVICES AND IT IS NOT REFUNDABLE</strong></li>

</ul>
<p><span xss="removed"><strong>How to buy BTC, ETH</strong></span></p>
<p><span>Use <span xss="removed"><strong>PAYPAL, Credit Card Payment or Bank Transfer</strong></span> to buy Bitcoins with almost </span><a target="_blank" href="https://support.coinbase.com/customer/en/portal/articles/2109597-coinbase-pricing-fees-disclosures" rel="noopener">ZERO Conversion Fees</a><span> and get a </span><a href="https://www.coinbase.com/join/malik_p61">FREE 10$ Bonus on your newly created Coinbase account!</a><br><br><span>   1. <a href="https://www.coinbase.com/join/malik_p61"> </a></span><a href="https://www.coinbase.com/join/malik_p61">Register and Create a Coinbase Account</a><br><span>   2. Purchase Bitcoins from Coinbase</span><br><span>   3. Deposit your Bitcoins on <strong>GreatSMO</strong></span><br><br><span>Payment method allowed:</span><br><b>Paypal, Credit Cards, Bank Transfer</b></p>      </div>
                    
                    
                   
        
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

        <?php }else{?>
        <div class="form-group">
          <div class="alert alert-danger p-t-10" role="alert">
            <?=lang("this_payment_gateway_is_not_already_active_at_the_present")?>
          </div>
        </div>
        <?php }?>

      </div>  
    </div>
  </form>
</div>

<script>
  $(document).on("submit", ".actionAddFundsForm", function(){
    pageOverlay.show();
    event.preventDefault();
    _that         = $(this);
    _payment_type = $("#paymentFrom").find("input[name=payment_type]").val();
    _action       = PATH + 'add_funds/' +'/process';
    _redirect     = _that.data("redirect");
    _data       = _that.serialize();
    _data       = _data + '&' + $.param({token:token});

    $.post(_action, _data, function(_result){
        setTimeout(function(){
          pageOverlay.hide();
        },1500)
        if (is_json(_result)) {
          _result = JSON.parse(_result);
          setTimeout(function(){
            notify(_result.message, _result.status);
          },1500)
          setTimeout(function(){
            if(_result.status == 'success' && typeof _redirect != "undefined"){
              reloadPage(_redirect);
            }
          }, 2000)
        }else{
          setTimeout(function(){
            $(".actionAddFundsForm").html(_result);
          }, 1500)
        }
    })
    return false;
  })
</script>
