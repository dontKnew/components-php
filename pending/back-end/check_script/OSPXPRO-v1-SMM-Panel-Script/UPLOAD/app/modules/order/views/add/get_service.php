<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="form-group">
    <label><?=lang("service_name")?></label>
    <input type="hidden" name="service_id" id="service_id" value="<?=(!empty($service->id))? $service->id :''?>">
    <input type="hidden" class="form-control square" name="api_service_id" value="<?=(!empty($service->api_service_id))? $service->api_service_id : ''?>">
    <input type="hidden" class="form-control square" name="api_provider_id" value="<?=(!empty($service->api_provider_id))? $service->api_provider_id : ''?>">
    <input class="form-control square" name="service_type" type="hidden" value="<?=(!empty($service->type))? $service->type :''?>">
    <input class="form-control square" name="service_name" type="text" value="<?=(!empty($service->name))? $service->name :''?>" disabled>
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
    <label><?=lang("price_per_1000")?> (<?=get_option("currency_symbol","")?>)</label>

    <?php
      $user = $this->model->get("balance, custom_rate", 'general_users', ['id' => session('uid')]);
      if (!empty($service->price) && $user->custom_rate > 0) {
          $new_price = $service->price*(1 - ($user->custom_rate/100));
        }else{
          $new_price = (!empty($service->price))? (double)$service->price :'';
        }
    ?>
    <input class="form-control square" name="service_price" type="hidden" value="<?=$new_price?>">

    <input class="form-control square" type="text" value="<?=(!empty($service->price))?currency_format($service->price, get_option("currency_decimal")) :''?>" disabled>
  </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="form-group">
    <label for="userinput8"><?=lang("Description")?></label>
    <?php
      if (!empty($service->desc)) { ?>
      <div class="card border">
        <div style="padding: 10px; min-height: 200px;">
           <?php
                      if (!empty($service->desc)) {
                        $desc = html_entity_decode($service->desc, ENT_QUOTES);
                        $desc = str_replace("\n", "<br>", $desc);
                        echo $desc;
                      }
                    ?>
        </div>
      </div>
      <?php
      }else{
      ?>
      <textarea rows="10" class="form-control square" name="service_desc" id="service_desc" class="form-control square" disabled>
      </textarea>
    <?php }?>  
    
  </div>
</div>
