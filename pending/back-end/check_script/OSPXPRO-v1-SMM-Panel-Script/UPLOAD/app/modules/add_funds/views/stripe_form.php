
<style>
    /**
   * The CSS shown here will not be introduced in the Quickstart guide, but shows
   * how you can use CSS to style your Element's container.
   */
  .StripeElement {
    box-sizing: border-box;
    width: 100%;
    height: 40px;
    margin: 10px;
    padding: 10px 12px;
    border: 1px solid transparent;
    border-radius: 4px;
    background-color: white;
    box-shadow: 0 1px 3px 0 #e6ebf1;
    -webkit-transition: box-shadow 150ms ease;
    transition: box-shadow 150ms ease;
  }

  .StripeElement--focus {
    box-shadow: 0 1px 3px 0 #cfd7df;
  }

  .StripeElement--invalid {
    border-color: #fa755a;
  }

  .StripeElement--webkit-autofill {
    background-color: #fefde5 !important;
  }
</style>

<style>
  .creditCardForm .form-control {
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  .creditCardForm .form-group .transparent {
    opacity: 0.1;
  }
</style>

<script src="https://js.stripe.com/v3/"></script>

<section class="add-funds m-t-30">   
  <div class="container-fluid">
    <div class="row justify-content-md-center" id="result_ajaxSearch">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="card-title"><?=lang("stripe_creditdebit_card_payment")?></h3>
          </div>
          <div class="card-body">
            <form class="creditCardForm" action="<?=cn($module."/stripe/create_payment")?>" method="post" id="payment-form">
              <fieldset class="form-fieldset m-t-10">
                <div class="form-group">
                  <label class="form-label"><?=sprintf(lang("amount_usd"), get_option("currency_code",'USD'))?></label>
                  <input type="text" class="form-control" value="<?=$amount?>" readonly>
                  <input type="hidden" name="amount" class="form-control" value="<?=$amount?>" >
                </div>
                <?php
                  $user = session('user_current_info');

                ?>
                <div class="form-group">
                  <label class="form-label"><?=lang("user_information")?></label>
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fe fe-user"></i>
                    </span>
                    <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo $user['first_name'].' '.$user['last_name']; ?>" readonly autofocus >
                  </div>    

                  <div class="input-icon m-t-20">
                    <span class="input-icon-addon">
                      <i class="fe fe-mail"></i>
                    </span>
                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $user['email']; ?>" readonly >
                  </div>
                </div>
                <div class="form-row mt15">
                  <div id="card-element"></div>
                  <div id="card-errors" role="alert" class="text-danger"></div>
                </div>
                <div class="form-group text-center m-t-10" id="credit_cards">
                  <img src="<?php echo BASE; ?>assets/images/payments/visa.jpg" id="visa">
                  <img src="<?php echo BASE; ?>assets/images/payments/mastercard.jpg" id="mastercard">
                  <img src="<?php echo BASE; ?>assets/images/payments/amex.jpg" id="amex">
                </div>
                <button type="submit" class="btn btn-dark btn-lg btn-block m-t-15"><?=lang('Submit')?></button>
              </fieldset>
            </form>   
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <script src="https://js.stripe.com/v3/"></script> -->


<script type="text/javascript">
setTimeout(function(){
  // Create a Stripe client
  var stripe = Stripe('<?=get_option('stripe_publishable_key')?>');

  // Create an instance of Elements
  var elements = stripe.elements();

  // Custom styling can be passed to options when creating an Element.
  // (Note that this demo uses a wider set of styles than the guide below.)
  var style = {
      base: {
      color: '#32325d',
      lineHeight: '18px',
      fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
      fontSmoothing: 'antialiased',
      fontSize: '16px',
      '::placeholder': {
        color: '#aab7c4'
      }
      },
      invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
      }
  };

  // Create an instance of the card Element
  var card = elements.create('card', {hidePostalCode: true, style: style});

  // Add an instance of the card Element into the `card-element` <div>
  card.mount('#card-element');

  // Handle real-time validation errors from the card Element.
  card.addEventListener('change', function(event) {
      var displayError = document.getElementById('card-errors');
      if (event.error) {
        displayError.textContent = event.error.message;
      } else {
        displayError.textContent = '';
      }
  });

  // Handle form submission
  var form = document.getElementById('payment-form');
  form.addEventListener('submit', function(event) {
      event.preventDefault();

      stripe.createToken(card).then(function(result) {
        if (result.error) {
        // Inform the user if there was an error
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
        } else {
            // Send the token to your server
            stripeTokenHandler(result.token);
        }
      });
  });
}, 1000);

function stripeTokenHandler(stripe_token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', stripe_token.id);
  form.appendChild(hiddenInput);

  var hiddenToken = document.createElement('input');
  hiddenToken.setAttribute('type', 'hidden');
  hiddenToken.setAttribute('name', 'token');
  hiddenToken.setAttribute('value', token);
  form.appendChild(hiddenToken);

  // var hiddenPlan = document.createElement('input');
  // hiddenPlan.setAttribute('type', 'hidden');
  // hiddenPlan.setAttribute('name', 'plan');
  // hiddenPlan.setAttribute('value', $('input[name="plan"]:checked').val());
  // form.appendChild(hiddenPlan);

  // Submit the form
  form.submit();
}
</script>
