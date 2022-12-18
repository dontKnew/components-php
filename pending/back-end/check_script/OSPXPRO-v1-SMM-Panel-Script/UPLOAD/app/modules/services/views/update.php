<div id="main-modal-content">
  <div class="modal-right">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <?php
          $ids = (!empty($service->ids))? $service->ids: '';
          if ($ids != "") {
            $url = cn($module."/ajax_update/$ids");
          }else{
            $url = cn($module."/ajax_update");
          }
        ?>
        <form class="form actionForm" action="<?=$url?>" method="POST">
          <div class="modal-header bg-pantone">
            <h4 class="modal-title"><i class="fa fa-edit"></i> <?=lang("edit_service")?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <div class="form-body" id="add_edit_service">
              <div class="row justify-content-md-center">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group emoji-picker-container">
                    <label ><?=lang("package_name")?></label>
                    <input type="text"  data-emojiable="true" class="form-control square" name="name" value="<?=(!empty($service->name))? $service->name: ''?>">
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?=lang("choose_a_category")?></label>
                    <select  name="category" class="form-control square">
                      <?php if(!empty($categories)){
                        foreach ($categories as $key => $category) {
                      ?>
                      <option value="<?=$category->id?>" <?=(!empty($service->ids) && $category->id == $service->cate_id)? 'selected': ''?> ><?=$category->name?></option>
                     <?php }}?>
                    </select>
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label><?=lang("minimum_amount")?></label>
                    <input type="number" class="form-control square" name="min" value="<?=(!empty($service->min))? $service->min :  get_option('default_min_order',"")?>">
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label><?=lang("maximum_amount")?></label>
                    <input type="number" class="form-control square" name="max" value="<?=(!empty($service->max))? $service->max : get_option('default_max_order',"")?>">
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label><?=lang("Price")?></label>
                    <input type="text" class="form-control square" name="price" value="<?=(!empty($service->price))? $service->price: currency_format(get_option('default_price_per_1k',"0.80"),2)?>">
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label><?=lang("Status")?></label>
                    <select name="status" class="form-control square">
                      <option value="1" <?=(!empty($service->status) && $service->status == 1)? 'selected': ''?>><?=lang("Active")?></option>
                      <option value="0" <?=(isset($service->status) && $service->status != 1)? 'selected': ''?>><?=lang("Deactive")?></option>
                    </select>
                  </div>
                </div>
      
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Service type</label>
                    <select name="service_type" class="form-control square ajaxChangeServiceType">
                      <?php
                        $service_type_array = array(
                          'default'                 => lang('Default'),
                          'subscriptions'           => lang('Subscriptions'),
                          'custom_comments'         => lang('custom_comments'),
                          'custom_comments_package' => lang('custom_comments_package'),
                          'mentions_with_hashtags'  => lang('mentions_with_hashtags'),
                          'mentions_custom_list'    => lang('mentions_custom_list'),
                          'mentions_hashtag'        => lang('mentions_hashtag'),
                          'mentions_user_followers' => lang('mentions_user_followers'),
                          'mentions_media_likers'   => lang('mentions_media_likers'),
                          'package'                 => lang('package'),
                          'comment_likes'           => lang('comment_likes'),
                        );

                        foreach ($service_type_array as $type => $service_type) {
                      ?>

                      <option value="<?=$type?>" <?=(isset($service->type) && $service->type == $type)? 'selected': ''?>><?=$service_type?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-12 dripfeed-form <?=(isset($service->type) && $service->type != 'default')? 'd-none': ''?>">
                  <div class="form-group">
                    <label><?=lang("dripfeed")?></label>
                    <select name="dripfeed" class="form-control square">
                      <option value="0" <?=(isset($service->dripfeed) && $service->dripfeed != 1)? 'selected': ''?>><?=lang("Deactive")?></option>
                      <option value="1" <?=(!empty($service->dripfeed) && $service->dripfeed == 1)? 'selected': ''?>><?=lang("Active")?></option>
                    </select>
                  </div>
                </div>

                <div class="col-md-12"> 
                  <div class="form-group">
                    <div class="form-label"><?=lang("Type")?></div>
                    <div class="custom-controls-stacked">
                      <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="add_type" value="manual" <?=(isset($service->add_type) && $service->add_type == 'api')? '': 'checked'?>>
                        <span class="custom-control-label"><?=lang('Manual')?></span>
                      </label>
                      <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="add_type" value="api" <?=(isset($service->add_type) && $service->add_type == 'api')? 'checked': ''?>>
                        <span class="custom-control-label"><?=lang('API')?></span>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 service-type <?=(isset($service->add_type) && $service->add_type == 'api')? '' : 'd-none'?>">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label><?=lang("api_provider_name")?></label>
                        <select name="api_provider_id" class="form-control square">
                          <option value="0" <?=(isset($service->api_provider_id) && $service->api_provider_id == "")? 'selected': ''?>><?=lang("Manual")?></option>
                          <?php
                            if (!empty($api_providers)) {
                            foreach ($api_providers as $type => $api_provider) {
                          ?>
                          <option value="<?=$api_provider->id?>" <?=(isset($service->api_provider_id) && $service->api_provider_id == $api_provider->id)? 'selected': ''?>><?=$api_provider->name?></option>
                          <?php }} ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label><?=lang("api_service_id")?></label>
                        <input type="text" class="form-control square" name="api_service_id" value="<?=(isset($service->api_service_id) && $service->api_service_id != "") ? $service->api_service_id: ''?>">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?=lang("Description")?></label>
                    <textarea rows="3" class="form-control square text-emoji" name="desc"><?=(!empty($service->desc))? html_entity_decode($service->desc, ENT_QUOTES): ''?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="<?=cn("api_provider/services")?>" class="btn round btn-info btn-min-width mr-1 mb-1"><?=lang("add_new_service_via_api")?></a>
            <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1"><?=lang("Submit")?></button>
            <button type="button" class="btn round btn-default btn-min-width mr-1 mb-1" data-dismiss="modal"><?=lang("Cancel")?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  // Check post type
  $(document).on("change","input[type=radio][name=add_type]", function(){
    _that = $(this);
    _type = _that.val();
    if(_type == 'api'){
      $('.service-type').removeClass('d-none');
    }else{
      $('.service-type').addClass('d-none');
    }
  });
</script>

<script>
  $(function() {
    window.emojiPicker = new EmojiPicker({
      emojiable_selector: '[data-emojiable=true]',
      assetsPath: "<?=BASE?>assets/plugins/emoji-picker/lib/img/",
      popupButtonClasses: 'fa fa-smile-o'
    });
    window.emojiPicker.discover();
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $(".text-emoji").emojioneArea({
      pickerPosition: "top",
      tonesStyle: "bullet"
    });
  });
</script>