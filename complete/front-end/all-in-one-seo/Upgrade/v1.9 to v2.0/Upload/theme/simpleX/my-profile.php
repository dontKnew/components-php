<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name Rainbow PHP Framework
 * @copyright © 2017 ProThemes.Biz
 *
 */
?>

<link href="<?php themeLink('css/bootstrap-formhelpers.min.css'); ?>" rel="stylesheet" type="text/css" />

<div class="container">
    <div class="row">
      	
    <?php
    if($themeOptions['general']['sidebar'] == 'left')
        require_once(THEME_DIR."sidebar.php");
    ?>   

  	<div class="col-md-8 top40 profile">
                     
        <br />
        <?php if(isset($msg))  echo $msg.'<br>'; ?>
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#profile"><?php trans('Profile',$lang['RF110']); ?></a></li>
          <li><a data-toggle="tab" href="#info"><?php trans('Update Information',$lang['RF111']); ?></a></li>
          <li><a data-toggle="tab" href="#password"><?php trans('Change Password',$lang['RF112']); ?></a></li>
        </ul>
        
        <div class="tab-content">
          <br /><br />
          <div id="profile" class="tab-pane fade in active">
                <div class="row" style="margin: 5px;">
                
                <div class="col-md-4 thumbnail" style="padding: 20px;">
                    <div class="text-center">
                    <img class="userLogo" width="180" height="180" alt="<?php trans('User Logo',$lang['RF113']); ?>" src="<?php echo $userLogo; ?>" />                         
                    </div>
                </div>
                
                <div class="col-md-8">
                    <table class="table table-hover table-bordered">
                    <tbody>
                        <tr>
                            <td style="width: 200px;"><?php trans('Full Name',$lang['RF72']); ?></td>
                            <td><span><?php echo $userInfo['full_name']; ?></span></td>
                        </tr> 
                        <tr>
                            <td style="width: 200px;"><?php trans('Username',$lang['RF32']); ?></td>
                            <td><span><?php echo $username; ?></span></td>         
                        </tr> 
                        <tr>
                            <td style="width: 200px;"><?php trans('Email ID',$lang['RF114']); ?></td>
                            <td><span><?php echo $userInfo['email_id']; ?></span></td>         
                        </tr> 
                        <tr>
                            <td style="width: 200px;"><?php trans('Registered At',$lang['RF115']); ?></td>
                            <td><span><?php echo $userInfo['added_date']; ?></span></td>         
                        </tr> 
                        <tr>
                            <td style="width: 200px;"><?php trans('User Country',$lang['RF116']); ?></td>
                            <td><span><?php echo $userCountry; ?></span></td>         
                        </tr> 
                        <tr>
                            <td style="width: 200px;"><?php trans('Membership',$lang['RF117']); ?></td>
                            <td><span><?php trans('Free',$lang['RF118']); ?></span></td>         
                        </tr> 
                    </tbody>
                    </table>
                </div>
                
                <?php if($addInfo) { ?>
                <div class="clear" style="margin-bottom: 10px;"></div>

                <div class="row" style="margin: 5px;">
                    <h4 style="font-weight: 500;"><?php trans('Personal Information:',$lang['RF119']); ?></h4>
                    <table class="table table-hover table-bordered">
                    <tbody>
                        <tr>
                            <td style="width: 30%;"><?php trans('First Name',$lang['RF120']); ?></td>
                            <td><span><?php echo $userInfo['firstname']; ?></span></td>
                        </tr> 
                        <tr>
                            <td style="width: 200px;"><?php trans('Last Name',$lang['RF121']); ?></td>
                            <td><span><?php echo $userInfo['lastname']; ?></span></td>         
                        </tr> 
                        <?php if($company != '') { ?>
                        <tr>
                            <td style="width: 200px;"><?php trans('Company',$lang['RF122']); ?></td>
                            <td><span><?php echo $userInfo['company']; ?></span></td>         
                        </tr> 
                        <?php } ?>
                        <tr>
                            <td style="width: 200px;"><?php trans('Address Line 1',$lang['RF123']); ?></td>
                            <td><span><?php echo $userInfo['address1']; ?></span></td>         
                        </tr> 
                        <?php if($address2 != '') { ?>
                        <tr>
                            <td style="width: 200px;"><?php trans('Address Line 2',$lang['RF124']); ?></td>
                            <td><span><?php echo $userInfo['address2']; ?></span></td>         
                        </tr> 
                        <?php } ?>
                        <tr>
                            <td style="width: 200px;"><?php trans('City',$lang['RF125']); ?></td>
                            <td><span><?php echo $userInfo['city']; ?></span></td>         
                        </tr>
                        <tr>
                            <td style="width: 200px;"><?php trans('State',$lang['RF126']); ?></td>
                            <td><span><?php echo $userInfo['statestr']; ?></span></td>         
                        </tr> 
                        <tr>
                            <td style="width: 200px;"><?php trans('Country',$lang['RF127']); ?></td>
                            <td><span><?php echo ucfirst(country_code_to_country($userInfo['country'])); ?></span></td>         
                        </tr>  
                        <tr>
                            <td style="width: 200px;"><?php trans('Post Code',$lang['RF128']); ?></td>
                            <td><span><?php echo $userInfo['postcode']; ?></span></td>         
                        </tr> 
                        <tr>
                            <td style="width: 200px;"><?php trans('Telephone',$lang['RF129']); ?></td>
                            <td><span><?php echo $userInfo['telephone']; ?></span></td>         
                        </tr> 
                    </tbody>
                    </table>
                </div>
                <?php } ?>
                
                </div>
          </div>
          <div id="info" class="tab-pane fade">
          
              <div class="row">
              
              <form onsubmit="return addressCheck()" name="userBox" method="POST" action="#" enctype="multipart/form-data"> 
              
              <div class="col-md-12">  
                
                <h4 style="margin-bottom: 15px; font-weight: 500;"><?php trans('General Information:',$lang['RF130']); ?></h4>
                
                <div class="form-group">
					<?php trans('Full Name',$lang['RF72']); ?> <br />
					<input value="<?php echo $userInfo['full_name']; ?>" placeholder="<?php trans('Enter your full name',$lang['RF149']); ?>" type="text" name="fullname" class="form-control"  style="width: 96%;"/>
				</div>	
                
                 <div class="form-group">
					<?php trans('Username',$lang['RF32']); ?> <br />
					<input disabled="" value="<?php echo $username; ?>" placeholder="<?php trans('Enter your user name',$lang['RF150']); ?>" type="text" name="username" class="form-control"  style="width: 96%;"/>
				</div>
                
                <div class="form-group">
			         <?php trans('Email ID',$lang['RF114']); ?> <br />
					 <input disabled="" value="<?php echo $userInfo['email_id']; ?>" placeholder="<?php trans('Enter your email id',$lang['RF151']); ?>" type="text" name="email" class="form-control"  style="width: 96%;"/>
				</div>
    
                <br />
                <h4 style="margin-bottom: 15px; font-weight: 500;"><?php trans('Avatar:',$lang['RF131']); ?></h4>
                

                <img class="userLogoBox" id="userLogoBox" width="180" height="180" alt="<?php trans('User Logo',$lang['RF113']); ?>" src="<?php echo $userLogo; ?>" />   
                
                <br />
                <?php trans('Upload a new avatar: (JPEG 180x180px)',$lang['RF132']); ?>
                <input type="file" name="logoUpload" id="logoUpload" class="btn btn-default" />
                
                <br /><br />
                <h4 style="margin-bottom: 15px; font-weight: 500;"><?php trans('Personal Information:',$lang['RF119']); ?></h4>
              </div>
              
               <div class="col-md-6">
                        
                     <div class="form-group">
    					<?php trans('First Name',$lang['RF120']); ?> <br />
    					<input value="<?php echo $userInfo['firstname']; ?>" placeholder="<?php trans('Enter your first name',$lang['RF148']); ?>" type="text" name="firstname" class="form-control"  style="width: 96%;"/>
    				</div>	
                    
                     <div class="form-group">
    					<?php trans('Last Name',$lang['RF121']); ?> <br />
    					<input value="<?php echo $userInfo['lastname']; ?>" placeholder="<?php trans('Enter your last name',$lang['RF147']); ?>" type="text" name="lastname" class="form-control"  style="width: 96%;"/>
    				</div>
                    
                    <div class="form-group">
    			         <?php trans('Company',$lang['RF122']); ?> <br />
    					 <input value="<?php echo $userInfo['company']; ?>" placeholder="<?php trans('Enter your company name (optional)',$lang['RF146']); ?>" type="text" name="company" class="form-control"  style="width: 96%;"/>
    				</div>  
                    
                    <div class="form-group">
    			          <?php trans('Telephone',$lang['RF129']); ?> <br />
    					 <input value="<?php echo $userInfo['telephone']; ?>" placeholder="<?php trans('Enter your phone no.',$lang['RF145']); ?>" type="text" name="telephone" class="form-control bfh-phone" data-country="country" style="width: 96%;" />
    				</div>
                    
                    <div class="form-group">
    			         <?php trans('Country',$lang['RF127']); ?> <br />
    					 <select id="country" name="country" class="form-control bfh-countries" data-country="<?php echo $userInfo['country'] != '' ? $userInfo['country'] : 'IN'; ?>" style="width: 96%;"></select>
    				</div>
                    
            </div><!-- /.col-md-6 -->
            
            <div class="col-md-6">
               
                <div class="form-group">
    		          <?php trans('Address 1',$lang['RF123']); ?> <br />
    				 <input value="<?php echo $userInfo['address1']; ?>" placeholder="<?php trans('Enter your home address',$lang['RF144']); ?>" type="text" name="address1" class="form-control"  style="width: 96%;"/>
    			</div>    
                
                <div class="form-group">
    		         <?php trans('Address 2',$lang['RF124']); ?> <br />
    				 <input value="<?php echo $userInfo['address2']; ?>" placeholder="<?php trans('Address line 2 (optional)',$lang['RF143']); ?>" type="text" name="address2" class="form-control"  style="width: 96%;"/>
    			</div> 
                
                <div class="form-group">
    		        <?php trans('City',$lang['RF125']); ?> <br />
    	 	        <input value="<?php echo $userInfo['city']; ?>" placeholder="<?php trans('Enter your city',$lang['RF142']); ?>" type="text" name="city" class="form-control"  style="width: 96%;"/>
    			</div>
                
                <div class="form-group">
    		         <?php trans('Post Code',$lang['RF128']); ?> <br />
    				 <input value="<?php echo $userInfo['postcode']; ?>" placeholder="<?php trans('Enter your postal code',$lang['RF141']); ?>" type="text" name="postcode" class="form-control"  style="width: 96%;"/>
    			</div>  
                
                <div class="form-group">
    		          <?php trans('Region / State',$lang['RF133']); ?> <br />
                      <?php $userInfo['state'] = ($userInfo['state'] != '' ? 'data-state="'.$userInfo['state'].'"' : ''); ?>
    				 <select name="state" class="form-control bfh-states" data-country="country" <?php echo $userInfo['state']; ?> style="width: 96%;"></select>
    			</div>
                    
            </div><!-- /.col-md-6 -->
            
            <div class="col-md-12 text-center">  
                <br />
                <input type="submit" value="Submit" class="btn btn-success" />
                <input type="hidden" name="statestr" value="1" />
                <input type="hidden" name="user" value="1" />
                <br />
            </div>
            
            </form>
          </div>
      
          </div>
          <div id="password" class="tab-pane fade">
            
            <div class="row">
            <div class="col-md-12">    
             <form name="passwordBox" method="POST" action="#" onsubmit="return passCheck()"> 				
             <div class="form-group">
				<?php trans('Current Password',$lang['RF134']); ?> <br />
				<input placeholder="<?php trans('Enter your current password',$lang['RF140']); ?>" type="password" name="old_pass" class="form-control"  style="width: 96%;"/>
			</div>	
            
             <div class="form-group">
				<?php trans('New Password',$lang['RF135']); ?> <br />
				<input placeholder="<?php trans('Enter your new password',$lang['RF139']); ?>" type="password" name="new_pass" class="form-control"  style="width: 96%;"/>
			</div>
            
            <div class="form-group">
		         <?php trans('Retype Password',$lang['RF136']); ?> <br />
				 <input placeholder="<?php trans('Retype your new password',$lang['RF138']); ?>" type="password" name="retype_pass" class="form-control"  style="width: 96%;"/>
			</div>
            <br />
            <input type="submit" value="<?php trans('Change Password',$lang['RF137']); ?>" class="btn btn-danger" />
            <input type="hidden" name="password" value="1" />
            </form>     
             </div>
            </div>
            
          </div>
        </div>
            
        <br />

            <div class="xd_top_box text-center">
                <?php echo $ads_720x90; ?>
            </div>

            <br />
        </div>  
        <?php
        if($themeOptions['general']['sidebar'] == 'right')
            require_once(THEME_DIR."sidebar.php");
        ?>       	
    </div>
</div> <br />
<script src="<?php themeLink('js/bootstrap-formhelpers.min.js'); ?>" type="text/javascript"></script>
<script src="<?php themeLink('js/profile.js'); ?>" type="text/javascript"></script>