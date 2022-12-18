<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: A to Z SEO Tools v2 - PHP Script
 * @copyright 2019 ProThemes.Biz
 *
 */
?>
    <style>
        @media only screen and (min-width: 600px) {
            .table-responsive {
                overflow-x: hidden;
            }
        }
    </style>
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
    
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#recent-access" data-toggle="tab"><?php echo $subTitle; ?></a></li>
                <li><a href="#user-query" data-toggle="tab">User Query</a></li>
            </ul>
          
          <div class="tab-content">

            <?php if(isset($msg)) echo $msg; ?><br />
            <div class="tab-pane active" id="recent-access" >
                <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="userHisTable">
                	<thead>
                		<tr>
                              <th>Tool Name</th>
                              <th>Username</th>
                              <th>User IP</th>
                              <th>User Country</th>
                              <th>Date</th>
                		</tr>
                	</thead>         
                    <tbody>                        
                    </tbody>
                </table>
                </div>
            </div>   
            
            <div class="tab-pane" id="user-query" >
                <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="userQueryTable">
                	<thead>
                		<tr>
                          <th style="width: 150px;">Tool Name</th>
                          <th style="width: 450px;">User Query</th>
                          <th>Username</th>
                          <th>User IP</th>
                          <th>Date</th>
                		</tr>
                	</thead>         
                    <tbody>                        
                    </tbody>
                </table>
                </div>
            </div>  
            
            <br />
        </div> </div>
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
<?php 
$ajaxLink = adminLink('?route=ajax/userQuery',true); 
$ajaxLink2 = adminLink('?route=ajax/userHis',true); 
$footerAddArr[] = <<<EOD
    <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    	$('#userQueryTable').dataTable( {
    		"processing": true,
    		"serverSide": true,
    		"ajax": "$ajaxLink",
            "aaSorting": [[0, 'desc']]
    	} );
    } );
    </script>
    <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    	$('#userHisTable').dataTable( {
    		"processing": true,
    		"serverSide": true,
    		"ajax": "$ajaxLink2",
            "aaSorting": [[0, 'desc']]
    	} );
    } );
    </script>
EOD;
?>