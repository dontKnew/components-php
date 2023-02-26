<!DOCTYPE html>
<html>
   <head>
  <!-- TABLES CSS CODE -->
  <?php include"comman/code_css_form.php"; ?>
  <!-- </copy> -->  
  </head>
   <body class="hold-transition skin-blue  sidebar-mini">
      <div class="wrapper">
      <?php include"sidebar.php"; ?>
      <?php
         if(!isset($item_name)){
         $custom_barcode ='';
         $item_name=$sku=$hsn=$opening_stock=$item_code=$brand_id=$category_id=$gst_percentage=$tax_type=
         $sales_price=$purchase_price=$profit_margin=$unit_id=$price=$alert_qty=$lot_number="";
         $stock = 0;
         $expire_date ='';
         $description ='';
         }
         $new_opening_stock ='';
         
         ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
            <h1>
               <?= $page_title;?>
               <small>Add/Update Items</small>
            </h1>
            <ol class="breadcrumb">
               <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
               <li><a href="<?php echo $base_url; ?>items"><?= $this->lang->line('items_list'); ?></a></li>
               <li class="active"><?= $page_title;?></li>
            </ol>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="row">
               <!-- ********** ALERT MESSAGE START******* -->
               <?php include"comman/code_flashdata.php"; ?>
               <!-- ********** ALERT MESSAGE END******* -->
               <!-- right column -->
               <div class="col-md-12">
                  <!-- Horizontal Form -->
                  <div class="box box-info ">
                     
                      <?= form_open('#', array('class' => 'form', 'id' => 'items-form', 'enctype'=>'multipart/form-data', 'method'=>'POST'));?>
                        <input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">
                        <div class="box-body">
                           <div class="row">
                              <div class="form-group col-md-4">
                                 <label for="item_name"><?= $this->lang->line('item_name'); ?><span class="text-danger">*</span></label>
                                 <input type="text" class="form-control" id="item_name" name="item_name" placeholder="" value="<?php print $item_name; ?>" >
                                 <span id="item_name_msg" style="display:none" class="text-danger"></span>
                              </div>
                              <div class="form-group col-md-4">
                                 <label for="brand_id">Brand</label>
                                 <select class="form-control select2" id="brand_id" name="brand_id"  style="width: 100%;"  value="<?php print $brand_id; ?>">
                                    <?php
                                       $query1="select * from db_brands where status=1";
                                       $q1=$this->db->query($query1);
                                       if($q1->num_rows($q1)>0)
                                        {  echo '<option value="">-Select-</option>'; 
                                            foreach($q1->result() as $res1)
                                          { 
                                            $selected = ($brand_id==$res1->id)? 'selected' : '';
                                            echo "<option $selected value='".$res1->id."'>".$res1->brand_name."</option>";
                                          }
                                        }
                                        else
                                        {
                                           ?>
                                    <option value="">No Records Found</option>
                                    <?php
                                       }
                                       ?>
                                 </select>
                                 <span id="brand_id_msg" style="display:none" class="text-danger"></span>
                              </div>
                              <div class="form-group col-md-4">
                                 <label for="category_id">Category <span class="text-danger">*</span></label>
                                 <select class="form-control select2" id="category_id" name="category_id"  style="width: 100%;"  value="<?php print $category_id; ?>">
                                    <?php
                                       $query1="select * from db_category where status=1";
                                       $q1=$this->db->query($query1);
                                       if($q1->num_rows($q1)>0)
                                        {  echo '<option value="">-Select-</option>'; 
                                            foreach($q1->result() as $res1)
                                          { 
                                            $selected = ($category_id==$res1->id)? 'selected' : '';
                                            echo "<option $selected value='".$res1->id."'>".$res1->category_name."</option>";
                                          }
                                        }
                                        else
                                        {
                                           ?>
                                    <option value="">No Records Found</option>
                                    <?php
                                       }
                                       ?>
                                 </select>
                                 <span id="category_id_msg" style="display:none" class="text-danger"></span>
                              </div>
                              <div class="form-group col-md-4">
                                 <label for="unit_id" class="control-label"><?= $this->lang->line('unit'); ?><span class="text-danger">*</span></label>
                                 <select class="form-control select2" id="unit_id" name="unit_id"  style="width: 100%;" >
                                    <?php
                                       $query1="select * from db_units where status=1";
                                       $q1=$this->db->query($query1);
                                       if($q1->num_rows($q1)>0)
                                        {
                                         echo '<option value="">-Select-</option>'; 
                                            foreach($q1->result() as $res1)
                                          {
                                            $selected = ($res1->id==$unit_id)? 'selected' : '';
                                            echo "<option $selected value='".$res1->id."'>".$res1->unit_name."</option>";
                                          }
                                        }
                                        else
                                        {
                                           ?>
                                    <option value="">No Records Found</option>
                                    <?php
                                       }
                                       ?>
                                 </select>
                                 <span id="unit_id_msg" style="display:none" class="text-danger"></span>
                              </div>
                              <div class="form-group col-md-4">
                                 <label for="sku">SKU</label>
                                 <input type="text" class="form-control" id="sku" name="sku" placeholder="" value="<?php print $sku; ?>" >
                                 <span id="sku_msg" style="display:none" class="text-danger"></span>
                              </div>
                              <div class="form-group col-md-4">
                                 <label for="hsn" ><?= $this->lang->line('hsn'); ?></label>
                                 <input type="text" class="form-control" id="hsn" name="hsn" placeholder="" value="<?php print $hsn; ?>" >
                                 <span id="hsn_msg" style="display:none" class="text-danger"></span>
                              </div>
                              <div class="form-group col-md-4">
                                 <label for="alert_qty" ><?= $this->lang->line('alert_qty'); ?></label>
                                 <input type="number" class="form-control no_special_char" id="alert_qty" name="alert_qty" placeholder="" min="0"  value="<?php print $alert_qty; ?>" >
                                 <span id="alert_qty_msg" style="display:none" class="text-danger"></span>
                              </div>
                              <div class="form-group col-md-4">
                                 <label for="lot_number" ><?= $this->lang->line('lot_number'); ?></label>
                                 <input type="text" class="form-control no_special_char" id="lot_number" name="lot_number" placeholder=""  value="<?php print $lot_number; ?>" >
                                 <span id="lot_number_msg" style="display:none" class="text-danger"></span>
                              </div>
                              <div class="form-group col-md-4">
                                 <label for="expire_date" ><?= $this->lang->line('expire_date'); ?></label>
                                 <div class="input-group date">
                                  <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right datepicker" id="expire_date" name="expire_date" value="<?= $expire_date;?>">
                                </div>
                                 <span id="expire_date_msg" style="display:none" class="text-danger"></span>
                              </div>
                              <div class="form-group col-md-4">
                                 <label for="custom_barcode" ><?= $this->lang->line('barcode'); ?></label>
                                 <input type="text" class="form-control" id="custom_barcode" name="custom_barcode" placeholder=""  value="<?php print $custom_barcode; ?>" >
                                 <span id="custom_barcode_msg" style="display:none" class="text-danger"></span>
                              </div>
                              <div class="form-group col-md-4">
                                 <label for="custom_barcode" ><?= $this->lang->line('description'); ?></label>
                                 <textarea type="text" class="form-control" id="description" name="description" placeholder=""><?php print $description; ?></textarea>
                                 <span id="description_msg" style="display:none" class="text-danger"></span>
                              </div>
                              <div class="form-group col-md-4">
                                 <label for="item_image"><?= $this->lang->line('select_image'); ?></label>
                                 <input type="file" name="item_image" id="item_image">
                                 <span id="item_image_msg" style="display:block;" class="text-danger">Max Width/Height: 1000px * 1000px & Size: 1MB </span>
                              </div>
                           </div>
                           <hr>
                           <div class="row">
                              <div class="form-group col-md-4">
                                 <label for="price"><?= $this->lang->line('price'); ?><span class="text-danger">*</span></label>
                                 <input type="text" class="form-control only_currency" id="price" name="price" placeholder="Price of Item without Tax"  value="<?php print $price; ?>" >
                                 <span id="price_msg" style="display:none" class="text-danger"></span>
                              </div>
                              <div class="form-group col-md-4">
                                 <label for="tax_id" ><?= $this->lang->line('tax'); ?><span class="text-danger">*</span></label>
                                 <select class="form-control select2" id="tax_id" name="tax_id"  style="width: 100%;" >
                                    <?php
                                       $query1="select * from db_tax where status=1";
                                       $q1=$this->db->query($query1);
                                       if($q1->num_rows($q1)>0)
                                        {
                                            echo '<option data-tax="0" value="">-Select-</option>'; 
                                            foreach($q1->result() as $res1)
                                          { 
                                            $selected = ($tax_id==$res1->id)? 'selected' : '';
                                            echo "<option $selected data-tax='".$res1->tax."' value='".$res1->id."'>".$res1->tax_name."(".$res1->tax."%)</option>";
                                          }
                                        }
                                        else
                                        {
                                           ?>
                                    <option value="">No Records Found</option>
                                    <?php
                                       }
                                       ?>
                                 </select>
                                 <span id="tax_id_msg" style="display:none" class="text-danger"></span>
                              </div>
                              <div class="form-group col-md-4">
                                 <label for="purchase_price"><?= $this->lang->line('purchase_price'); ?><span class="text-danger">*</span></label>
                                 <input type="text" class="form-control only_currency" id="purchase_price" name="purchase_price" placeholder="Total Price with Tax Amount"  value="<?php print $purchase_price; ?>" readonly='' >
                                 <span id="purchase_price_msg" style="display:none" class="text-danger"></span>
                              </div>
                           </div>
                           <!-- /row -->
                           <div class="row">
                              <div class="form-group col-md-4">
                                 <label for="tax_type"><?= $this->lang->line('tax_type'); ?><span class="text-danger">*</span></label>
                                 <select class="form-control select2" id="tax_type" name="tax_type"  style="width: 100%;" >
                                  <?php 
                                    $inclusive_selected=$exclusive_selected='';
                                    if($tax_type =='Inclusive') { $inclusive_selected='selected'; }
                                    if($tax_type =='Exclusive') { $exclusive_selected='selected'; }

                                  ?>
                                    <option <?= $exclusive_selected ?> value="Exclusive">Exclusive</option>
                                    <option <?= $inclusive_selected ?> value="Inclusive">Inclusive</option>
                                 </select>
                                 <span id="tax_type_msg" style="display:none" class="text-danger"></span>
                                 
                              </div>
                              <div class="form-group col-md-4">
                                 <label for="profit_margin"><?= $this->lang->line('profit_margin'); ?>(%) <i class="hover-q " data-container="body" data-toggle="popover" data-placement="top" data-content="<?= $this->lang->line('based_on_purchase_price'); ?>" data-html="true" data-trigger="hover" data-original-title="">
                                  <i class="fa fa-info-circle text-maroon text-black hover-q"></i>
                                </i></label>
                                 <input type="text" class="form-control only_currency" id="profit_margin" name="profit_margin" placeholder="Profit in %"  value="<?php print $profit_margin; ?>" >
                                 <span id="profit_margin_msg" style="display:none" class="text-danger"></span>
                              </div>
                              <div class="form-group col-md-4">
                                 <label for="sales_price" class="control-label"><?= $this->lang->line('sales_price'); ?><span class="text-danger">*</span></label>
                                 <input type="text" class="form-control only_currency " id="sales_price" name="sales_price" placeholder="Sales Price"  value="<?php print $sales_price; ?>" >
                                 <span id="sales_price_msg" style="display:none" class="text-danger"></span>
                              </div>
                           </div>
                           <!-- /row -->
                           <hr>
                           <div class="row">
                              <div class="form-group col-md-4">
                                 <label for="current_opening_stock"><?= $this->lang->line('current_opening_stock'); ?></label>
                                 <input type="text" class="form-control only_currency" id="current_opening_stock" name="current_opening_stock" placeholder="" readonly=""  value="<?php print $stock; ?>" >
                                 <span id="current_opening_stock_msg" style="display:none" class="text-danger"></span>
                              </div>
                              <div class="form-group col-md-4">
                                 <label for="new_opening_stock"><?= $this->lang->line('new_opening_stock'); ?></label>
                                 <input type="text" class="form-control" id="new_opening_stock" name="new_opening_stock" placeholder="-/+"  value="<?php print $new_opening_stock; ?>" >
                                 <span id="new_opening_stock_msg" style="display:none" class="text-danger"></span>
                              </div>
                           </div>
                           <!-- /row -->
                           <!-- /.box-body -->
                           <div class="box-footer">
                              <div class="col-sm-8 col-sm-offset-2 text-center">
                                 <!-- <div class="col-sm-4"></div> -->
                                 <?php
                                    if($item_name!=""){
                                         $btn_name="Update";
                                         $btn_id="update";
                                         ?>
                                 <input type="hidden" name="q_id" id="q_id" value="<?php echo $q_id;?>"/>
                                 <?php
                                    }
                                              else{
                                                  $btn_name="Save";
                                                  $btn_id="save";
                                              }
                                    
                                              ?>
                                 <div class="col-md-3 col-md-offset-3">
                                    <button type="button" id="<?php echo $btn_id;?>" class=" btn btn-block btn-success" title="Save Data"><?php echo $btn_name;?></button>
                                 </div>
                                 <div class="col-sm-3">
                                    <button type="button" class="col-sm-3 btn btn-block btn-warning close_btn" title="Go Dashboard">Close</button>
                                 </div>
                              </div>
                           </div>
                           <!-- /.box-footer -->
                     <?= form_close(); ?>
                     </div>
                     <!-- /.box -->
                  </div>
                  <!--/.col (right) -->
               </div>
               <div class="col-md-12">
         
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title text-blue"><?= $this->lang->line('opening_stock_adjustment_records'); ?></h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body table-responsive no-padding">
                        
                        <table class="table table-bordered table-hover " id="report-data" >
                          <thead>
                          <tr class="bg-gray">
                            <th style="">#</th>
                            <th style=""><?= $this->lang->line('entry_date'); ?></th>
                            <th style=""><?= $this->lang->line('stock'); ?></th>
                            <th style=""><?= $this->lang->line('action'); ?></th>
                          </tr>
                          </thead>
                          <tbody>
                              <?php 
                                if(isset($q_id)){
                                  $q3 = $this->db->query("select * from db_stockentry where item_id=$q_id");
                                  if($q3->num_rows()>0){
                                    $i=1;
                                    $total_paid = 0;
                                    foreach ($q3->result() as $res3) {
                                      echo "<td>".$i."</td>";
                                      echo "<td>".show_date($res3->entry_date)."</td>";
                                      echo "<td>".$res3->qty."</td>";
                                      echo '<td><i class="fa fa-trash text-red pointer" onclick="delete_stock_entry('.$res3->id.')"> Delete</i></td>';
                                      echo "</tr>";
                                      $i++;
                                    }
                                  }
                                  else{
                                    echo "<tr><td colspan='4' class='text-center text-bold'>No Previous Stock Entry Found!!</td></tr>";
                                  }
                                }
                                else{
                                  echo "<tr><td colspan='4' class='text-center text-bold'>No Previous Stock Entry Found!!</td></tr>";
                                }
                              ?>
                           </tbody>
                        </table>
                        
                        
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                  </div>
               <!-- /.row -->
         </section>
         <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <?php include"footer.php"; ?>
         <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
         <div class="control-sidebar-bg"></div>
      </div>
      <!-- ./wrapper -->
      <!-- SOUND CODE -->
      <?php include"comman/code_js_sound.php"; ?>
      <!-- TABLES CODE -->
      <?php include"comman/code_js_form.php"; ?>
      <script src="<?php echo $theme_link; ?>js/items.js?v=164"></script>
      <!-- Make sidebar menu hughlighter/selector -->
      <script>$(".<?php echo basename(__FILE__,'.php');?>-active-li").addClass("active");</script>
   </body>
</html>
