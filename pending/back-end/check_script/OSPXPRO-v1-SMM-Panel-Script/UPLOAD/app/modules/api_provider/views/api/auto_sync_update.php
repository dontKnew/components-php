<?php
  $defaut_auto_sync = get_option("defaut_auto_sync_service_setting", '{"price_percentage_increase":50,"sync_request":0,"new_currency_rate":"1","is_enable_sync_price":0,"is_convert_to_new_currency":0}');

  if (is_string($defaut_auto_sync)) {
    $defaut_auto_sync = json_decode($defaut_auto_sync);
    $price_percentage_increase = (isset($defaut_auto_sync->price_percentage_increase)) ? $defaut_auto_sync->price_percentage_increase : "";
    $sync_request = (isset($defaut_auto_sync->sync_request)) ? $defaut_auto_sync->sync_request : 0;
    $is_enable_sync_price = (isset($defaut_auto_sync->is_enable_sync_price)) ? $defaut_auto_sync->is_enable_sync_price : 0;
    $is_convert_to_new_currency = (isset($defaut_auto_sync->is_convert_to_new_currency)) ? $defaut_auto_sync->is_convert_to_new_currency : 0;
  }

?>
<div id="main-modal-content">
  <div class="modal-right">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form class="form actionForm" action="<?=cn($module."/ajax_auto_sync_services_setting")?>" data-redirect="<?=cn($module)?>" method="POST">
          <div class="modal-header bg-pantone">
            <h4 class="modal-title"><i class="fe fe-edit"></i> Auto Sync Service Setting</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <div class="form-body">
              <div class="row justify-content-md-center">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?=lang("price_percentage_increase")?> <?=sprintf(lang('auto_rounding_to_X_decimal_places'), get_option("auto_rounding_x_decimal_places", 2))?></label>
                    <select name="price_percentage_increase" class="form-control square">
                      <?php
                        for ($i = 0; $i <= 1000; $i++) {
                      ?>
                      <option value="<?=$i?>" <?=(isset($price_percentage_increase) && $price_percentage_increase == $i)? "selected" : ''?>><?=$i?>%</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?=lang("synchronous_request")?></label>
                    <select name="request" class="form-control square">
                      <option value="0" <?=(isset($sync_request) && $sync_request == 0)? "selected" : ''?>><?=lang("current_service")?></option>
                      <option value="1" <?=(isset($sync_request) && $sync_request == 1)? "selected" : ''?>><?=lang("All")?></option>
                    </select>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="is_enable_sync_price" <?=(isset($is_enable_sync_price) && $is_enable_sync_price == 1)? "checked" : ''?>>
                      <span class="custom-control-label"><?=lang("enable_sync_the_price_min_max_of_current_services")?></span>
                    </label>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="is_convert_to_new_currency" <?=(isset($is_convert_to_new_currency) && $is_convert_to_new_currency == 1)? "checked" : ''?>>
                      <span class="custom-control-label"><?=lang("auto_convert_to_new_currency_with_currency_rate_like_in")?><a href="<?=cn("setting")."?t=currency"?>" target="_blank"><?=lang("currency_setting_page")?></a></span>
                    </label>
                  </div>
                </div>

                <div class="col-md-12">
                    <span class="text-primary small"><?=lang("note")?></span>
                    <ul class="text-primary small">
                      <li><?=lang("current_service_sync_all_the_current_services")?></li>
                      <li><?=lang("all_auto_add_new_service_if_the_service_doesnt_exists")?></li>
                    </ul>
                </div>

              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1"><?=lang("Submit")?></button>
            <button type="button" class="btn round btn-default btn-min-width mr-1 mb-1" data-dismiss="modal"><?=lang("Cancel")?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
