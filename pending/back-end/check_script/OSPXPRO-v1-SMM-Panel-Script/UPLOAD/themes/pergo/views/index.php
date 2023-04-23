<!DOCTYPE html>
<html lang="en">
<head><meta charset="windows-1252">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="<?=get_option('website_desc', "OSPXPro - #1 SMM Reseller Panel - Best SMM Panel for Resellers. Also well known for TOP SMM Panel and Cheap SMM Panel for all kind of Social Media Marketing Services. SMM Panel for Facebook, Instagram, YouTube and more services!")?>">
    <meta name="keywords" content="<?=get_option('website_keywords', "smm panel, OSPXPro, smm reseller panel, smm provider panel, reseller panel, instagram panel, resellerpanel, social media reseller panel, smmpanel, panelsmm, smm, panel, socialmedia, instagram reseller panel")?>">
    <title><?=get_option('website_title', "OSPXPro - SMM Panel Reseller Tool")?></title>

    <link rel="shortcut icon" type="image/x-icon" href="<?=get_option('website_favicon', BASE."assets/images/favicon.png")?>">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
  
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->




      <link rel="stylesheet" type="text/css" href="/osp/css/css.css">
      <link rel="stylesheet" type="text/css" href="/osp/css/css1.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
         body { 
         background-color: #05012f !important;
                background-image: -moz-linear-gradient( 135deg, rgba(12, 8, 48, 0.8) 0%, rgb(13, 5, 99) 100%);
    background-image: -webkit-linear-gradient( 135deg, rgba(12, 8, 48, 0.8) 0%, rgb(13, 5, 99) 100%);
    background-image: -ms-linear-gradient( 135deg, rgba(12, 8, 48, 0.8) 0%, rgb(13, 5, 99) 100%);
    background-image: linear-gradient( 135deg, rgba(12, 8, 48, 0.8) 0%, rgb(5, 1, 41) 100%); }
      </style>
      
      
       <script type="text/javascript">
      var token = '<?=$this->security->get_csrf_hash()?>',
          PATH  = '<?=PATH?>',
          BASE  = '<?=BASE?>';
      var    deleteItem = '<?=lang("Are_you_sure_you_want_to_delete_this_item")?>';
      var    deleteItems = '<?=lang("Are_you_sure_you_want_to_delete_all_items")?>';
    </script>
    <?=htmlspecialchars_decode(get_option('embed_head_javascript', ''), ENT_QUOTES)?>
  </head>

 <body
            class="  ">
  
	<header class="header">
        <div class="color"></div>
        <div class="wrapper">
            <div class="header-inner">
              <div class="logo"><a href="/"><img src="<?=get_option('website_logo', BASE."assets/images/logo.png")?>" class="logo-img" alt="Logo"></a></div>
                <nav class="main-nav">
                    <ul>
                      <li class="nav-link">
                        <a href="/" style="color:white;text-decoration:none">
                            Home
                          </a>
                      	</li>
                      	 <li class="nav-link">
                        <a href="/faq" style="color:white;text-decoration:none">
                            FAQs
                          </a>
                      	</li>
                      	<li class="nav-link">
                        <a href="/terms" style="color:white;text-decoration:none">
                            Terms
                          </a>
                      	</li>
					                                            <?php
                if (get_option("enable_service_list_no_login") == 1) {
              ?> <li class="nav-link">
                          <a href="<?=cn("services")?>" style="color:white;text-decoration:none">
                            Services
                          </a>
                      	</li> <?php }?>
                      						                                              <li class="nav-link">
                          <a href="/api" style="color:white;text-decoration:none">
                            API
                          </a>
                      	</li>
                      						                      </ul>
                </nav>
                
                
                <div class="sign-in"> 
                <?php 
                if (!session('uid')) {
              ?>
                                    <a href="<?=cn('auth/login')?>" class="orange-btn empty-btn login-btn">Login</a>
                                    
                                     <?php if(!get_option('disable_signup_page')){ ?>
                                     <a href="<?=cn('auth/signup')?>" class="orange-btn full-btn">sign up</a>
                                     <?php }; ?>
                                     
                                     <?php }else{?>
                                     <a href="<?=cn('statistics')?>" class="orange-btn full-btn"><?=lang("statistics")?></a>
                                     <?php }?>
               </div>
             <button class="burger" id="main-burger" style="display:none">
              <span></span>
              <span></span>
              <span></span>
            </button>
            </div>
        </div>
    </header>

<div id="mainPage" />
<img class="layer layer-8" src="/osp/images/fog.svg">
    <div class="hero">
        <div class="wrapper"><img class="layer layer-1" src="/osp/images/Ellipse.svg">
            <div class="hero-inner">
                <div class="hero-tittle">
                     <h1>Providing Powerful Automation Services for <b style="color:#f16845;"><span id="description-rotate"></span></b></h1>
                   <p class="headerSmallText"><b style="color:#ff8400;"> 🏁</b> The Most Reliable Panel on the market with <b style="color:#f16845;">250K+</b> Orders until now!</p>
                  <a href="<?=cn('auth/signup')?>" style="color:inherit"><button class="orange-btn full-btn">get started</button></a>
                </div>
                <div class="hero-image">
                    <div class="radial-gradient-hero"></div><img class="layer rocket layer-2" src="/osp/images/rocketman.svg"> <img class="layer icons layer-3" src="/osp/images/facebook-icon.svg"> <img class="layer icons layer-4" src="/osp/images/fb-like-icon.svg"> <img class="layer icons layer-5" src="/osp/images/instagram-icon.svg"> <img class="layer icons layer-6" src="/osp/images/like-icon.svg"> <img class="layer icons layer-7" src="/osp/images/play-iconm.svg"></div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <div class="stats">
            <div class="stats-img"><img class="layer-9" src="/osp/images/hand.svg"> <img class="layer-10" src="/osp/images/arrow 2.svg"> <img class="layer-11" src="/osp/images/arrow 2.svg"> <img class="layer-12" src="/osp/images/instagram-icon.svg"> <img class="layer-13" src="/osp/images/instagram-icon.svg"> <img class="layer-14" src="/osp/images/fb-like-icon.svg"></div>
            <div class="stats-info">
                <div class="members slide-up stat-info-inner"><img class="stats-info_icon" src="/osp/images/member-icon.svg">
                    <p>Active Members</p>
                    <h1>26K+</h1></div>
                <div class="chart slide-up stat-info-inner"><img class="stats-info_icon" src="/osp/images/chart.svg">
                    <p>Total Orders on OSPXPro</p>
                    <h1>250K+</h1></div>
                <div class="dollar slide-up stat-info-inner"><img class="stats-info_icon" src="/osp/images/dollar.svg">
                    <p>Prices Starting at</p>
                    <h1>$0.005 / 1,000</h1></div>
            </div>
        </div>
    </div>
    <div class="slider-outer">
        <div class="wrapper">
            <div class="arrows-wrapper">
                <div class="custom-arrows">
                    <li class="prev-arrow"><img src="/osp/images/prev.svg"></li>
                    <li class="next-arrow"><img src="/osp/images/next.svg"></li>
                </div>
            </div>
            <div class="slider">
                <div class="service"><img class="service-anim" src="/osp/images/like-orange.svg">
                    <h1 class="service-anim">Likes</h1>
                    <p class="service-anim">Likes for all social networks. We have the BEST Likes Services on the market.</p>
                </div>
                <div class="service"><img class="service-anim" src="/osp/images/followers.svg">
                    <h1 class="service-anim">Followers</h1>
                    <p class="service-anim">Gain followers Fast and Easy. Fast Delivery High Quality Users</p>
                </div>
                <div class="service"><img class="service-anim" src="/osp/images/views.svg">
                    <h1 class="service-anim">Views</h1>
                    <p class="service-anim">Get views for your posts to increase and attract new audience<a href="https://ownsmmpanel.in">.</a></p>
                </div>
                <div class="service"><img class="service-anim" src="/osp/images/chart-icon.svg">
                    <h1 class="service-anim">Website Traffic</h1>
                    <p class="service-anim">Private & Unique Ad-Networks 10M+ Active Visitors Per Month Market Cheapest!</p>
                </div>
                <div class="service"><img class="service-anim" src="/osp/images/star.svg">
                    <h1 class="service-anim">Social Signals</h1>
                    <p class="service-anim">Boost your Social Media Authority Important Factor for Search Engines!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="about">
        <h1 class="text-center">Automate Your Social Media Campaign Using SMM Panel</h1>
        <div class="city-bg"><img src="/osp/images/city.svg"></div>
        <div class="wrapper">
            <div class="about-inner">
                <div class="about-slide">
                    <div class="about-slide-info">
                        <h1>We Deliver Quality</h1>
                        <p>Services Analyzed and Tested every 6 hours to make sure that your orders will be delivered without issues.</p>
                    </div>
                    <div class="about-slide-image"><img src="https://res.cloudinary.com/GreatSMO/image/upload/v1591645095/Group_5_z0kxjc.png"></div>
                </div>
                <div class="about-slide">
                    <div class="about-slide-info">
                        <h1>Unique YouTube Views</h1>
                        <p> We Provide 100% Real & Human Viewers, NO Bots / Spam methods used<a href="https://ownsmmpanel.in">.</a> Our YouTube Views RAV™ and Live Stream Views help in ranking and can be running with Ads ON.</p>
                    </div>
                    <div class="about-slide-image"><img src="/osp/images/333.png"></div>
                </div>
              <div class="about-slide">
                    <div class="about-slide-info">
                        <h1>Automate & Schedule EVERYTHING!</h1>
                        <p> You can use smm panel to automate your clients future needs without wasting your time, also, using our drip feed option,
        will make sure to deliver the service in the natural way, Check out our options.</p>
                    </div>
                    <div class="about-slide-image"><img src="/osp/images/222.png"></div>
                </div>
              <div class="about-slide">
                    <div class="about-slide-info">
                        <h1>Resellers One Stop Shop for SMM Services</h1>
                        <p>Full API Support, From Payment to Delivery 100% Hands Free!<br>
        Get <a href="https://ownsmmpanel.in" tabindex="0"> SMM Panel Script</a> and start your own SMM Reseller business</p></p>
                    </div>
                    <div class="about-slide-image"><img src="/osp/images/111.png"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="cta">
        <div class="wrapper">
            <p class="cta-anim">We have a <span>professional and cheap SMM Panel</span> ready to serve you anytime you need with instant start and amazing speed to deliver your SMM work with <span>efficacy and speed.</span> We are waiting for your orders starting today and please note that we accept <span>auto payments</span> for your orders and we have API to serve any SMM Reseller around the globe.</p><a class="cta-anim link-cta" href="<?=cn('auth/signup')?>">Get Started!</a></div>
    </div>
    
   
    
    <footer class="footer">
        <div class="wrapper">
            <div class="footer-inner">
                <p><?=get_option('copy_right_content',"Copyright &copy; 2021 - OwnSMMPanel");?></p>
                <div class="social-icon">
                  <a href="<?=get_option('social_instagram_link','')?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                
                  <a href="mailto:<?=get_option('contact_email',"ownsmmpanel@gmail.com")?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
              </div>
            </div>
        </div>
    </footer>
     
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/plugins/CSSRulePlugin.min.js"></script>
   


<script>
 document.querySelector(".wrapper-main").classList.add("homePage");
</script></div>

  	

<!-- Main variables *content* -->

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js">
      </script>
      
  <script type="text/javascript" src="/osp/js/js.js">
      </script>
  <script type="text/javascript" src="/osp/js/js1.js">
      </script>
  <script type="text/javascript" src="/osp/js/js2.js">
      </script>
  <script type="text/javascript" src="/osp/js/js3.js">
      </script>
  <script type="text/javascript" src="/osp/js/js4.js">
      </script>
  <script type="text/javascript" src="/osp/js/js5.js">
      </script>
      
  <script type="text/javascript" >
     window.modules.layouts = {"auth":0};   </script>
  <script type="text/javascript" >
     window.modules.signin = [];   </script>
	<script>
      $('#main-burger').on('click', function() {
      	$('.header-inner').toggleClass('open');
      })
 	</script>
    
    
    <script src="<?=BASE?>assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="<?=BASE?>assets/js/vendors/jquery.sparkline.min.js"></script>
    <script src="<?=BASE?>assets/js/core.js"></script>
    <!-- toast -->
    <script type="text/javascript" src="<?=BASE?>assets/plugins/jquery-toast/js/jquery.toast.js"></script>

    <?php
      if (segment(1) != 'auth') {
    ?>
    <script src="<?=BASE?>assets/plugins/particles-js/particles.js"></script>
    <script src="<?=BASE?>assets/plugins/particles-js/app.js"></script>
    <script src="<?=BASE?>assets/plugins/particles-js/stats.js"></script>
    <script src="<?=BASE?>themes/regular/assets/js/theme.js"></script>
    <?php }?>

    <script src="<?=BASE?>assets/js/process.js"></script>
    <script src="<?=BASE?>assets/js/general.js"></script>
    <?=htmlspecialchars_decode(get_option('embed_javascript', ''), ENT_QUOTES)?>
    <script>
      $(document).ready(function(){
        var is_notification_popup = "<?=get_option('enable_notification_popup', 0)?>"
        setTimeout(function(){
            if (is_notification_popup == 1) {
              $("#notification").modal('show');
            }else{
              $("#notification").modal('hide');
            }
        },500);
     });
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
  </body>
</html>
