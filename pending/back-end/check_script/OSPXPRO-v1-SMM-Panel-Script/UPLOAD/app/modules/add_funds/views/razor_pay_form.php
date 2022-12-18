<?php  $userData =$this->session->userdata('user_current_info');  



?>


<section class="add-funds m-t-30">   
  <div class="container-fluid">
    <div class="row justify-content-md-center" id="result_ajaxSearch">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="card-title"><?=lang("razor_pay_creditdebit_card_payment")?></h3>
          </div>
          <div class="card-body">
              <form action="<?=cn($module."/razor_pay/create_payment")?>" method="POST">
                <input type="hidden" value="<?php echo $amount;?>"  name="amount">
                <input type="hidden" value="<?php echo $this->security->get_csrf_hash();?>"  name="<?php echo $this->security->get_csrf_token_name(); ?>">
                <script type="text/javascript" src="https://checkout.razorpay.com/v1/checkout.js"
                    data-key="<?php echo get_option('razor_pay_publishable_key');  ?>"
                    data-amount="<?php echo $amount*100;?>"
                    data-currency="<?=get_option("currency_code",'USD')?>"
                    data-buttontext="Pay with Razorpay"
                     data-name="<?php echo $userData['first_name'].' '.$userData['last_name'];?>"
                    data-description=""
                    data-image="/assets/images/logo-white.png" 
                    data-prefill.name="<?php echo $user['first_name'].' '.$user['last_name'];?>"
                    data-prefill.email="<?php echo $use['email'];?>"
                    data-theme.color="#F37254"></script>


                <input type="hidden" custom="Hidden Element" name="hidden">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <script src="https://js.stripe.com/v3/"></script> -->


<script type="text/javascript">
$('.razorpay-payment-button').submit();
</script>
