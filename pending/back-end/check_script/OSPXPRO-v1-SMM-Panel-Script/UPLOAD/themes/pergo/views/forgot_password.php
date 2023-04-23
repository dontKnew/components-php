<?=Modules::run(get_theme()."/header", false)?>
<div class="auth-login-form">
  <div class="container-login">
    <div class="header-login">
      <img src="<?=cn("themes/pergo/assets/images/header.svg")?>" alt="Header-svg">
      <div class="header-title">
        <h2><?=lang("Welcome_to_our_website")?></h2>
      </div>
    </div>
  <div class="form-login">
    <form class="actionForm" action="<?=cn("auth/ajax_forgot_password")?>" data-redirect="<?=cn("auth/login")?>" method="POST">
      <div>
        <div class="card-title text-center">
          <h4><?=lang("forgot_password")?></h4>
        </div>
        <p class="text-muted"><?=lang("enter_your_registration_email_address_to_receive_password_reset_instructions")?></p>
        <div class="form-group">
          <div class="input-icon mb-5">
            <span class="input-icon-addon">
              <i class="fe fe-mail"></i>
            </span>
            <input type="email" class="form-control" name="email" placeholder="<?=lang("Email")?>" required>
          </div>    
        </div>

        <?php
          if (get_option('enable_goolge_recapcha') &&  get_option('google_capcha_site_key') != "" && get_option('google_capcha_secret_key') != "") {
        ?>
        <div class="form-group">
          <div class="g-recaptcha" data-sitekey="<?=get_option('google_capcha_site_key')?>"></div>
        </div>
        <?php } ?> 
        
        <div class="form-footer">
          <button type="submit" class="btn btn-pill btn-2 btn-block btn-submit btn-gradient"><?=lang("Submit")?></button>
        </div>
      </div>
    </form>
  </div>
</div>

<?=Modules::run(get_theme()."/footer", false)?>
