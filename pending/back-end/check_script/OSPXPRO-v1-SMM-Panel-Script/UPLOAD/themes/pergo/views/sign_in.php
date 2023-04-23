<?=Modules::run(get_theme()."/header", false)?>
<style>
@media screen and (max-width: 560px){
.form-footer {
    width: 100%!important;
}
}
.form-footer {
    width: 55%;
}
</style>

<div class="auth-login-form">
  <div class="container-login">
    <div class="header-login">
      <img src="<?=cn("assets/images/header-login.png")?>" alt="Header Login">
      <div class="header-title">
        <h2><?=lang("Welcome_to_our_website")?></h2>
      </div>
    </div>
    <div class="form-login">
      <form class="actionForm" action="<?=cn("auth/ajax_sign_in")?>" data-redirect="<?=cn('statistics')?>" method="POST">
        <h3><?=lang("Log In")?></h3>
          <?php

            if (isset($_COOKIE["cookie_email"])) {
              $cookie_email = encrypt_decode($_COOKIE["cookie_email"]);
            }

            if (isset($_COOKIE["cookie_pass"])) {
              $cookie_pass = encrypt_decode($_COOKIE["cookie_pass"]);
            }

            ?>
        <div>
            <div class="container-inputs">
              <span class="labels-input">Email</span>
              <input type="email" class="form-control" name="email" placeholder="<?=lang("Enter_your_email")?>" value="<?=(isset($cookie_email) && $cookie_email != "") ? $cookie_email : ""?>" required>
            </div>

            <div class="container-inputs">
              <span class="labels-input">Password</span>
              <input type="password" class="form-control" name="password" placeholder="<?=lang("Enter_your_password")?>" value="<?=(isset($cookie_pass) && $cookie_pass != "") ? $cookie_pass : ""?>" required>
            </div>

            <div style="margin-top:25px;" class="form-group">
              <label class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" <?=(isset($cookie_email) && $cookie_email != "") ? "checked" : ""?>>
                  <span class="custom-control-label"><?=lang("remember_me")?></span>
                  <br><a href="<?=cn("auth/forgot_password")?>" class="float-right small"><?=lang("forgot_your_password?")?></a>
              </label>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-pill btn-2 btn-block btn-submit btn-gradient"><?=lang("Login")?></button>
            </div>

            <div class="dont-have">
            <?=lang("dont_have_account_yet")?> <br><a href="<?=cn('auth/signup')?>"><?=lang("Sign_Up")?>
            </div>
        </div>
          
    </div>
  </div>
</div>

<?=Modules::run(get_theme()."/footer", false)?>