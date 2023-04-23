<!DOCTYPE html>
<html>
<title><?= $page_title;?>- Default Format</title>
<head>
<link rel='shortcut icon' href='<?php echo $theme_link; ?>images/favicon.ico' />

<style>
@page {
                margin: 10px 20px 10px 20px;
            }
table, th, td {
    border: 0.5pt solid #0070C0;
    border-collapse: collapse;   

}
th, td {
    /*padding: 5px;*/
    text-align: left;   
    vertical-align:top 
}
body{
  word-wrap: break-word;
  font-family:  'sans-serif','Arial';
  font-size: 11px;
  /*height: 210mm;*/
}
.style_hidden{
  border-style: hidden;
}
.fixed_table{
  table-layout:fixed;
}
.text-center{
  text-align: center;
}
.text-left{
  text-align: left;
}
.text-right{
  text-align: right;
}
.text-bold{
  font-weight: bold;
}
.bg-sky{
  background-color: #E8F3FD;
}
@page { size: A5 margin: 5px; }
body { margin: 5px; }

 #clockwise {
       rotate: 90;
    }

    #counterclockwise {
       rotate: -90;
    }
</style>
</head>
<body onload="window.print();"><!--  -->
<?php
    $q1=$this->db->query("select * from db_company where id=1 and status=1");
    $res1=$q1->row();
    $company_name=$res1->company_name;
    $company_mobile=$res1->mobile;
    $company_phone=$res1->phone;
    $company_email=$res1->email;
    $company_country=$res1->country;
    $company_state=$res1->state;
    $company_city=$res1->city;
    $company_address=$res1->address;
    $company_gst_no=$res1->gst_no;
    $company_vat_no=$res1->vat_no;
    $bank_details=$res1->bank_details;
    $terms_and_conditions=$res1->sales_terms_and_conditions;
    $company_logo=$res1->company_logo;
    $upi_code=$res1->upi_code;
    $upi_id=$res1->upi_id;
    if(!empty($upi_code)){
      //if(file_exists(base_url('uploads/upi/'.$upi_code))){
        $upi_code = base_url('uploads/upi/'.$upi_code);
     // }
    }
    else{
      $upi_code='';
    }

    $q4=$this->db->query("select sales_invoice_footer_text,currency_id from db_sitesettings where id=1");
    $res4=$q4->row();
    $sales_invoice_footer_text=$res4->sales_invoice_footer_text;
    $currency_id=$res4->currency_id;
    
    $q3=$this->db->query("SELECT a.id,a.customer_name,a.mobile,a.phone,a.gstin,a.tax_number,a.email,
                           a.opening_balance,a.country_id,a.state_id,a.city,
                           a.postcode,a.address,b.sales_date,b.created_time,b.reference_no,
                           b.sales_code,b.sales_note,b.sales_status,
                           coalesce(b.grand_total,0) as grand_total,
                           coalesce(a.sales_due,0) as sales_due,
                           coalesce(b.subtotal,0) as subtotal,
                           coalesce(b.paid_amount,0) as paid_amount,
                           coalesce(b.other_charges_input,0) as other_charges_input,
                           other_charges_tax_id,
                           coalesce(b.other_charges_amt,0) as other_charges_amt,
                           discount_to_all_input,
                           b.discount_to_all_type,
                           coalesce(b.tot_discount_to_all_amt,0) as tot_discount_to_all_amt,
                           coalesce(b.round_off,0) as round_off,
                           b.payment_status

                           FROM db_customers a,
                           db_sales b 
                           WHERE 
                           a.`id`=b.`customer_id` AND 
                           b.`id`='$sales_id' 
                           ");
                           /*GROUP BY 
                           b.`customer_code`*/
    
    $res3=$q3->row();
    $customer_name=$res3->customer_name;
    $customer_mobile=$res3->mobile;
    $customer_phone=$res3->phone;
    $customer_email=$res3->email;
    $customer_country=$res3->country_id;
    $customer_state=$res3->state_id;
    $customer_city=$res3->city;
    $customer_address=$res3->address;
    $customer_postcode=$res3->postcode;
    $customer_gst_no=$res3->gstin;
    $customer_tax_number=$res3->tax_number;
    $customer_opening_balance=$res3->opening_balance;
    $sales_due=$res3->sales_due;
    $total_due = $sales_due + $customer_opening_balance;
    $sales_date=$res3->sales_date;
    //$due_date=$res3->due_date;
    $created_time=$res3->created_time;
    $reference_no=$res3->reference_no;
    $sales_code=$res3->sales_code;
    $sales_note=$res3->sales_note;
    $sales_status=$res3->sales_status;
    $customer_id=$res3->id;

    
    $subtotal=$res3->subtotal;
    $grand_total=$res3->grand_total;
    $other_charges_input=$res3->other_charges_input;
    $other_charges_tax_id=$res3->other_charges_tax_id;
    $other_charges_amt=$res3->other_charges_amt;
    $paid_amount=$res3->paid_amount;
    $discount_to_all_input=$res3->discount_to_all_input;
    $discount_to_all_type=$res3->discount_to_all_type;
    $discount_to_all_type = ($discount_to_all_type=='in_percentage') ? '%' : 'Fixed';
    $tot_discount_to_all_amt=$res3->tot_discount_to_all_amt;
    $round_off=$res3->round_off;
    $payment_status=$res3->payment_status;
    
    if(!empty($customer_country)){
      $customer_country = $this->db->query("select country from db_country where id='$customer_country'")->row()->country;  
    }
    if(!empty($customer_state)){
      $customer_state = $this->db->query("select state from db_states where id='$customer_state'")->row()->state;  
    }
    

    ?>

<caption>
      <center>
        <span style="font-size: 18px;text-transform: uppercase;">
          Tax Invoice
        </span>
      </center>
</caption>

<table autosize="1" style="overflow: wrap" id='mytable' align="center" width="100%" height='100%'  cellpadding="0" cellspacing="0"  >
<!-- <table align="center" width="100%" height='100%'   > -->
  
    <thead>

      <tr>
        <th colspan="16">
          <table width="100%" height='100%' class="style_hidden fixed_table">
              <tr>
                <!-- First Half -->
                <td colspan="4">
                  <img src="<?= base_url('uploads/company/'.$company_logo);?>" width='100%'>
                </td>

                <td colspan="4">
                  <b><?php echo $company_name; ?></b><br/>
                  <span style="font-size: 10px;">
                    <?php echo $this->lang->line('mobile').":".$company_mobile; ?><br/>
                    <?php echo $this->lang->line('address')." : ".$company_address; ?><br/>
                   <!--  <?php echo $company_country; ?><br/> -->
                    
                    <?php echo (!empty(trim($company_email))) ? $this->lang->line('email').": ".$company_email."<br>" : '';?>
                    <?php echo (!empty(trim($company_gst_no))) ? $this->lang->line('gst_number').": ".$company_gst_no."<br>" : '';?>
                    <!-- <?php echo (!empty(trim($company_vat_no))) ? $this->lang->line('tax_number').": ".$company_vat_no."<br>" : '';?> -->
                  </span>
                </td>

                <!-- Second Half -->
                <td colspan="8" rowspan="1">
                  <span>
                    <table style="width: 100%;" class="style_hidden fixed_table">
                    
                        <tr>
                          <td colspan="4">
                            Invoice No.<br>
                            <span style="font-size: 10px;">
                              <b><?php echo "$sales_code"; ?></b>
                            </span>
                          </td>
                          <td colspan="4">
                            Dated<br>
                            <span style="font-size: 10px;">
                              <b><?php echo show_date($sales_date); ?></b>
                            </span>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="8">
                            Reference No.<br>
                            <span style="font-size: 10px;">
                              <b><?php echo "$reference_no"; ?></b>
                            </span>
                          </td>
                          
                        </tr>
                        
                        <tr>
                          <td colspan="8">
                            <span>
                                <b><?= $this->lang->line('bank_details'); ?></b><br/>
                              </span>
                              <span style="font-size: 10px;">
                                  <?= nl2br($bank_details);  ?>
                                </span>
                          </td>
                        </tr>

                        <?php if(!empty($upi_id)) {?>
                        <tr>
                          <td colspan="8">
                            <span>
                                <b><?= $this->lang->line('pay_by_upi'); ?></b><br/>
                              </span>
                              <span style="font-size: 10px;">
                                  <?=$upi_id;  ?>
                                </span>
                          </td>
                        </tr>
                        <?php } ?>
                        <!-- if UPI Exist then only show this Row -->
                        <?php if(!empty($upi_code) && show_upi_code()) {?>
                        <tr>
                          <td colspan="8" style="text-align: right;">
                            <b><?= $this->lang->line('pay_by_upi'); ?></b><br/>

                            <img width="35%" src="<?= $upi_code;?>"><br>
                            
                          </td>
                        </tr>
                        <?php } ?>
                        <!-- UPI Image show end -->


                    
                    </table>
                  </span>
                </td>
              </tr>

              <tr>
                <!-- Bottom Half -->
                <td colspan="8">
                  <b><?= $this->lang->line('customer_address'); ?></b><br/>
                  <span style="font-size: 10px;">
                      <?php echo $this->lang->line('name').": ".$customer_name; ?><br/>
                        <?php echo (!empty(trim($customer_mobile))) ? $this->lang->line('mobile').": ".$customer_mobile."<br>" : '';?>
                        <?php 
                                if(!empty($customer_address)){
                                  echo $customer_address;
                                }
                                /*if(!empty($customer_country)){
                                  echo $customer_country;
                                }
                                if(!empty($customer_state)){
                                  echo ",".$customer_state;
                                }
                                if(!empty($customer_city)){
                                  echo ",".$customer_city;
                                }
                                if(!empty($customer_postcode)){
                                  echo "-".$customer_postcode;
                                }*/
                              ?>
                              <br>
                        <?php echo (!empty(trim($customer_email))) ? $this->lang->line('email').": ".$customer_email."<br>" : '';?>
                         <?php echo (!empty(trim($customer_gst_no))) ? $this->lang->line('gst_number').": ".$customer_gst_no."<br>" : '';?>
                        <!--<?php echo (!empty(trim($customer_tax_number))) ? $this->lang->line('tax_number').": ".$customer_tax_number."<br>" : '';?> -->
                  </span>
                </td>

                <td colspan="8">
                            <span>
                                <b><?= $this->lang->line('shipping_address'); ?></b><br/>
                              </span>
                              <span style="font-size: 10px;">
                              <?php echo $this->lang->line('name').": ".$customer_name; ?><br/>
                                <?php echo (!empty(trim($customer_mobile))) ? $this->lang->line('mobile').": ".$customer_mobile."<br>" : '';?>
                                <?php 
                                        if(!empty($customer_address)){
                                          echo $customer_address;
                                        }
                                        /*if(!empty($customer_country)){
                                          echo $customer_country;
                                        }
                                        if(!empty($customer_state)){
                                          echo ",".$customer_state;
                                        }
                                        if(!empty($customer_city)){
                                          echo ",".$customer_city;
                                        }
                                        if(!empty($customer_postcode)){
                                          echo "-".$customer_postcode;
                                        }*/
                                      ?>
                                      <br>
                                <?php echo (!empty(trim($customer_email))) ? $this->lang->line('email').": ".$customer_email."<br>" : '';?>
                                 <?php echo (!empty(trim($customer_gst_no))) ? $this->lang->line('gst_number').": ".$customer_gst_no."<br>" : '';?>
                                <!--<?php echo (!empty(trim($customer_tax_number))) ? $this->lang->line('tax_number').": ".$customer_tax_number."<br>" : '';?> -->
                          </span>
                          </td>
              </tr>




            
          </table>
      </th>
      </tr>

      <tr>
        <td colspan="16">&nbsp; </td>
      </tr>
      <tr class="bg-sky"><!-- Colspan 10 -->
        <th colspan='2' class="text-center"><?= $this->lang->line('sl_no'); ?></th>
        <th colspan='4' class="text-center" ><?= $this->lang->line('description_of_goods'); ?></th>
        <th colspan='2' class="text-center"><?= $this->lang->line('hsn/sac'); ?></th>
        <th colspan='2' class="text-center"><?= $this->lang->line('unit_cost'); ?></th>
        <th colspan='1' class="text-center"><?= $this->lang->line('qty'); ?></th>
        <th colspan='1' class="text-center"><?= $this->lang->line('tax'); ?></th>
        <th colspan='1' class="text-center"><?= $this->lang->line('tax_amt'); ?></th>
        <th colspan='1' class="text-center"><?= $this->lang->line('disc.'); ?></th>
        <!-- <th colspan='2' class="text-center"><?= $this->lang->line('rate'); ?></th> -->
        <th colspan='2' class="text-center"><?= $this->lang->line('amount'); ?></th>
      </tr>
  </thead>



<tbody>
  <tr>
    <td colspan='16'>
 <?php
              $i=1;
              $tot_qty=0;
              $tot_sales_price=0;
              $tot_tax_amt=0;
              $tot_discount_amt=0;
              $tot_unit_total_cost=0;
              $tot_total_cost=0;
              $tot_before_tax=0;
              $q2=$this->db->query("SELECT a.description,c.item_name, a.sales_qty,
                                  a.price_per_unit, b.tax,b.tax_name,a.tax_amt,
                                  a.discount_input,a.discount_amt, a.unit_total_cost,
                                  a.total_cost , d.unit_name,c.sku,c.hsn
                                  FROM 
                                  db_salesitems AS a,db_tax AS b,db_items AS c , db_units as d
                                  WHERE 
                                  d.id = c.unit_id and
                                  c.id=a.item_id AND b.id=a.tax_id AND a.sales_id='$sales_id'");
              foreach ($q2->result() as $res2) {
                  $discount = (empty($res2->discount_input)||$res2->discount_input==0)? '0':$res2->discount_input."%";
                  $discount_amt = (empty($res2->discount_amt)||$res2->discount_input==0)? '0':$res2->discount_amt."";
                  $before_tax=$res2->unit_total_cost;// * $res2->sales_qty;
                  $tot_cost_before_tax=$before_tax * $res2->sales_qty;

                  
                  echo "<tr>";  
                  echo "<td colspan='2' class='text-center'>".$i++."</td>";
                  echo "<td colspan='4'>";
                  echo $res2->item_name;
                  echo (!empty($res2->description)) ? "<br><i>[".nl2br($res2->description)."]</i>" : '';
                  echo "</td>";
                  echo "<td colspan='2' class='text-left'>".$res2->hsn."</td>";
                  echo "<td colspan='2' class='text-right'>".$res2->price_per_unit."</td>";
                  
                  echo "<td class='text-center'>".$res2->sales_qty."</td>";
                  echo "<td colspan='1' class='text-right'>".$res2->tax."%</td>";
                  echo "<td style='text-align: right;'>".$res2->tax_amt."</td>";
                  //echo "<td style='text-align: right;'>".$discount."</td>";
                  echo "<td style='text-align: right;'>".$discount_amt."</td>";
 
                  //echo "<td colspan='2' class='text-right'>".number_format($before_tax,2)."</td>";
                  //echo "<td class='text-right'>".$res2->price_per_unit."</td>";
                  
                  echo "<td colspan='2' class='text-right'>".number_format($res2->total_cost,2)."</td>";
                  echo "</tr>";  
                  $tot_qty +=$res2->sales_qty;
                  $tot_sales_price +=$res2->price_per_unit;
                  $tot_tax_amt +=$res2->tax_amt;
                  $tot_discount_amt +=$res2->discount_amt;
                  $tot_unit_total_cost +=$res2->unit_total_cost;
                  $tot_before_tax +=$before_tax;
                  $tot_total_cost +=$res2->total_cost;

              }
              ?>
      </td>
  </tr>
  </tbody>


<tfoot>
 

  <tr class="bg-sky">
    <td colspan="8" class='text-center text-bold'><?= $this->lang->line('total'); ?></td>
    <td colspan="2" class='text-right' ><b><?php echo number_format(($tot_sales_price),2); ?></b></td>
    <td colspan="1" class='text-bold text-center'><?=number_format($tot_qty,2); ?></td>
    <td colspan="1" class='text-bold text-center'></td>
    <td colspan="1" class='text-right' ><b><?php echo number_format(($tot_tax_amt),2); ?></b></td>
    <td colspan="1" class='text-right' ><b><?php echo number_format(($tot_discount_amt),2); ?></b></td>
    <td colspan="2" class='text-right' ><b><?php echo number_format(($tot_total_cost),2); ?></b></td>
  </tr>
  <tr>
    <td colspan="14" class='text-right'><b><?= $this->lang->line('subtotal'); ?></b></td>
    <td colspan="2" class='text-right' ><b><?php echo number_format($tot_total_cost,2); ?></b></td>
  </tr>


  <tr>
    <td colspan="14" class='text-right'><b><?= $this->lang->line('other_charges'); ?></b></td>
    <td colspan="2" class='text-right' ><b><?php echo number_format($other_charges_amt,2); ?></b></td>
  </tr>
  
  <tr>
    <td colspan="14" class='text-right'><b><?= $this->lang->line('discount_on_all'); ?>(<?= $discount_to_all_input." ".$discount_to_all_type; ?>)</b></td>
    <td colspan="2" class='text-right' ><b><?php echo number_format($tot_discount_to_all_amt,2); ?></b></td>
  </tr>
  
  <tr>
    <td colspan="14" class='text-right'><b><?= $this->lang->line('grand_total'); ?></b></td>
    <td colspan="2" class='text-right' ><b><?php echo number_format($grand_total,2); ?></b></td>
  </tr>

  <tr>
    <td colspan="14" class='text-right'><b><?= $this->lang->line('invoice_paid'); ?></b></td>
    <td colspan="2" class='text-right' ><b><?php echo number_format($paid_amount,2); ?></b></td>
  </tr>
  <tr>
    <td colspan="14" class='text-right'><b><?= $this->lang->line('invoice_due'); ?></b></td>
    <td colspan="2" class='text-right' ><b><?php echo number_format($grand_total-$paid_amount,2); ?></b></td>
  </tr>
  <tr>
    <td colspan="14" class='text-right'><b><?= $this->lang->line('customer_total_due'); ?></b></td>
    <td colspan="2" class='text-right' ><b><?php echo number_format($total_due,2); ?></b></td>
  </tr>

  <tr>
    <td colspan="16">
<?php
     
      $currency_code = $this->db->select("currency_code")->where('id',$currency_id)->get("db_currency")->row()->currency_code;

      echo "<span class='amt-in-word'>Amount in words: <i style='font-weight:bold;'>".$currency_code." ".no_to_words($grand_total)." Only</i></span>";

      ?>
  
</td>
  </tr>
  <tr>
    <td colspan="16">
    <?php
        echo "<span class='amt-in-word'>Note: <i style=''>".$sales_note."</i></span>";

        ?>
    
  </td>
    </tr>



      <!-- T&C & Bank Details & signatories-->
      <tr>
        <td colspan="16">
          <table width="100%" class="style_hidden fixed_table">
           
              <tr>
                <td colspan="16">
                  <span>
                    <table style="width: 100%;" class="style_hidden fixed_table">
                    
                        <!-- T&C & Bank Details -->
                        <tr>
                          <td colspan="16">
                            <span><b> <?= $this->lang->line('terms_and_conditions'); ?></b></span><br>
                            <span style='font-size: 8px;'><?= nl2br($terms_and_conditions);  ?></span>
                          </td>
                        </tr>

                         <tr>
                          <td colspan='8' style="height:80px;">
                            <span><b> <?= $this->lang->line('customer_signature'); ?></b></span>
                          </td>
                          <td colspan='8'>
                            <span><b> <?= $this->lang->line('authorised_signatory'); ?></b></span>
                          </td>
                        </tr>
                     
                    </table>
                  </span>
                </td>
              </tr>
           
          </table>
      </td>
      </tr>
      <!-- T&C & Bank Details & signatories End -->

      <?php if(!empty($sales_invoice_footer_text)) {?>
      <tr>
        <td colspan="16" style="text-align: center;font-size: 8px;">
          <?= $sales_invoice_footer_text; ?>
        </td>
      </tr>
      <?php } ?>
</tfoot>

</table>
<!-- <caption>
      <center>
        <span style="font-size: 11px;text-transform: uppercase;">
          This is Computer Generated Invoice
        </span>
      </center>
</caption> -->
</body>
</html>
<?php 
 function no_to_words($no)
      {   
       $words = array('0'=> '' ,'1'=> 'One' ,'2'=> 'Two' ,'3' => 'Three','4' => 'Four','5' => 'Five','6' => 'Six','7' => 'Seven','8' => 'Eight','9' => 'Nine','10' => 'Ten','11' => 'Eleven','12' => 'Twelve','13' => 'Thirteen','14' => 'Fouteen','15' => 'Fifteen','16' => 'Sixteen','17' => 'Seventeen','18' => 'Eighteen','19' => 'Nineteen','20' => 'Twenty','30' => 'Thirty','40' => 'Fourty','50' => 'Fifty','60' => 'Sixty','70' => 'Seventy','80' => 'Eighty','90' => 'Ninty','100' => 'Hundred &','1000' => 'Thousand','100000' => 'Lakh','10000000' => 'Crore');
        if($no == 0)
          return ' ';
        else {
        $novalue='';
        $highno=$no;
        $remainno=0;
        $value=100;
        $value1=1000;       
            while($no>=100)    {
              if(($value <= $no) &&($no  < $value1))    {
              $novalue=$words["$value"];
              $highno = (int)($no/$value);
              $remainno = $no % $value;
              break;
              }
              $value= $value1;
              $value1 = $value * 100;
            }       
            if(array_key_exists("$highno",$words))
              return $words["$highno"]." ".$novalue." ".no_to_words($remainno);
            else {
             $unit=$highno%10;
             $ten =(int)($highno/10)*10;            
             return $words["$ten"]." ".$words["$unit"]." ".$novalue." ".no_to_words($remainno);
             }
        }
      }
      ?>