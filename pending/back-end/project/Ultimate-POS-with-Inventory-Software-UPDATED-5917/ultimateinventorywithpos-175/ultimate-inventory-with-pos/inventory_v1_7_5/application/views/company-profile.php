<!DOCTYPE html>
<html>

<head>
<!-- TABLES CSS CODE -->
<?php include"comman/code_css_form.php"; ?>
<!-- </copy> -->  
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 
 <?php include"sidebar.php"; ?>
 
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $this->lang->line('company_profile'); ?>
        <small><?= $this->lang->line('add_or_update'); ?> <?= $this->lang->line('company_profile'); ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= $this->lang->line('company_profile'); ?></li>
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
           
            <!-- /.box-header -->

            <!-- form start -->
            <form class="form-horizontal" id="company-form" enctype="multipart/form-data">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

              <input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">
              <div class="box-body">
                <div class="row">
                <div class="col-md-5">
                 
                  <div class="form-group">
                      <label for="company_name" class="col-sm-4 control-label"><?= $this->lang->line('company_name'); ?><label class="text-danger">*</label></label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="" onkeyup="shift_cursor(event,'mobile')" value="<?php print $company_name; ?>" >
          <span id="company_name_msg" style="display:none" class="text-danger"></span>
                  </div>
                  </div>

                
                  <div class="form-group">
                      <label for="mobile" class="col-sm-4 control-label"><?= $this->lang->line('mobile'); ?><label class="text-danger">*</label></label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control no_special_char_no_space" id="mobile" name="mobile" placeholder="" value="<?php print $mobile; ?>" onkeyup="shift_cursor(event,'email')" >
          <span id="mobile_msg" style="display:none" class="text-danger"></span>
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="email" class="col-sm-4 control-label"><?= $this->lang->line('email'); ?><label class="text-danger">*</label></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" name="email" placeholder="" value="<?php print $email; ?>" onkeyup="shift_cursor(event,'phone')">
          <span id="email_msg" style="display:none" class="text-danger"></span>
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="phone" class="col-sm-4 control-label"><?= $this->lang->line('phone'); ?></label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control no_special_char_no_space" id="phone" name="phone" placeholder="" value="<?php print $phone; ?>" onkeyup="shift_cursor(event,'gstin')" >
          <span id="phone_msg" style="display:none" class="text-danger"></span>
                  </div>
                  </div>
                  
                   
                   <div class="form-group">
                  <label for="gstin" class="col-sm-4 control-label"><?= $this->lang->line('gst_number'); ?></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="gstin" name="gstin" placeholder="" value="<?php print $gstin; ?>" onkeyup="shift_cursor(event,'vat')">
          <span id="gstin_msg" style="display:none" class="text-danger"></span>
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="vat" class="col-sm-4 control-label"><?= $this->lang->line('vat_number'); ?></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="vat" name="vat" placeholder="" value="<?php print $vat; ?>" onkeyup="shift_cursor(event,'website')">
          <span id="vat_msg" style="display:none" class="text-danger"></span>
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="pan" class="col-sm-4 control-label"><?= $this->lang->line('pan_number'); ?></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="pan" name="pan" placeholder="" value="<?php print $pan; ?>" onkeyup="shift_cursor(event,'website')">
          <span id="pan_msg" style="display:none" class="text-danger"></span>
                  </div>
                  </div>
                   
                  <div class="form-group">
                  <label for="website" class="col-sm-4 control-label"><?= $this->lang->line('website'); ?></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="website" name="website" placeholder="" value="<?php print $website; ?>" onkeyup="shift_cursor(event,'country')">
          <span id="website_msg" style="display:none" class="text-danger"></span>
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="upi_id" class="col-sm-4 control-label"><?= $this->lang->line('upi_id'); ?></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="upi_id" name="upi_id" placeholder="" value="<?php print $upi_id; ?>" >
          <span id="upi_id_msg" style="display:none" class="text-danger"></span>
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="upi_code" class="col-sm-4 control-label"><?= $this->lang->line('upi_code'); ?></label>
                  <div class="col-sm-8">
                      <input type="file" id="upi_code" name="upi_code">
                      <span id="upi_code_msg" style="display:block;" class="text-danger">Max Width/Height: 1000px * 1000px & Size: 1024kb </span>
                   </div>
                  </div>

                  
                  <div class="form-group">
                     <div class="col-sm-8 col-sm-offset-4">
                        <img class='img-responsive' style='border:3px solid #d2d6de;' src="<?= $upi_code;?>">
                     </div>
                  </div>
                  <!-- ########### -->
               </div>


               <div class="col-md-5">
                <div class="form-group">
                  <label for="bank_details" class="col-sm-4 control-label"><?= $this->lang->line('bank_details'); ?></label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control" id="bank_details" name="bank_details" placeholder="" ><?php print $bank_details; ?></textarea>
          <span id="bank_details_msg" style="display:none" class="text-danger"></span>
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="country" class="col-sm-4 control-label"><?= $this->lang->line('country'); ?></label>

                  <div class="col-sm-8">
          <select class="form-control select2" id="country" name="country"  style="width: 100%;" onkeyup="shift_cursor(event,'state')" value="<?php print $country; ?>">
            <?php
            $query1="select * from db_country where status=1";
            $q1=$this->db->query($query1);
            if($q1->num_rows($q1)>0)
             {
              echo '<option value="">-Select-</option>'; 
                 foreach($q1->result() as $res1)
               {
                 $selected = ($res1->country ==$country) ? 'selected' : '';
                 echo "<option $selected value='".$res1->country."'>".$res1->country."</option>";
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
          <span id="country_msg" style="display:none" class="text-danger"></span>
                  </div>
                  </div>
                  
                  
                   <div class="form-group">
                   <label for="state" class="col-sm-4 control-label"><?= $this->lang->line('state'); ?></label>
                  
          <div class="col-sm-8">
                    <select class="form-control select2" id="state" name="state"  style="width: 100%;" onkeyup="shift_cursor(event,'city')">
            <?php
            $query2="select * from db_states where status=1";
            $q2=$this->db->query($query2);
            if($q2->num_rows()>0)
             {
              echo '<option value="">-Select-</option>'; 
              foreach($q2->result() as $res1)
               {
                 $selected = ($res1->state ==$state) ? 'selected' : '';
                 echo "<option $selected value='".$res1->state."'>".$res1->state."</option>";
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
          <span id="state_msg" style="display:none" class="text-danger"></span>
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="city" class="col-sm-4 control-label"><?= $this->lang->line('city'); ?><label class="text-danger">*</label></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="city" name="city" placeholder="" value="<?php print $city; ?>" onkeyup="shift_cursor(event,'postcode')" >
          <span id="city_msg" style="display:none" class="text-danger"></span>
                  </div>
                  </div>
                   <div class="form-group">
                  <label for="postcode" class="col-sm-4 control-label"><?= $this->lang->line('postcode'); ?></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control no_special_char_no_space" id="postcode" name="postcode" placeholder="" value="<?php print $postcode; ?>" onkeyup="shift_cursor(event,'address')" maxlength='6'>
          <span id="postcode_msg" style="display:none" class="text-danger"></span>
                  </div>
                  </div>
                   <div class="form-group">
                  <label for="address" class="col-sm-4 control-label"><?= $this->lang->line('address'); ?><label class="text-danger">*</label></label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control" id="address" name="address" placeholder="" ><?php print $address; ?></textarea>
          <span id="address_msg" style="display:none" class="text-danger"></span>
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="company_logo" class="col-sm-4 control-label"><?= $this->lang->line('company_logo'); ?></label>
                  <div class="col-sm-8">
                      <input type="file" id="company_logo" name="company_logo">
                      <span id="company_logo_msg" style="display:block;" class="text-danger">Max Width/Height: 1000px * 1000px & Size: 1024kb </span>
                   </div>
                  </div>

                  
                  <div class="form-group">
                     <div class="col-sm-8 col-sm-offset-4">
                        <img class='img-responsive' style='border:3px solid #d2d6de;' src="<?php echo $base_url; ?>uploads/company/<?= $company_logo;?>">
                     </div>
                  </div>
                                             

                   
                </div>
                  <!-- ########### -->
</div>
              
				
				
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
				 
					
					<div class="col-sm-8 col-sm-offset-2 text-center">
					<!-- <div class="col-sm-4"></div> -->
          
					  <?php
                       if($company_name!=""){
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
                        <a href="<?=base_url('dashboard');?>">
                         <button type="button" class="col-sm-3 btn btn-block btn-warning close_btn" title="Go Dashboard">Close</button>
                       </a>
                      </div>
					 </div>  
				    
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          
        </div>
        <!--/.col (right) -->
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
<?php include'comman/code_js_language.php'; ?>
<!-- SOUND CODE -->
<?php include"comman/code_js_sound.php"; ?>
<!-- TABLES CODE -->
<?php include"comman/code_js_form.php"; ?>

<script src="<?php echo $theme_link; ?>js/company-profile.js"></script>

<!-- Make sidebar menu hughlighter/selector -->
<script>$(".<?php echo basename(__FILE__,'.php');?>-active-li").addClass("active");</script>
</body>
</html>
