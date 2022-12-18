
          <?php
            $redirect = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
          ?>
          
          
            <?php 
              foreach ($languages as $key => $row) {
            ?>
           
            <?php }?>
            
            
      
          
<footer class="footer footer_bottom dark">
  <div class="container">
    <div class="row align-items-center flex-row-reverse">
      <div class="col-auto ml-lg-auto">
        <div class="row align-items-center">
          <div class="col-auto">
            <ul class="list-inline mb-0">
              <?php 
                if (get_option('social_facebook_link','') != '') {
              ?>
              <li class="list-inline-item"><a href="<?=get_option('social_facebook_link','')?>" target="_blank" class="btn btn-icon btn-facebook"><i class="fa fa-facebook"></i></a></li>
              <?php }?>
              <?php 
                if (get_option('social_twitter_link','') != '') {
              ?>
              <li class="list-inline-item"><a href="<?=get_option('social_twitter_link','')?>" target="_blank" class="btn btn-icon btn-twitter"><i class="fa fa-twitter"></i></a></li>
              <?php }?>
              <?php 
                if (get_option('social_instagram_link','') != '') {
              ?>
              <li class="list-inline-item"><a href="<?=get_option('social_instagram_link','')?>" target="_blank" class="btn btn-icon btn-instagram"><i class="fa fa-instagram"></i></a></li>
              <?php }?>

              <?php 
                if (get_option('social_pinterest_link','') != '') {
              ?>
              <li class="list-inline-item"><a href="<?=get_option('social_pinterest_link','')?>" target="_blank" class="btn btn-icon btn-pinterest"><i class="fa fa-pinterest"></i></a></li>
              <?php }?>

              <?php 
                if (get_option('social_tumblr_link','') != '') {
              ?>
              <li class="list-inline-item"><a href="<?=get_option('social_tumblr_link','')?>" target="_blank" class="btn btn-icon btn-vk"><i class="fa fa-tumblr"></i></a></li>
              <?php }?>

              <?php 
                if (get_option('social_youtube_link','') != '') {
              ?>
              <li class="list-inline-item"><a href="<?=get_option('social_youtube_link','')?>" target="_blank" class="btn btn-icon btn-youtube"><i class="fa fa-youtube"></i></a></li>
              <?php }?>

            </ul>
          </div>
        </div>
      </div>
      
      <?php
        $version = get_field(PURCHASE, ['pid' => 23595718], 'version');
        $version = 'Ver'.$version;
      ?>
      <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
        <?=get_option('copy_right_content',"Copyright &copy; 2020 - OwnSMMPanel.In"); ?>
      </div>
    </div>
  </div>
</footer>

