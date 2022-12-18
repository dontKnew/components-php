<!-- get Header top menu -->
<?php
  $data_link = (object)array(
    'link'  => cn($module),
    'name'  => 'Contact'
  );
?>
<?=Modules::run("blocks/user_header_top", $data_link)?>

<section class="contact">
  <div class="container">
    <div class="row justify-content-md-center">

      <div class="col-md-8">
        <div class="contact-header text-white">
          <div class="title">
            <h1 class="title-name">Contact Us</h1>
          </div>
          <span>Get in touch with us today, we’d love to hear from you!</span>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card contact_form">
          <div class="card-body">
            <form class="form actionForm" action="<?=cn($module."/ajax_add")?>" data-redirect="<?=cn($module)?>" method="POST">
              <div class="form-body" id="add_new_ticket">
                <div class="row justify-content-md-center">
                  <div class="col-md-12">
                    <div id="alert-message"></div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6">
                    <div class="form-group">
                      <label>Name <span class="form-required">*</span></label>
                      <input class="form-control square" type="text" name="name">
                    </div>

                    <div class="form-group">
                      <label>Email <span class="form-required">*</span></label>
                      <input class="form-control square" type="email" name="email">
                    </div>

                    <div class="form-group">
                      <label><?=lang("Subject")?> <span class="form-required">*</span></label>
                      <select name="subject" class="form-control square ajaxChangeContactSubject">
                        <option value="subject_other">General</option>
                        <option value="subject_order"><?=lang("Order")?></option>
                        <option value="subject_payment"><?=lang("Payment")?></option>
                      </select>
                    </div>
                    <div class="form-group subject-order">
                      <label><?=lang("order_id")?></label>
                      <input class="form-control square" type="number" name="orderid" placeholder="">
                    </div>
 
                    <div class="form-group subject-payment d-none">
                      <label><?=lang("Transaction_ID")?></label>
                      <input class="form-control square" type="text" name="transaction_id" placeholder="<?=lang("enter_the_transaction_id")?>">
                      </select>
                    </div>
                  </div> 
                  <div class="col-12 col-sm-12 col-md-6">
                    <div class="form-group">
                      <label>Message <span class="form-required">*</span></label>
                      <textarea rows="12" id="editor" class="form-control square" name="description"></textarea>
                      <p style="font-size: 11px;"> If you have any related image, then please <a href="https://imgbb.com/" rel="nofollow" target="_blank" style="color:#cc5518;font-weight:bold"> Click here</a> to upload it on the site and give us the embed code in a message box to solve your issue. 
                            </p>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12 text-center m-t-10">
                    <button type="submit" class="btn  btn-pill btn-submit btn-gradient">Send Your Message</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>

<script src="<?=BASE?>assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>
  CKEDITOR.replace( 'editor', {
    height: 270
  });
</script>