

<div class="col-md-12 col-xl-12 tr_aeff775f290fcd8af02ac13f41467db1">
    <div class="card card-collapsed">
      <div class="card-header">
        <h3 class="card-title" data-toggle="card-collapse">
          <span class="bg-question"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i></span>
         Currency converter from USD to INR      </h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="card-body">
        <p><span>
    <center>
        
<b>Tyep Your Amount In Box To Check USD To INR </b>
        
        </br></br>
        <form class="frConverter">
<table border="0" cellpadding="3" cellspacing="0">
<tr>
	<td>From USD</td>
	<td><input type="hidden" name="base_currency" value="usd"></td>
	<td><input type="text" name="base_value" size="25" value="1"></td>
</tr>
<tr>
	<td>To INR</td>
	<td><input type="hidden" name="target_currency" value="inr"></td>
	<td><input type="text" name="target_value" size="25" value=""></td>
</tr>
</table>

</form>
</center>
 </span></p>      </div>
    </div>
  </div>









<div class="row justify-content-md-center justify-content-xl-center m-t-30" id="result_ajaxSearch">
  <div class="col-md-10 col-xl-10 ">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <div class="tabs-list">
          <ul class="nav nav-tabs">
            <li class="">
              <a class="active show" data-toggle="tab" href="#new_order"><i class="fa fa-clone"></i> <?=lang("single_order")?></a>
            </li>
            <li>
              <a data-toggle="tab" href="#mass_order"><i class="fa fa-sitemap"></i> <?=lang("mass_order")?></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div id="new_order" class="tab-pane fade in active show">
            <form class="form actionForm" action="<?=cn($module."/ajax_add_order")?>" data-redirect="<?=cn($module)?>" method="POST">
              <div class="row">
                <div class="col-md-6">
                  <div class="content-header-title">
                    <h6><i class="fa fa-shopping-cart"></i> <?=lang('add_new')?></h6>
                  </div>
                  <div class="form-group">
                    <label><?=lang("Category")?></label>
                    <select name="category_id" class="form-control square ajaxChangeCategory"  data-url="<?=cn($module."/order/get_services/")?>">
                      <option> <?=lang("choose_a_category")?></option>
                      <?php
                        if (!empty($categories)) {

                          foreach ($categories as $key => $category) {
                      ?>
                      <option value="<?=$category->id?>"><?=$category->name?></option>
                      <?php }}?>
                    </select>
                  </div>
                  <div class="form-group" id="result_onChange">
                    <label><?=lang("order_service")?></label>
                    <select name="service_id" class="form-control square ajaxChangeService" data-url="<?=cn($module."/order/get_service/")?>">
                      <option> <?=lang("choose_a_service")?></option>
                      <?php
                        if (!empty($services)) {
                          $service_item_default = $services[0];
                          foreach ($services as $key => $service) {
                      ?>
                      <option value="<?=$service->id?>" ><?=$service->name?></option>
                      <?php }}?>
                    </select>
                  </div>
                  
                  <div class="form-group order-default-link">
                    <label><?=lang("Link")?></label>
                    <input class="form-control square" type="text" name="link" placeholder="https://" id="">
                  </div>

                  <div class="form-group order-default-quantity">
                    <label><?=lang("Quantity")?></label>
                    <input class="form-control square ajaxQuantity" name="quantity" type="number">
                  </div>
                  
                  <div class="form-group order-comments d-none">
                    <label for=""><?=lang("Comments")?> <?php lang('1_per_line')?></label>
                    <!-- <input type="text" class="form-control input-tags ajax_custom_comments" name="comments" value="good pic,great photo,:)"> -->
                    <textarea  rows="10" name="comments" class="form-control square ajax_custom_comments"></textarea>
                  </div> 

                  <div class="form-group order-comments-custom-package d-none">
                    <label for=""><?=lang("Comments")?> <?php lang('1_per_line')?></label>
                    <!-- <input type="text" class="form-control input-tags" name="comments_custom_package" value="good pic,great photo,:)"> -->
                    <textarea  rows="10" name="comments_custom_package" class="form-control square"></textarea>
                  </div>

                  <div class="form-group order-usernames d-none">
                    <label for=""><?=lang("Usernames")?></label>
                    <input type="text" class="form-control input-tags" name="usernames" value="usenameA,usenameB,usenameC,usenameD">
                  </div>

                  <div class="form-group order-usernames-custom d-none">
                    <label for=""><?=lang("Usernames")?> <?php lang('1_per_line')?></label>
                    <textarea  rows="10" name="usernames_custom" class="form-control square ajax_custom_lists"></textarea>
                  </div>

                  <div class="form-group order-hashtags d-none">
                    <label for=""><?=lang("hashtags_format_hashtag")?></label>
                    <input type="text" class="form-control input-tags" name="hashtags" value="#goodphoto,#love,#nice,#sunny">
                  </div>

                  <div class="form-group order-hashtag d-none">
                    <label for=""><?=lang("Hashtag")?> </label>
                    <input class="form-control square" type="text" name="hashtag">
                  </div>

                  <div class="form-group order-username d-none">
                    <label for=""><?=lang("Username")?></label>
                    <input class="form-control square" name="username" type="text">
                  </div>   
                  
                  <!-- Mentions Media Likers -->
                  <div class="form-group order-media d-none">
                    <label for=""><?=lang("Media_Url")?></label>
                    <input class="form-control square" name="media_url" type="link">
                  </div>

                  <!-- Subscriptions  -->
                  <div class="row order-subscriptions d-none">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label><?=lang("Username")?></label>
                        <input class="form-control square" type="text" name="sub_username">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label><?=lang("New_posts")?></label>
                        <input class="form-control square" type="number" placeholder="<?=lang("minimum_1_post")?>" name="sub_posts">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label><?=lang("Quantity")?></label>
                        <input class="form-control square" type="number" name="sub_min" placeholder="<?=lang("min")?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>&nbsp;</label>
                        <input class="form-control square" type="number" name="sub_max" placeholder="<?=lang("max")?>">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label><?=lang("Delay")?> (<?=lang("minutes")?>)</label>
                        <select name="sub_delay" class="form-control square">
                          <option value="0"><?=lang("")?><?=lang("No_delay")?></option>
                          <option value="5">5</option>
                          <option value="10">10</option>
                          <option value="15">15</option>
                          <option value="30">30</option>
                          <option value="60">60</option>
                          <option value="90">90</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label><?=lang("Expiry")?></label>
                        <div class="input-group">
                          <input type="text" class="form-control datepicker" name="sub_expiry" onkeydown="return false" name="expiry" placeholder="" id="expiry">
                          <span class="input-group-append">
                            <button class="btn btn-info" type="button" onclick="document.getElementById('expiry').value = ''"><i class="fe fe-trash-2"></i></button>
                          </span>
                        </div>
                      </div>
                    </div>

                  </div>
                  <?php
                    if (get_option("enable_drip_feed","") == 1) {
                  ?>
                  <div class="row drip-feed-option d-none">
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="form-label"><?=lang("dripfeed")?> 
                          <label class="custom-switch">
                            <span class="custom-switch-description m-r-20"><i class="fa fa-question-circle" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="<?=lang("drip_feed_desc")?>" data-title="<?=lang("what_is_dripfeed")?>"></i></span>

                            <input type="checkbox" name="is_drip_feed" class="is_drip_feed custom-switch-input" data-toggle="collapse" data-target="#drip-feed" aria-expanded="false" aria-controls="drip-feed">
                            <span class="custom-switch-indicator"></span>
                          </label>
                        </div>
                      </div>

                      <div class="row collapse" id="drip-feed">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label><?=lang("Runs")?></label>
                            <input class="form-control square ajaxDripFeedRuns" type="number" name="runs" value="<?=get_option("default_drip_feed_runs", "")?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label><?=lang("interval_in_minutes")?></label>
                            <select name="interval" class="form-control square">
                              <?php
                                for ($i = 1; $i <= 60; $i++) {
                                  if ($i%10 == 0) {
                              ?>
                              <option value="<?=$i?>" <?=(get_option("default_drip_feed_interval", "") == $i)? "selected" : ''?>><?=$i?></option>
                              <?php }} ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label><?=lang("total_quantity")?></label>
                            <input class="form-control square" name="total_quantity" type="number" disabled>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php }?>
                  <div class="form-group" id="result_total_charge">
                    <input type="hidden" name="total_charge" value="0.00">
                    <input type="hidden" name="currency_symbol" value="<?=get_option("currency_symbol", "")?>">
                    <p class="btn btn-info total_charge"><?=lang("total_charge")?> <span class="charge_number">$0</span></p>
                    
                    <?php
                      $user = $this->model->get("balance, custom_rate", 'general_users', ['id' => session('uid')]);
                      if ($user->custom_rate > 0 ) {
                    ?>
                    <p class="small text-muted"><?=lang("custom_rate")?>: <span class="charge_number"><?=$user->custom_rate?>%</span></p>
                    <?php }?>
                    <div class="alert alert-icon alert-danger d-none" role="alert">
                      <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i><?=lang("order_amount_exceeds_available_funds")?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="agree">
                      <span class="custom-control-label text-uppercase"><?=lang("yes_i_have_confirmed_the_order")?></span>
                    </label>
                  </div>

                  <div class="form-actions left">
                    <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1">
                      <?=lang("place_order")?>
                    </button>

                  </div>
                </div>  

                <div class="col-md-6" id="order_resume">
                  <div class="content-header-title">
                    <h6><i class="fa fa-shopping-cart"></i> <?=lang("order_resume")?></h6>
                  </div>
                  <div class="row" id="result_onChangeService">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label><?=lang("service_name")?></label>
                        <input type="hidden" name="service_id" id="service_id" value="<?=(!empty($service_item_default->id))? $service_item_default->id :''?>">
                        <input class="form-control square" name="service_name" type="text" value="<?=(!empty($service_item_default->name))? $service_item_default->name :''?>" disabled>
                      </div>
                    </div>   

                    <div class="col-md-4  col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label><?=lang("minimum_amount")?></label>
                        <input class="form-control square" name="service_min" type="text" value="<?=(!empty($service->min))? $service->min :''?>" id="min_amount" disabled>
                      </div>
                    </div>

                    <div class="col-md-4  col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label><?=lang("maximum_amount")?></label>
                        <input class="form-control square" name="service_max" type="text" value="<?=(!empty($service->max))? $service->max :''?>" id="max_amount" disabled>
                      </div>
                    </div>

                    <div class="col-md-4  col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label><?=lang("price_per_1000")?></label>
                        <input class="form-control square" name="service_price" type="text" value="" disabled>
                      </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label for="userinput8"><?=lang("Description")?></label>
                        <textarea  rows="10" name="service_desc" class="form-control square" disabled>
                        </textarea>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </form>
          </div>
          <div id="mass_order" class="tab-pane fade">
            <form class="form actionForm" action="<?=cn($module."/ajax_mass_order")?>" data-redirect="<?=cn($module."/log")?>" method="POST">
              <div class="x_content row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="content-header-title">
                    <h6> <?=lang("one_order_per_line_in_format")?></h6>
                  </div>
                  <div class="form-group">
                    <textarea id="editor" rows="14" name="mass_order" class="form-control square" placeholder="service_id|quantity|link"></textarea>
                  </div>
                  <div class="form-group">
                    <label class="form-check">
                      <input type="checkbox" class="form-check-input" name="agree">
                      <span class="custom-control-label"><?=lang("yes_i_have_confirmed_the_order")?></span>
                    </label>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="mass_order_error" id="result_notification">
                    <div class="content-header-title">
                      <h6><i class="fa fa-info-circle"></i> <?=lang("note")?></h6>
                    </div>
                    <div class="form-group">
                      <?=lang("here_you_can_place_your_orders_easy_please_make_sure_you_check_all_the_prices_and_delivery_times_before_you_place_a_order_after_a_order_submited_it_cannot_be_canceled")?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-actions left">
                <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1">
                  <?=lang("place_order")?>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<script type="text/javascript">
  (function() {
    var js = document.createElement('script'); js.type = 'text/javascript'; js.async = true;
    js.src = '//www.floatrates.com/scripts/converter.js';
    var sjs = document.getElementsByTagName('script')[0]; sjs.parentNode.insertBefore(js, sjs);
  })();
</script>




<div class="row justify-content-center m-t-50">
  <div class="col-md-10">
    
    
    
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">General Guides & Descriptions </h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="card-body collapse show">
    
    
    <div class="content m-t-30">
      <h3>1. <span>Order Tips</span>:</h3>
      
<ol xss="removed">
<li><span>Some service need to order multiple amounts, ie: 50 = 100 / 150 etc.. or 1000 = 2000 / 3000 / 10K. Check details before order!!</span></li>
<li><span>Quantity: If some server place order amount must be equal quantity by amount. It will cancel if you place the wrong amount, ie: ⭐Quantity must be multiple of 100. If you order 105, 150, 2500, it will be rejected and cancel full refunded. Please place an order on: 100 / 200 / 1100 etc...<br></span></li>
<li><span>For orders issue problem usually takes up 24-48HR automatic solve the problem. If the status is Partially completed/Canceled it means Smm-Panel system can't give more likes/followers to the current page/post and money will be automatically refunded for remains likes/followers. Please order on the different ID service in this case.</span></li>
<li><span>Never changed your profile username during the service which has been placed the order, it will be marked completed by your fault and mistake,</span></li>
<li><span>Place same link / different server will help, if it cannot delivery will partially refund by itself.</span></li>
<li><span>Pending means start time in progressing mode. In progressing mode estimate instant to 24H completed to the day speed.</span></li>
<li><span>Followers orders on day speed running, please be patients, if your profile has followers, it needs to read which not add before to add, it will be a time and slower for high amount profile. Order the maximum of the servers that higher than profile followers will be faster, but between suggestion per time. If you add last day already, it needs time to start again. Will be some delay!!</span></li>
<li><span>If order completed by nothing added, Please check service details about drop ratio / completion ratio / no refill or refill server. If it spam by completed mistake will be happened some times. Request a new ticket for help.</span></li>
<li><span><strong>Drip-Feed</strong> - If you not sure the day speed, hour speed, don't use drip-feed. First order not completed, and u place another one, it will just start count same and completed the same amount by bots. Usually, you must confirm the server speed, start time, and drip in correct mins. Depends server to set which method, if you not sure, feel free to ask us on service id first.<br></span></li>
</ol>
<h3>2. <span>Attentions</span>:</h3>
<p><span>⚠️ </span><span>We won't recommend any fast followers, they all drop fast. No point to be fast one followers, does not like, it must be stable better, you add them fast for what? next week all drop, and waste money, not looking good!</span></p>
<p><span>⚠️ <strong>Acknowledge that DROP RATE on most Instagram Follower service is VERY HIGH. Please Use at your own risk.</strong></span><span></span></p>
<p><span>⚠️Some of the cheap server will slow down daily once the server overloaded, please wait for the patient next 12-24H will restart the capacitor.</span></p>
<p><span>⚠️</span>We<span> </span><strong>DO NOT</strong><span> </span>guarantee your new followers will interact with you, we simply guarantee you to get the followers you pay for.</p>
<p><span>⚠️</span>We<span> </span><strong>DO NOT</strong><span> </span>guarantee<span> </span><strong>100%</strong><span> </span>of our accounts will have a profile picture, full bio and uploaded pictures, although we strive to make this the reality for all accounts.</p>
<p><span>⚠️If you use drip feed feature. We can not  intervent ( refund / refill / cancel etc )</span>.</p>
<h3>3. Duplicate order warning:</h3>
<ul>
<li>If you are placing duplicate link while 1 is already in process then it'll be your loss , no refunds for such orders will be made!</li>
<li>We can not guarantee the speed for any of the Instagram Followers Services, below 1$ /k They can be instant , very fast or may take upto 48 hours to get complete. We can not cancel any order once placed. Order Accordingly.</li>
<li>If your order has dropped under the start count, we will not refill your order. This is because your old followers are dropping and we are not covering your old orders. Thank you for your understanding.</li>
<li>If you have problem with any order (Such as dropped , not completed). Please do not place another order before getting your Refund or Replacement for order , if you do so it will be your Loss. We will not provide refunds for such cases as we do not know which server/order gets delivered and which does not.</li>
<li>If your Followers/Likes Order is Partialled and service is with Guarantee, we will not offer any Refills/Refunds in such cases as we partial because of your old drops especially counts like 500k , 1m , 2m etc ,</li>
<li>If your order is dropped and you have placed new Order without refilling your old order. It will be your loss , we wont be able to help you in this case.</li>
<li>If You are ordering any Refill service and in between you used any No refill service , your refill validity will be over for your old orders.</li>
</ul>    </div>
  </div> 
</div>


    </div>
    </div>
  </div>  




<style>
  .page-title h1{
    margin-bottom: 5px; }
    .page-title .border-line {
      height: 5px;
      width: 250px;
      background: #eca28d;
      background: -webkit-linear-gradient(45deg, #eca28d, #f98c6b) !important;
      background: -moz- oldlinear-gradient(45deg, #eca28d, #f98c6b) !important;
      background: -o-linear-gradient(45deg, #eca28d, #f98c6b) !important;
      background: linear-gradient(45deg, #eca28d, #f98c6b) !important;
      position: relative;
      border-radius: 30px; }
    .page-title .border-line::before {
      content: '';
      position: absolute;
      left: 0;
      top: -2.7px;
      height: 10px;
      width: 10px;
      border-radius: 50%;
      background: #fa6d7e;
      -webkit-animation-duration: 6s;
      animation-duration: 6s;
      -webkit-animation-timing-function: linear;
      animation-timing-function: linear;
      -webkit-animation-iteration-count: infinite;
      animation-iteration-count: infinite;
      -webkit-animation-name: moveIcon;
      animation-name: moveIcon; }

  @-webkit-keyframes moveIcon {
    from {
      -webkit-transform: translateX(0);
    }
    to { 
      -webkit-transform: translateX(250px);
    }
  }
</style>

<?php
  if (get_option('enable_attentions_orderpage')) {
?>
<div class="row justify-content-center m-t-50">
  <div class="col-md-10">
    <div class="page-title m-b-30">
      <h1>
        <?php echo get_option('title_attentions_orderpage',"Guides & Descriptions"); ?>
      </h1>
      <div class="border-line"></div>
    </div>
    <div class="content m-t-30">
      <?php echo get_option("guides_and_desc", ""); ?>
    </div>
  </div> 
</div>
<?php }; ?>


<script>
  $(function(){
    $('.datepicker').datepicker({
      format: "dd/mm/yyyy",
      autoclose: true,
      startDate: truncateDate(new Date())
    });
    $(".datepicker").datepicker().datepicker("setDate", new Date());

    function truncateDate(date) {
      return new Date(date.getFullYear(), date.getMonth(), date.getDate());
    }

    $('.input-tags').selectize({
        delimiter: ',',
        persist: false,
        create: function (input) {
            return {
                value: input,
                text: input
            }
        }
    });
  });
</script>
