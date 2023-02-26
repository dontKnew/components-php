<!-- Change the theme color if it is set -->
   <script type="text/javascript">
    if(theme_skin!='skin-blue'){
      $("body").addClass(theme_skin);
      $("body").removeClass('skin-blue');
    }
    if(sidebar_collapse=='true'){
      $("body").addClass('sidebar-collapse');
    }
  </script> 
  <!-- end -->

<?php 
    $CI =& get_instance();
  ?>
<header class="main-header">

    <!-- Logo -->
    <a href="<?php echo $base_url; ?>dashboard" class="logo">
      <span class="logo-mini"><b>POS</b></span>
      <span class="logo-lg"><b><?php  echo $SITE_TITLE;?></b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="btn-group hidden-xs">
            <a href="#" class="btn navbar-btn btn-success dropdown-toggle "   data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-plus"></i> 
            </a>
            <ul class="dropdown-menu" >
                  <?php if($CI->permissions('sales_add')) { ?>
                  <li class="border_bottom">
                    <a href="<?php echo $base_url; ?>sales/add" ><h4><i class="fa fa-plus text-green"></i> <?= $this->lang->line('sales'); ?></h4></a>
                  </li> 
                  <?php } ?>
                  <?php if($CI->permissions('purchase_add')) { ?>
                  <li class="border_bottom">
                    <a href="<?php echo $base_url; ?>purchase/add" ><h4><i class="fa fa-plus text-green"></i> <?= $this->lang->line('purchase'); ?></h4></a>
                  </li> 
                  <?php } ?>
                  <?php if($CI->permissions('customers_add')) { ?>
                  <li class="border_bottom">
                    <a href="<?php echo $base_url; ?>customers/add" ><h4><i class="fa fa-plus text-green"></i> <?= $this->lang->line('customer'); ?></h4></a>
                  </li> 
                  <?php } ?>
                  <?php if($CI->permissions('suppliers_add')) { ?>
                  <li class="border_bottom">
                    <a href="<?php echo $base_url; ?>suppliers/add" ><h4><i class="fa fa-plus text-green"></i> <?= $this->lang->line('supplier'); ?></h4></a>
                  </li>
                  <?php } ?>
                  <?php if($CI->permissions('items_add')) { ?>
                  <li class="border_bottom">
                    <a href="<?php echo $base_url; ?>items/add" ><h4><i class="fa fa-plus text-green"></i> <?= $this->lang->line('item'); ?></h4></a>
                  </li> 
                  <?php } ?>
                  <?php if($CI->permissions('expense_add')) { ?>
                  <li class="border_bottom">
                    <a href="<?php echo $base_url; ?>expense/add" ><h4><i class="fa fa-plus text-green"></i> <?= $this->lang->line('expense'); ?></h4></a>
                  </li>  
                  <?php } ?>
            </ul>
        </div>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
       
        <ul class="nav navbar-nav">
          <!-- <li class="text-center hidden-xs" id="">
            <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search Sales Invoice">
            </div>
          </form> 
          </li> -->
          <!-- User Account Menu -->
            
            <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle text-right" data-toggle="dropdown" title="App Language" data-toggle='tooltip'>
              <i class="fa fa-language "></i>
                    <?= $this->session->userdata('language'); ?>
            </a>
            <ul class="dropdown-menu " style="width: auto;height: auto;">
              <li>
                <ul class="menu">
                  <?php 
                  $lang_query=$this->db->query('select * from db_languages where status=1 order by language asc');
                  foreach ($lang_query->result() as $res) { 
                    $selected='';
                    if($this->session->userdata('language')==$res->language){
                      $selected ='text-blue';
                    }
                    ?>
                    <li>
                    <a href="<?= $base_url;?>site/langauge/<?= $res->id;?>" ><h3 class='<?=$selected;?>'><?= $res->language;?></h3></a>
                  </li>  
                  <?php } ?>
                </ul>
              </li>
            </ul>
          </li>
          
          <?php if($CI->permissions('sales_add')) { ?>
          <li class="text-center" id="">
            <a title="POS" href="<?php echo $base_url; ?>pos"><i class="fa fa-plus-square " ></i> POS </a>   
          </li>
          <?php } ?>

          <li class="text-center hidden-xs" id="">
            <a title="Dashboard" href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard " ></i> <?= $this->lang->line('dashboard'); ?></a>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo get_profile_picture(); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php print ucfirst($this->session->userdata('inv_username')); ?></span>
            </a>

            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo get_profile_picture(); ?>" class="img-circle" alt="User Image">

                <p>
                 <?php print ucfirst($this->session->userdata('inv_username')); ?>
                  <small>Year <?=date("Y");?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo $base_url; ?>users/edit/<?= $this->session->userdata('inv_userid'); ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo $base_url; ?>logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <li class="hidden-xs">
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
 
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo get_profile_picture(); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php print ucfirst($this->session->userdata('inv_username')); ?><i class="fa fa-fw fa-check-circle text-aqua"></i></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <!--<li class="header">MAIN NAVIGATION</li>-->
		<li class="dashboard-active-li "><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard text-aqua"></i> <span><?= $this->lang->line('dashboard'); ?></span></a></li>
		
		
		<!--<li class="header">SALES</li>-->
    <?php if($CI->permissions('sales_add')  || $CI->permissions('sales_view') || $CI->permissions('sales_return_view') || $CI->permissions('sales_return_add')) { ?>
		<li class="pos-active-li sales-list-active-li sales-active-li sales-return-active-li sales-return-list-active-li treeview">
          <a href="#">
            <i class=" fa fa-shopping-cart text-aqua"></i> <span><?= $this->lang->line('sales'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <?php if($CI->permissions('sales_add')) { ?>
        <li class="pos-active-li"><a href="<?php echo $base_url; ?>pos"><i class="fa fa-calculator "></i> <span>POS</span></a></li>

		    <li class="sales-active-li"><a href="<?php echo $base_url; ?>sales/add"><i class="fa fa-plus-square-o "></i> <span><?= $this->lang->line('new_sales'); ?></span></a></li>
        <?php } ?>
        
        <?php if($CI->permissions('sales_view')) { ?>
        <li class="sales-list-active-li"><a href="<?php echo $base_url; ?>sales"><i class="fa fa-list "></i> <span><?= $this->lang->line('sales_list'); ?></span></a></li>
        <?php } ?>

        <?php if($CI->permissions('sales_return_add')) { ?>
        <li class="sales-return-active-li"><a href="<?php echo $base_url; ?>sales_return/create"><i class="fa fa-plus-square-o "></i> <span><?= $this->lang->line('new_sales_return'); ?></span></a></li>
        <?php } ?>

        <?php if($CI->permissions('sales_return_view')) { ?>
        <li class="sales-return-list-active-li"><a href="<?php echo $base_url; ?>sales_return"><i class="fa fa-list "></i> <span><?= $this->lang->line('sales_returns_list'); ?></span></a></li>
        <?php } ?>

          </ul>
        </li>
    <?php } ?>

		<!--<li class="header">CUSTOMERS</li>-->
    <?php if($CI->permissions('customers_add') || $CI->permissions('customers_view') || $CI->permissions('import_customers')) { ?>
    <li class="customers-view-active-li customers-active-li import_customers-active-li treeview">
          <a href="#">
            <i class="fa fa-group text-aqua"></i> <span><?= $this->lang->line('customers'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
         <?php if($CI->permissions('customers_add')) { ?>
        <li class="customers-active-li"><a href="<?php echo $base_url; ?>customers/add"><i class="fa fa-plus-square-o "></i> <span><?= $this->lang->line('new_customer'); ?></span></a></li>
        <?php } ?>
        <?php if($CI->permissions('customers_view')) { ?>
         <li class="customers-view-active-li"><a href="<?php echo $base_url; ?>customers"><i class="fa fa-list "></i> <span><?= $this->lang->line('customers_list'); ?></span></a></li>
         <?php } ?>

         <?php if($CI->permissions('import_customers')) { ?>
         <li class="import_customers-active-li"><a href="<?php echo $base_url; ?>import/customers"><i class="fa fa-arrow-circle-o-left "></i> <span><?= $this->lang->line('import_customers'); ?></span></a></li>
         <?php } ?>

          </ul>
        </li>    
    <?php } ?>

    <?php if($CI->permissions('purchase_add') || $CI->permissions('purchase_view') || $CI->permissions('purchase_return_view') || $CI->permissions('new_purchase_return')) { ?>
		<li class="purchase-list-active-li purchase-active-li purchase-returns-list-active-li purchase-returns-active-li treeview">
          <a href="#">
            <i class="fa fa-th-large text-aqua"></i> <span><?= $this->lang->line('purchase'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if($CI->permissions('purchase_add')) { ?>
    		    <li class="purchase-active-li"><a href="<?php echo $base_url; ?>purchase/add"><i class="fa fa-plus-square-o "></i> <span><?= $this->lang->line('new_purchase'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('purchase_view')) { ?>
            <li class="purchase-list-active-li"><a href="<?php echo $base_url; ?>purchase"><i class="fa fa-list "></i> <span><?= $this->lang->line('purchase_list'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('purchase_return_view')) { ?>
            <li class="purchase-returns-active-li"><a href="<?php echo $base_url; ?>purchase_return/create"><i class="fa fa-plus-square-o "></i> <span><?= $this->lang->line('new_purchase_return'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('purchase_return_view')) { ?>
            <li class="purchase-returns-list-active-li"><a href="<?php echo $base_url; ?>purchase_return"><i class="fa fa-list "></i> <span><?= $this->lang->line('purchase_returns_list'); ?></span></a></li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>
        <?php if($CI->permissions('suppliers_add') || $CI->permissions('suppliers_view') || $CI->permissions('import_suppliers')) { ?>
        <li class="suppliers-list-active-li suppliers-active-li import_suppliers-active-li treeview">
          <a href="#">
            <i class="fa fa-user-plus text-aqua"></i> <span><?= $this->lang->line('suppliers'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <?php if($CI->permissions('suppliers_add')) { ?>
              <li class="suppliers-active-li"><a href="<?php echo $base_url; ?>suppliers/add"><i class="fa fa-plus-square-o "></i> <span><?= $this->lang->line('new_supplier'); ?></span></a></li>
              <?php } ?>
              <?php if($CI->permissions('suppliers_view')) { ?>
              <li class="suppliers-list-active-li"><a href="<?php echo $base_url; ?>suppliers"><i class="fa fa-list "></i> <span><?= $this->lang->line('suppliers_list'); ?></span></a></li>
              <?php } ?>

              <?php if($CI->permissions('import_suppliers')) { ?>
               <li class="import_suppliers-active-li"><a href="<?php echo $base_url; ?>import/suppliers"><i class="fa fa-arrow-circle-o-left "></i> <span><?= $this->lang->line('import_suppliers'); ?></span></a></li>
               <?php } ?>
         
          </ul>
        </li>
        <?php } ?>
        
        <?php if($CI->permissions('items_add') || $CI->permissions('items_view') || $CI->permissions('items_category_add') || $CI->permissions('items_category_view') || $CI->permissions('brand_add') || $CI->permissions('brand_view') || $CI->permissions('print_labels')) { ?>
        <li class="items-list-active-li items-active-li  category-view-active-li category-active-li brand-active-li brand-view-active-li labels-active-li import_items-active-li treeview">
          <a href="#">
            <i class="fa fa-cubes text-aqua"></i> <span><?= $this->lang->line('items'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if($CI->permissions('items_add')) { ?>
            <li class="items-active-li"><a href="<?php echo $base_url; ?>items/add"><i class="fa fa-plus-square-o "></i> <span><?= $this->lang->line('new_item'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('items_view')) { ?>
            <li class="items-list-active-li"><a href="<?php echo $base_url; ?>items"><i class="fa fa-list "></i> <span><?= $this->lang->line('items_list'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('items_category_add')) { ?>
            <li class="category-active-li"><a href="<?php echo $base_url; ?>category/add"><i class="fa fa-plus-square-o "></i> <span><?= $this->lang->line('new_category'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('items_category_view')) { ?>
            <li class="category-view-active-li"><a href="<?php echo $base_url; ?>category/view"><i class="fa fa-list "></i> <span><?= $this->lang->line('categories_list'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('brand_add')) { ?>
            <li class="brand-active-li"><a href="<?php echo $base_url; ?>brands/add"><i class="fa fa-plus-square-o "></i> <span><?= $this->lang->line('new_brand'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('brand_view')) { ?>
            <li class="brand-view-active-li"><a href="<?php echo $base_url; ?>brands/view"><i class="fa fa-list "></i> <span><?= $this->lang->line('brands_list'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('print_labels')) { ?>
            <li class="labels-active-li"><a href="<?php echo $base_url; ?>items/labels"><i class="fa fa-barcode "></i> <span><?= $this->lang->line('print_labels'); ?></span></a></li>
            <?php } ?>

            <?php if($CI->permissions('import_items')) { ?>
               <li class="import_items-active-li"><a href="<?php echo $base_url; ?>import/items"><i class="fa fa-arrow-circle-o-left "></i> <span><?= $this->lang->line('import_items'); ?></span></a></li>
               <?php } ?>


          </ul>
        </li>
        <?php } ?>

        <?php if($CI->permissions('expense_add') || $CI->permissions('expense_view') || $CI->permissions('expense_category_add') || $CI->permissions('expense_category_view')) { ?>
       <li class="expense-list-active-li expense-active-li expense-category-active-li expense-category-list-active-li treeview">
          <a href="#">
            <i class="fa fa-minus-circle text-aqua"></i> <span><?= $this->lang->line('expenses'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if($CI->permissions('expense_add')) { ?>
            <li class="expense-active-li"><a href="<?php echo $base_url; ?>expense/add"><i class="fa fa-plus-square-o "></i> <span><?= $this->lang->line('new_expense'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('expense_view')) { ?>
            <li class="expense-list-active-li"><a href="<?php echo $base_url; ?>expense"><i class="fa fa-list "></i> <span><?= $this->lang->line('expenses_list'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('expense_category_add')) { ?>
            <li class="expense-category-active-li"><a href="<?php echo $base_url; ?>expense/category_add"><i class="fa fa-plus-square-o "></i> <span><?= $this->lang->line('new_category'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('expense_category_view')) { ?>
            <li class="expense-category-list-active-li "><a href="<?php echo $base_url; ?>expense/category"><i class="fa fa-list "></i> <span><?= $this->lang->line('categories_list'); ?></span></a></li>
            <?php } ?>

          </ul>
        </li>
        <?php } ?>
		

        
		

		<?php if($CI->permissions('places_add') || $CI->permissions('places_view')) { ?>
		<li class="country-active-li city-list-active-li country-list-active-li state-active-li state-list-active-li city-active-li treeview">
          <a href="#">
            <i class="fa fa-paper-plane-o text-aqua"></i> <span><?= $this->lang->line('places'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if($CI->permissions('places_add')) { ?>
            <li class="country-active-li"><a href="<?php echo $base_url; ?>country/add"><i class="fa fa-plus-square-o "></i> <span><?= $this->lang->line('new_country'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('places_view')) { ?>
            <li class="country-list-active-li "><a href="<?php echo $base_url; ?>country"><i class="fa fa-list "></i> <span><?= $this->lang->line('countries_list'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('places_add')) { ?>
            <li class="state-active-li"><a href="<?php echo $base_url; ?>state/add"><i class="fa fa-plus-square-o "></i> <span><?= $this->lang->line('new_state'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('places_view')) { ?>
            <li class="state-list-active-li "><a href="<?php echo $base_url; ?>state"><i class="fa fa-list "></i> <span><?= $this->lang->line('states_list'); ?></span></a></li>
            <?php } ?>
    </ul>
        </li>
    <?php } ?>

   
		<!--<li class="header">REPORTS</li>-->
    <?php if($CI->permissions('sales_report') || $CI->permissions('item_sales_report') || $CI->permissions('purchase_report') || $CI->permissions('purchase_return_report') || $CI->permissions('expense_report') || $CI->permissions('profit_report') || $CI->permissions('stock_report') || $CI->permissions('purchase_payments_report') || $CI->permissions('sales_payments_report') || $CI->permissions('expired_items_report')) { ?>
		<li class="report-sales-active-li report-sales-return-active-li report-purchase-active-li report-purchase-return-active-li report-expense-active-li report-profit-loss-active-li report-stock-active-li report-purchase-payments-active-li report-sales-item-active-li report-sales-payments-active-li report-expired-items-active-li treeview">
          <a href="#">
            <i class="fa fa-bar-chart text-aqua"></i> <span><?= $this->lang->line('reports'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <?php if($CI->permissions('profit_report')) { ?>
            <li class="report-profit-loss-active-li"><a href="<?php echo $base_url; ?>reports/profit_loss" ><i class="fa fa-files-o "></i> <span><?= $this->lang->line('profit_and_loss_report'); ?></span></a></li>
            <?php } ?>

            <?php if($CI->permissions('purchase_report')) { ?>
            <li class="report-purchase-active-li"><a href="<?php echo $base_url; ?>reports/purchase" ><i class="fa fa-files-o "></i> <span><?= $this->lang->line('purchase_report'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('purchase_return_report')) { ?>
            <li class="report-purchase-return-active-li"><a href="<?php echo $base_url; ?>reports/purchase_return" ><i class="fa fa-files-o "></i> <span><?= $this->lang->line('purchase_return_report'); ?></span></a></li>
            <?php } ?>

            <?php if($CI->permissions('purchase_payments_report')) { ?>
            <li class="report-purchase-payments-active-li"><a href="<?php echo $base_url; ?>reports/purchase_payments" ><i class="fa fa-files-o "></i> <span><?= $this->lang->line('purchase_payments_report'); ?></span></a></li>
            <?php } ?>

            <?php if($CI->permissions('item_sales_report')) { ?>
            <li class="report-sales-item-active-li"><a href="<?php echo $base_url; ?>reports/item_sales" ><i class="fa fa-files-o "></i> <span><?= $this->lang->line('item_sales_report'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('sales_report')) { ?>
            <li class="report-sales-active-li"><a href="<?php echo $base_url; ?>reports/sales" ><i class="fa fa-files-o "></i> <span><?= $this->lang->line('sales_report'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('sales_return_report')) { ?>
            <li class="report-sales-return-active-li"><a href="<?php echo $base_url; ?>reports/sales_return" ><i class="fa fa-files-o "></i> <span><?= $this->lang->line('sales_return_report'); ?></span></a></li>
            <?php } ?>
            
            <?php if($CI->permissions('sales_payments_report')) { ?>
            <li class="report-sales-payments-active-li"><a href="<?php echo $base_url; ?>reports/sales_payments" ><i class="fa fa-files-o "></i> <span><?= $this->lang->line('sales_payments_report'); ?></span></a></li>  
            <?php } ?>


            <?php if($CI->permissions('stock_report')) { ?>
            <li class="report-stock-active-li"><a href="<?php echo $base_url; ?>reports/stock" ><i class="fa fa-files-o "></i> <span><?= $this->lang->line('stock_report'); ?></span>
              </a></li>
            <?php } ?>

            <?php if($CI->permissions('expense_report')) { ?>
            <li class="report-expense-active-li"><a href="<?php echo $base_url; ?>reports/expense" ><i class="fa fa-files-o "></i> <span><?= $this->lang->line('expense_report'); ?></span></a></li>
            <?php } ?>
            
            
            
            
            
            <?php if($CI->permissions('expired_items_report')) { ?>
            <li class="report-expired-items-active-li"><a href="<?php echo $base_url; ?>reports/expired_items" ><i class="fa fa-files-o "></i> <span><?= $this->lang->line('expired_items_report'); ?></span></a></li>  
            <?php } ?>
	       </ul>
      </li>
      <?php } ?>

	   <!-- Users -->
     <?php if($CI->permissions('users_add') || $CI->permissions('users_view') || $CI->permissions('roles_view')) { ?>
     <li class="users-view-active-li users-active-li roles-list-active-li role-active-li treeview">
          <a href="#">
            <i class="fa fa-users text-aqua"></i> <span><?= $this->lang->line('users'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if($CI->permissions('users_add')) { ?>
            <li class="users-active-li"><a href="<?php echo $base_url; ?>users/"><i class="fa fa-plus-square-o "></i> <span><?= $this->lang->line('new_user'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('users_view')) { ?>
            <li class="users-view-active-li"><a href="<?php echo $base_url; ?>users/view"><i class="fa fa-list "></i> <span><?= $this->lang->line('users_list'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('roles_view')) { ?>
            <li class="roles-list-active-li role-active-li">
              <a href="<?php echo $base_url; ?>roles/view">
                <i class="fa fa-list "></i> 
                <span><?= $this->lang->line('roles_list'); ?></span></a>
            </li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>
    <!-- SMS -->
     <?php if($CI->permissions('send_sms') || $CI->permissions('sms_template_view') || $CI->permissions('sms_api_view')) { ?>
     <li class="sms-active-li sms-api-active-li sms-template-active-li sms-templates-list-active-li treeview">
          <a href="#">
            <i class="fa fa-envelope text-aqua"></i> <span><?= $this->lang->line('sms'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if($CI->permissions('send_sms')) { ?>
            <li class="sms-active-li"><a href="<?php echo $base_url; ?>sms"><i class="fa fa-envelope-o "></i> <span><?= $this->lang->line('send_sms'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('sms_template_view')) { ?>
            <li class="sms-templates-list-active-li sms-template-active-li"><a href="<?php echo $base_url; ?>templates/sms"><i class="fa fa-list "></i> <span><?= $this->lang->line('sms_templates'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('sms_api_view')) { ?>
            <li class="sms-api-active-li"><a href="<?php echo $base_url; ?>sms/api"><i class="fa fa-cube "></i> <span><?= $this->lang->line('sms_api'); ?></span></a></li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>
		<!--<li class="header">SETTINGS</li>-->
    <?php if($change_password=true) { ?>
		<li class=" company-profile-active-li site-settings-active-li  change-pass-active-li dbbackup-active-li warehouse-active-li warehouse-list-active-li tax-active-li currency-view-active-li currency-active-li  database_updater-active-li tax-list-active-li units-list-active-li unit-active-li payment_types_list-active-li payment_types-active-li treeview">
          <a href="#">
            <i class="fa fa-gears text-aqua"></i> <span><?= $this->lang->line('settings'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if($CI->permissions('company_edit')) { ?>
            <li class="company-profile-active-li"><a href="<?php echo $base_url; ?>company"><i class="fa fa-suitcase "></i> <span><?= $this->lang->line('company_profile'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('site_edit')) { ?>
            <li class="site-settings-active-li"><a href="<?php echo $base_url; ?>site"><i class="fa fa-shield  "></i> <span><?= $this->lang->line('site_settings'); ?></span></a></li>
            <?php } ?>

            
            <?php if($CI->permissions('tax_view')) { ?>
            <li class="tax-active-li  tax-list-active-li"><a href="<?php echo $base_url; ?>tax"><i class="fa fa-percent  "></i> <span><?= $this->lang->line('tax_list'); ?></span></a></li>
            <?php } ?>
            <?php if($CI->permissions('units_view')) { ?>
            <li class="units-list-active-li unit-active-li"><a href="<?php echo $base_url; ?>units/"><i class="fa fa-list "></i> <span><?= $this->lang->line('units_list'); ?></span></a></li>
            <?php } ?>

            <?php if($CI->permissions('payment_types_view')) { ?>
            <li class="payment_types_list-active-li payment_types-active-li"><a href="<?php echo $base_url; ?>payment_types/"><i class="fa fa-list "></i> <span><?= $this->lang->line('payment_types_list'); ?></span></a></li>
            <?php } ?>

            <?php if($CI->permissions('currency_view')) { ?>
            <li class="currency-view-active-li currency-active-li"><a href="<?php echo $base_url; ?>currency/view"><i class="fa fa-gg "></i> <span><?= $this->lang->line('currency_list'); ?></span></a></li>
            <?php } ?>
            <li class="change-pass-active-li"><a href="<?php echo $base_url; ?>users/password_reset"><i class="fa fa-lock "></i> <span><?= $this->lang->line('change_password'); ?></span></a></li>


            <?php if($CI->permissions('database_backup')) { ?>
            <li class="dbbackup-active-li"><a href="<?php echo $base_url; ?>users/dbbackup"><i class="fa fa-database "></i> <span><?= $this->lang->line('database_backup'); ?></span></a></li>
            <?php } ?>
            
		   </ul>
        </li>
        <?php } ?>
        <li><a href="<?php echo $base_url; ?>help/" target="_blank"  ><i class="fa fa-book "></i> <span><?= $this->lang->line('help'); ?></span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
