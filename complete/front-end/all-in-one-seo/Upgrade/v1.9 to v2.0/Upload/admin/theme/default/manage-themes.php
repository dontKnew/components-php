<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright © 2017 ProThemes.Biz
 *
 */
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $pageTitle; ?>  
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php adminLink(); ?>"><i class="<?php getAdminMenuIcon($controller,$menuBarLinks); ?>"></i> Admin</a></li>
        <li class="active"><a href="<?php adminLink($controller); ?>"><?php echo $pageTitle; ?></a> </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $subTitle; ?></h3>
            </div><!-- /.box-header ba-la-ji -->
            <form action="#" method="POST">
            <div class="box-body">
          
            <?php if(isset($msg)) echo $msg; ?><br />

<div class="row">
<?php 
    foreach(getThemeList() as $themes){ 
    $themeDirRaw = $themes[0]; $themeDir = $themes[1]; $themeDetails = $themes[2]; $previewLink = '';

    if(file_exists($themeDir.D_S.$themeDetails['preview']))
        $previewLink = createLink('theme/'.$themeDirRaw.'/'.$themeDetails['preview'],true);
    else
        $previewLink  = createLink('core/library/img/no-preview.png',true);;
?>
  
    <div class="col-sm-6 col-md-4">
        <div class="panel panel-white themePanel">
            <div class="panel-body themePanelBody">
                <img src="<?php echo $previewLink; ?>" alt="<?php echo $themeDetails['description']; ?>" class="screenPreview img-responsive" />
            </div>
            <div class="panel-footer">
                <h4 class="remove-margin-bottom">
                    <a href="" class="theme-title"><?php echo $themeDetails['name']; ?></a>
                </h4>
                <p class="font-small author">By <?php echo $themeDetails['author']; ?></p>
                <div class="clearfix font-small purchases-col">
                    <div class="pull-right">
                        <?php if($defaultTheme == $themes[0]){ ?>
                        <a class="btn btn-primary btn-xs disabled" href=""> <i class="fa fa-paint-brush"></i> &nbsp; Active </a>
                        <?php } else{ ?>
                        <a class="btn btn-primary btn-xs" onclick="return confirm('Are you want to make default template?');" href="<?php adminLink('ajax/theme/set/frontend/'.$themes[0]); ?>"> <i class="fa fa-paint-brush"></i> &nbsp; Apply </a>
                        <?php } ?>
                        <a href="<?php createLink('templates/preview/'.$themes[0]); ?>" target="_blank" class="btn btn-success btn-xs"> <i class="fa fa-eye"></i> &nbsp; Preview </a> 
                        <?php if(!nullCheck($themeDetails['builder'])){ ?>
                        <a target="_blank" class="btn btn-danger btn-xs" href="<?php adminLink($themeDetails['builder']); ?>"> <i class="fa fa-edit"></i> &nbsp; Edit </a> 
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php } ?>

</div> 
             <br />
            </div><!-- /.box-body -->
            </form>
          </div><!-- /.box -->
  
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->