<?=Modules::run(get_theme()."/header", false)?>
<style>
@media screen and (max-width: 560px){
.form-footer {
    width: 100%!important;
}
}
.form-footer {
    width: 65%;
}
</style>
<div class="auth-login-form">
  <div class="container-login">
    <div class="header-login">
      <img src="<?=cn("themes/pergo/assets/images/header.svg")?>" alt="Header-svg">
      <div class="header-title">
        <h2><?=lang("Welcome_to_our_website")?></h2>
      </div>
    </div>
  <div class="form-login">
    <form class="actionForm" action="<?=cn("auth/ajax_sign_up")?>" data-redirect="<?=cn('statistics')?>" method="POST">
      <div>
        <div class="card-title text-center">
          <h4><?=lang("register_now")?></h4>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <div class="input-icon mb-3">
                <input type="text" class="form-control" name="first_name" placeholder="<?=lang("first_name")?>"  required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-icon mb-3">
                <input type="text" class="form-control" name="last_name" placeholder="<?=lang("last_name")?>" required>
              </div>  
            </div>
          </div>

          <div class="input-icon mb-3">
            <input type="email" class="form-control" name="email" placeholder="<?=lang("Email")?>" required>
          </div>  
          
          <?php
            if (get_option('enable_signup_skype_field')) {
          ?>
          <div class="input-icon mb-3">
            <input type="text" class="form-control" name="skype_id" placeholder="<?=lang("Whatsapp Number")?>" required>
          </div>    
          <?php } ?>      
          <div class="input-icon mb-3">
            <input type="password" class="form-control" name="password" placeholder="<?=lang("Password")?>" required>
          </div>    

          <div class="input-icon mb-3">
            <input type="password" class="form-control" name="re_password" placeholder="<?=lang("Confirm_password")?>" required>
          </div>

          


          <div class="input-icon mb-3">
            <select  name="timezone" class="form-control square">
              <?php $time_zones = tz_list();
                if (!empty($time_zones)) {
                  $location = get_location_info_by_ip(get_client_ip());
                  $user_timezone = $location->timezone;
                  if ($user_timezone == "" || $user_timezone == 'Unknow') {
                    $user_timezone = get_option("default_timezone", 'UTC');
                  }
                  foreach ($time_zones as $key => $time_zone) {
              ?>
              <option value="<?=$time_zone['zone']?>" <?=($user_timezone == $time_zone["zone"])? 'selected': ''?>><?=$time_zone['time']?></option>
              <?php }}?>
            </select>
          </div>
        </div>
        
        <?php
          if (get_option('enable_goolge_recapcha') &&  get_option('google_capcha_site_key') != "" && get_option('google_capcha_secret_key') != "") {
        ?>
        <div class="form-group">
          <div class="g-recaptcha" data-sitekey="<?=get_option('google_capcha_site_key')?>"></div>
        </div>
        <?php } ?> 

        <div class="form-group">
          <label class="custom-control custom-checkbox">
            <input type="checkbox" name="terms" class="custom-control-input" />
            <span class="custom-control-label"><?=lang("i_agree_the")?> <a href="<?=cn('terms')?>"><?=lang("terms__policy")?></a></span>
          </label>
        </div>

        <div class="form-footer">
          <button type="submit" class="btn btn-pill btn-2 btn-block btn-submit btn-gradient"><?=lang("create_new_account")?></button>
        </div>
      </div>
    </form>
    <div class="text-center text-muted m-t-20">
      <?=lang("already_have_account")?> <a href="<?=cn('auth/login')?>"><?=lang("Login")?></a>
    </div>
  </div>
</div>

<?=Modules::run(get_theme()."/footer", false)?>
