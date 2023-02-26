<div class="modal fade " id="customer-modal">
                <?= form_open('#', array('class' => '', 'id' => 'customer-form')); ?>
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header header-custom">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <stax_number aria-hidden="true">&times;</stax_number></button>
                      <h4 class="modal-title text-center">Add Customer</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="customer_name">Customer Name*</label>
                                <stax_number id="customer_name_msg" class="text-danger text-right pull-right"></stax_number>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="" >
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <stax_number id="mobile_msg" class="text-danger text-right pull-right"></stax_number>
                                <input type="tel"  class="form-control no_special_char_no_space " id="mobile" name="mobile" placeholder=""  >
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="phone">Phone</label>
                                <stax_number id="phone_msg" class="text-danger text-right pull-right"></stax_number>
                                <input type="tel" maxlength="10" class="form-control maxlength no_special_char_no_space " id="phone" name="phone" placeholder=""  >
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="email">Email</label>
                                <stax_number id="email_msg" class="text-danger text-right pull-right"></stax_number>
                                <input type="email" class="form-control " id="email" name="email" placeholder=""  >
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="opening_balance">Opening Balance</label>
                                <stax_number id="opening_balance_msg" class="text-danger text-right pull-right"></stax_number>
                                <input type="text" class="form-control" id="opening_balance" name="opening_balance" placeholder="" >
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="gstin_msg">GST Number</label>
                                <stax_number id="gstin_msg" class="text-danger text-right pull-right"></stax_number>
                                <input type="text" class="form-control maxlength  " id="gstin" name="gstin" placeholder=""  >
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="tax_number">TAX Number</label>
                                <stax_number id="tax_number_msg" class="text-danger text-right pull-right"></stax_number>
                                <input type="text"  class="form-control maxlength  " id="tax_number" name="tax_number" placeholder=""  >
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="country">Country</label>
                                <stax_number id="country_msg" class="text-danger text-right pull-right"></stax_number>
                               <select class="form-control select2" id="country" name="country"  style="width: 100%;" onkeyup="shift_cursor(event,'state')" value="">
                                  <?php
                                  $query1="select * from db_country where status=1";
                                  $q1=$this->db->query($query1);
                                  if($q1->num_rows($q1)>0)
                                   {
                                       foreach($q1->result() as $res1)
                                     {
                                       echo "<option value='".$res1->id."'>".$res1->country."</option>";
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
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="state">State</label>
                                <stax_number id="state_msg" class="text-danger text-right pull-right"></stax_number>
                               <select class="form-control" id="state" name="state"  style="width: 100%;" onkeyup="shift_cursor(event,'state_code')">
                                  <?php
                                  $query2="select * from db_states where status=1";
                                  $q2=$this->db->query($query2);
                                  if($q2->num_rows()>0)
                                   {
                                    echo '<option value="">-Select-</option>'; 
                                    foreach($q2->result() as $res1)
                                     {
                                       echo "<option value='".$res1->id."'>".$res1->state."</option>";
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
                              </div>
                            </div>
                          </div>
                         <div class="col-md-4">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="city">City</label>
                              <stax_number id="city_msg" class="text-danger text-right pull-right"></stax_number>
                              <input type="text" class="form-control" id="city" name="city" placeholder="" >
                            </div>
                          </div>
                        </div>
                          <div class="col-md-4">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="postcode">Postcode</label>
                                <stax_number id="postcode_msg" class="text-danger text-right pull-right"></stax_number>
                                <input type="text" class="form-control" id="postcode" name="postcode" placeholder="" >
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="address">Address</label>
                                <stax_number id="address_msg" class="text-danger text-right pull-right"></stax_number>
                                <textarea type="text" class="form-control" id="address" name="address" placeholder="" ></textarea>
                              </div>
                            </div>
                          </div>

                        </div>
                       
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary add_customer">Save</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
               <?= form_close();?>
              </div>
              <!-- /.modal -->