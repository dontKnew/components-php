<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));
/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @theme: Default Style
 * @copyright © 2017 ProThemes.Biz
 *
 */
?>
<footer class="footer">
 		<!-- Widget Area -->
		<div class="b-widgets">
			<div class="container layout">
				<div class="row">
					<!-- About Us -->
					<div class="row-item col-md-6">
						<h3 class="footer-title"><?php echo $lang['RF107']; ?></h3>
						<div class="b-twitter m-footer">
                            <p><?php htmlPrint($themeOptions['contact']['about']); ?></p>
                        </div>
                        <div class="top10">
                    		<a class="ultm ultm-facebook ultm-32 ultm-color-to-gray" href="<?php echo $social_links['face']; ?>" target="_blank" rel="nofollow"></a>
                    		<a class="ultm ultm-twitter ultm-32 ultm-color-to-gray" href="<?php echo $social_links['twit']; ?>" target="_blank" rel="nofollow"></a>
                    		<a class="ultm ultm-google-plus-1 ultm-32 ultm-color-to-gray" href="<?php echo $social_links['gplus']; ?>" target="_blank" rel="nofollow"></a>
                        </div>
					</div>
					<!-- End About Us -->
					<!-- Tag Cloud -->
					<div class="row-item col-md-3">
						<h3 class="footer-title"><?php echo $lang['314']; ?></h3>
						<ul class="b-list just-links m-dark">
                            <?php getTopSEOTools($con, $themeOptions['general']['topTools']); ?>
						</ul>
					</div>
					<!-- End Tag Cloud -->
					<!-- Links -->
					<div class="row-item col-md-3">
						<h3 class="footer-title"><?php echo $lang['316']; ?></h3>
						<ul class="b-list just-links m-dark">
                            <?php
                            foreach($footerLinks as $footerLink)
                                echo $footerLink[1];
                            ?>
						</ul>
					</div>
					<!-- End Links -->
				</div>
			</div>
		</div>
		<!-- End Widget Area -->
       <div class="container">
        <div class="row">
            <div class="text-center footerCopyright">
            <!-- Powered By ProThemes.Biz --> 
            <!-- Contact Us: http://prothemes.biz/index.php?route=information/contact --> 
            <?php echo $copyright; ?>
            </div>
        </div>
       </div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo $ga; ?>', 'auto');
  ga('send', 'pageview');

</script>

</footer>             

<!-- Bootstrap -->
<script src="<?php themeLink('js/bootstrap.min.js'); ?>" type="text/javascript"></script>

<!-- Sweet Alert -->
<script type='text/javascript' src='<?php themeLink('js/sweetalert.min.js'); ?>'></script>

<!-- App JS -->
<script src="<?php themeLink('js/app.js'); ?>" type="text/javascript"></script>

<!-- Master JS -->
<script src="<?php createLink('rainbow/master-js'); ?>" type="text/javascript"></script>

<!-- Sign in -->
<div class="modal fade loginme" id="signin" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php trans('Sign In',$lang['RF57']); ?></h4>
			</div>
            <form method="POST" action="<?php createLink('account/login'); ?>" class="loginme-form">
			<div class="modal-body">
				<div class="alert alert-warning">
					<button type="button" class="close dismiss">&times;</button><span></span>
				</div>
                <?php if($enable_oauth){ ?>
				<div class="form-group connect-with">
					<div class="info"><?php trans('Sign in using social network',$lang['RF58']); ?></div>
					<a href="<?php createLink('facebook/login'); ?>" class="connect facebook" title="<?php trans('Sign in using Facebook',$lang['RF59']); ?>"><?php trans('Facebook',$lang['RF62']); ?></a>
		        	<a href="<?php createLink('google/login'); ?>" class="connect google" title="<?php trans('Sign in using Google',$lang['RF60']); ?>"><?php trans('Google',$lang['RF63']); ?></a>  	
		        	<a href="<?php createLink('twitter/login'); ?>" class="connect twitter" title="<?php trans('Sign in using Twitter',$lang['RF61']); ?>"><?php trans('Twitter',$lang['RF64']); ?></a>		        
			    </div>
                <?php } ?>
   				<div class="info"><?php trans('Sign in with your username',$lang['RF65']); ?></div>
				<div class="form-group">
					<label><?php trans('Username',$lang['RF66']); ?> <br />
						<input type="text" name="username" class="form-input width96" />
					</label>
				</div>	
				<div class="form-group">
					<label><?php trans('Password',$lang['RF67']); ?> <br />
						<input type="password" name="password" class="form-input width96" />
					</label>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary pull-left"><?php trans('Sign In',$lang['RF57']); ?></button>
				<div class="pull-right align-right">
				    <a href="<?php createLink('account/forget'); ?>"><?php trans('Forgot Password',$lang['RF68']); ?></a><br />
					<a href="<?php createLink('account/resend'); ?>"><?php trans('Resend Activation Email',$lang['RF69']); ?></a>
				</div>
			</div>
			 <input type="hidden" name="signin" value="<?php echo md5($date.$ip); ?>" />
             <input type="hidden" name="quick" value="<?php echo md5(randomPassword()); ?>" />
			</form> 
		</div>
	</div>
</div>  

<!-- Sign up -->
<div class="modal fade loginme" id="signup" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php trans('Sign Up',$lang['RF70']); ?></h4>
			</div>
			<form action="<?php createLink('account/register'); ?>" method="POST" class="loginme-form">
			<div class="modal-body">
				<div class="alert alert-warning">
					<button type="button" class="close dismiss">&times;</button><span></span>
				</div>
                <?php if($enable_oauth){ ?>
				<div class="form-group connect-with">
					<div class="info"><?php trans('Sign in using social network',$lang['RF58']); ?></div>
					<a href="<?php createLink('facebook/login'); ?>" class="connect facebook" title="<?php trans('Sign in using Facebook',$lang['RF59']); ?>"><?php trans('Facebook',$lang['RF62']); ?></a>
		        	<a href="<?php createLink('google/login'); ?>" class="connect google" title="<?php trans('Sign in using Google',$lang['RF60']); ?>"><?php trans('Google',$lang['RF63']); ?></a>  	
		        	<a href="<?php createLink('twitter/login'); ?>" class="connect twitter" title="<?php trans('Sign in using Twitter',$lang['RF61']); ?>"><?php trans('Twitter',$lang['RF64']); ?></a>		        
			    </div>
                <?php } ?>
   				<div class="info"><?php trans('Sign up with your email address',$lang['RF71']); ?></div>
				<div class="form-group">
					<label><?php trans('Username',$lang['RF66']); ?> <br />
						<input type="text" name="username" class="form-input width96" />
					</label>
				</div>	
				<div class="form-group">
					<label><?php trans('Email',$lang['RF73']); ?> <br />
						<input type="text" name="email" class="form-input width96" />
					</label>
				</div>
				<div class="form-group">
					<label><?php trans('Full Name',$lang['RF72']); ?> <br />
						<input type="text" name="full" class="form-input width96" />
					</label>
				</div>
				<div class="form-group">
					<label><?php trans('Password',$lang['RF67']); ?> <br />
						<input type="password" name="password" class="form-input width96" />
					</label>
				</div>
				</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary"><?php trans('Sign Up',$lang['RF70']); ?></button>	
			</div>
			<input type="hidden" name="signup" value="<?php echo md5($date.$ip); ?>" />
            <input type="hidden" name="quick" value="<?php echo md5(randomPassword()); ?>" />
			</form>
		</div>
	</div>
</div>

<!-- XD Box -->
<div class="modal fade loginme" id="xdBox" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button id="xdClose" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="xdTitle"></h4>
			</div>
			<div class="modal-body" id="xdContent">

            </div>
		</div>
	</div>
</div>
<?php if(isset($footerAddArr)){ 
    foreach($footerAddArr as $footerCodes)
        echo $footerCodes;
} ?>
</body>
</html>