<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));
/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @theme: Default Style
 * @copyright 2018 ProThemes.Biz
 *
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="Content-Language" content="<?php echo (ACTIVE_LANG); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" type="image/png" href="<?php echo $themeOptions['general']['favicon']; ?>" />

        <!-- Meta Data-->
        <title><?php echo $metaTitle; ?></title>
                
        <meta property="site_name" content="<?php echo $site_name; ?>"/>
        <meta name="description" content="<?php echo $des; ?>" />
        <meta name="keywords" content="<?php echo $keyword; ?>" />
        <meta name="author" content="Balaji" />
        
        <!-- Open Graph -->
        <meta property="og:title" content="<?php echo $metaTitle; ?>" />
        <meta property="og:site_name" content="<?php echo $site_name; ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="<?php echo $des; ?>" />
        <meta property="og:image" content="<?php echo (substr($server_path,-1) == '/' ? substr($server_path,0,-1) : $server_path).$logo_path?>"/>
        <meta property="og:url" content="<?php echo $currentLink; ?>" />

        <?php genCanonicalData($baseURL, $currentLink, $loadedLanguages, false, isSelected($themeOptions['general']['langSwitch'])); ?>

        <!-- Main style -->
        <link href="<?php themeLink('css/theme.css'); ?>" rel="stylesheet" />
        
        <!-- Font-Awesome -->
        <link href="<?php themeLink('css/font-awesome.min.css'); ?>" rel="stylesheet" />
                
        <!-- Custom Theme style -->
        <link href="<?php themeLink('css/custom.css'); ?>" rel="stylesheet" type="text/css" />
        
        <?php if($isRTL) echo '<link href="'.themeLink('css/rtl.css',true).'" rel="stylesheet" type="text/css" />'; ?>
        
        <!-- jQuery 1.10.2 -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        
        <?php if($themeOptions['custom']['css'] != '') echo '<style>'.htmlPrint($themeOptions['custom']['css'],true).'</style>'; ?>
    </head>

<body>   
   <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-menu">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php createLink(); ?>">
                        <?php echo $themeOptions['general']['themeLogo']; ?>
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="collapse-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <?php 
                            foreach($headerLinks as $headerLink)
                                echo $headerLink[1];
                            echo $loginNav; 
                            if(isSelected($themeOptions['general']['langSwitch'])){ ?>
        					<li class="dropdown">
        						<a href="javascript:void(0)" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false"><i class="fa fa-globe fa-lg"></i> &nbsp; <?php echo strtoupper(ACTIVE_LANG); ?></a>
        						<ul class="dropdown-menu">
                                    <?php foreach($loadedLanguages as $language){
        							      echo '<li><a href="'.customLangLink($_SERVER["REQUEST_URI"], $language[2], $subPath, true).'">'.$language[3].'</a></li>';
                                    }?>
        						</ul>
        					</li>
                           <?php } ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
    </nav><!--/.navbar-->  

<?php if(isSelected($other['other']['maintenance'])){ ?>
    <div class="alert alert-error text-center" style="margin: 35px 140px -10px 140px;">
    <strong>Alert!</strong> &nbsp; Your website is currently set to be closed.
    </div>
<?php } ?>