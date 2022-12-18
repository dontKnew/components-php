<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name Rainbow PHP Framework
 * @copyright © 2017 ProThemes.Biz
 *
 */
?>

<script src="<?php themeLink('js/validator.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">$(function () { $('#contact-form').validator(); });</script>

<div class="container  main-container">
    <div class="row">
      	
    <?php
    if($themeOptions['general']['sidebar'] == 'left')
        require_once(THEME_DIR."sidebar.php");
    ?>  

  	<div class="col-md-8 main-index">
      	<h2 id="title" class="text-center"><?php echo $lang['232']; ?></h2>
        <hr /><br />
        
        <div id="message">
            <?php if(isset($success)) { ?>
            <div class="alert alert-success">
                <button data-dismiss="alert" class="close" type="button">x</button>
                <i class="fa fa-check green"></i>							
                <b><?php trans('Alert!',$lang['RF20']); ?></b> <?php echo $success ?>
            </div>
            <?php } elseif(isset($error)) { ?>
            <div class="alert alert-danger">
                <button data-dismiss="alert" class="close" type="button">x</button>
                <i class="fa fa-ban red"></i>							
                <b><?php trans('Alert!',$lang['RF20']); ?></b> <?php echo $error ?>
            </div>
            <?php } ?>
        </div>

        <form id="contact-form" method="post" action="#" onsubmit="return captchaCodeCheckMsg()">

            <h4> <?php trans('We value all the feedbacks received from our customers.',$lang['RF9']); ?></h4>
            <?php trans('If you have any queries, comments, suggestions or have anything to talk about.',$lang['RF10']); ?>
            <br/>
            <br/>

            <div class="controls">
    
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_name"><?php trans('Name *',$lang['RF21']); ?></label>
                            <input value="<?php echo $name; ?>" id="form_name" type="text" name="name" class="form-control" placeholder="<?php trans('Please enter your fullname *',$lang['RF11']); ?>" required="required" data-error="<?php trans('Fullname is required',$lang['RF12']); ?>" />
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_email"><?php trans('Email *',$lang['RF22']); ?></label>
                            <input value="<?php echo $from; ?>" id="form_email" type="email" name="email" class="form-control" placeholder="<?php trans('Please enter your email *',$lang['RF13']); ?>" required="required" data-error="<?php trans('Valid email is required',$lang['RF14']); ?>" />
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_sub"><?php trans('Subject *',$lang['RF23']); ?></label>
                            <input value="<?php echo $sub; ?>" id="form_sub" type="text" name="sub" class="form-control" placeholder="<?php trans('Please enter your subject *',$lang['RF16']); ?>" required="required" data-error="<?php trans('Subject is required',$lang['RF15']); ?>" />
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_message"><?php trans('Message *',$lang['RF24']); ?></label>
                            <textarea id="form_message" name="message" class="form-control" placeholder="<?php trans('Please enter your message *',$lang['RF17']); ?>" rows="4" required="required" data-error="<?php trans('Please leave some message',$lang['RF18']); ?>"><?php echo $message; ?></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <?php if ($cap_contact) { echo $captchaCode; } ?>
                            <button type="submit" class="btn btn-primary btn-send"><i class="fa fa-envelope"></i> <?php trans('Send message',$lang['RF19']); ?></button>
                    </div>
                </div>
    
             </div>
        </form>  
    
        <br />
        
        <div class="xd_top_box text-center">
        <?php echo $ads_720x90; ?>
        </div>
        </div>  
        
        <?php
        if($themeOptions['general']['sidebar'] == 'right')
            require_once(THEME_DIR."sidebar.php");
        ?> 
                	
    </div>
</div> <br />