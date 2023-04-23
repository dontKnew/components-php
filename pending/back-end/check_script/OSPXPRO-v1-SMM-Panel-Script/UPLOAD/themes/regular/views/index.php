    <?=Modules::run(get_theme()."/header")?>
    
    <section class="banner"  id="home">
      <div class="container">
        <div class="row">
          <div class="col-md-10 mx-auto">
            <div class="content">
              <h1 class="m-b-50 m-t-50">
                <?=lang("resellers_1_destination_for_smm_services")?>
              </h1>
              <div class="desc">
                <?=lang("save_time_managing_your_social_account_in_one_panel_where_people_buy_smm_services_such_as_facebook_ads_management_instagram_youtube_twitter_soundcloud_website_ads_and_many_more")?>
              </div>
              <div class="btn m-t-50">
                <a href="<?=cn('auth/signup')?>" class="btn btn-pill btn-outline-primary sign-up btn-lg"><?=lang("get_start_now")?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  
    <section class="section-1">
      <div class="container">
        <div class="row">
          <div class="col-md-6 p-t-60">
            <div class="content">
              <div class="title p-b-20">
                <?=lang("best_smm_marketing_services")?>
              </div>
              <div class="desc">
                <?=lang("best_smm_marketing_services_desc")?>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="intro-img">
              <img class="img-fluid" src="<?=BASE?>themes/regular/assets/images/about.png" alt="About us">
            </div>
          </div>
        </div>
      </div>
    </section>  

    <section class="section-2 text-center" id="features">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mx-auto">
            <div class="content">
              <div class="title">
                <?=lang("What_we_offer")?>
              </div>
              <div class="border-line">
                <hr>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="feature-item">
              <i class="fe fe-calendar text-primary"></i>
              <h3><?=lang("Resellers")?></h3>
              <p class="text-muted"><?=lang("you_can_resell_our_services_and_grow_your_profit_easily_resellers_are_important_part_of_smm_panel")?></p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="feature-item">
              <i class="fe fe-phone-call text-primary"></i>
              <h3><?=lang("Supports")?></h3>
              <p class="text-muted"><?=lang("technical_support_for_all_our_services_247_to_help_you")?></p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="feature-item">
              <i class="fe fe-star text-primary"></i>
              <h3><?=lang("high_quality_services")?></h3>
              <p class="text-muted"><?=lang("get_the_best_high_quality_services_and_in_less_time_here")?></p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="feature-item">
              <i class="fe fe-upload-cloud text-primary"></i>
              <h3><?=lang("Updates")?></h3>
              <p class="text-muted"><?=lang("services_are_updated_daily_in_order_to_be_further_improved_and_to_provide_you_with_best_experience")?></p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="feature-item">
              <i class="fe fe-share-2 text-primary"></i>
              <h3><?=lang("api_support")?></h3>
              <p class="text-muted"><?=lang("we_have_api_support_for_panel_owners_so_you_can_resell_our_services_easily")?></p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="feature-item">
              <i class="fe fe-dollar-sign text-primary"></i>
              <h3><?=lang("secure_payments")?></h3>
              <p class="text-muted"><?=lang("we_have_a_popular_methods_as_paypal_and_many_more_can_be_enabled_upon_request")?></p>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="section-3 subscribe-form">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <form class="form actionFormWithoutToast" action="<?php echo cn("client/subscriber"); ?>" data-redirect="<?php echo cn(); ?>" method="POST">
              <div class="content text-center">
                <h1 class="title"><?php echo lang("newsletter"); ?></h1>
                <p><?php echo lang("fill_in_the_ridiculously_small_form_below_to_receive_our_ridiculously_cool_newsletter"); ?></p>
              </div>
              <div class="input-group">
                <input type="email" name="email" class="form-control email" placeholder="Enter Your email" required>
                <button class="input-group-append btn btn-pill btn-gradient btn-signin btn-submit" type="submit">
                  <?php echo lang("subscribe_now"); ?>
                </button>
              </div>
              <div class="col-md-12 m-t-20">
                <div id="alert-message"></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <div class="modal-infor">
      <div class="modal" id="notification">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title"><i class="fe fe-bell"></i> <?=lang("Notification")?></h4>
              <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <div class="modal-body">
              <?=get_option('notification_popup_content')?>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><?=lang("Close")?></button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?=Modules::run(get_theme()."/footer");?>
    