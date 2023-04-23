<!DOCTYPE html>
<html>
<title><?= $page_title;?></title>
<head>
  <link rel='shortcut icon' href='<?php echo $theme_link; ?>images/favicon.ico' />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    font-family: 'Open Sans', 'Martel Sans', sans-serif;
}
th, td {
    padding: 5px;
    text-align: left;   
    vertical-align:top 
}
body{
  word-wrap: break-word;
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

    
    $q3=$this->db->query("SELECT a.supplier_name,a.mobile,a.phone,a.gstin,a.tax_number,a.email,
                           a.opening_balance,a.country_id,a.state_id,a.city,
                           a.postcode,a.address,b.purchase_date,b.reference_no,
                           b.purchase_code,b.purchase_note,b.purchase_status,
                           coalesce(b.grand_total,0) as grand_total,
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

                           FROM db_suppliers a,
                           db_purchase b 
                           WHERE 
                           a.`id`=b.`supplier_id` AND 
                           b.`id`='$purchase_id' 
                           ");
                           /*GROUP BY 
                           b.`supplier_code`*/
    
    $res3=$q3->row();
    $supplier_name=$res3->supplier_name;
    $supplier_mobile=$res3->mobile;
    $supplier_phone=$res3->phone;
    $supplier_email=$res3->email;
    $supplier_state=$res3->state_id;
    $supplier_city=$res3->city;
    $supplier_address=$res3->address;
    $supplier_postcode=$res3->postcode;
    $supplier_gst_no=$res3->gstin;
    $supplier_tax_number=$res3->tax_number;
    $supplier_opening_balance=$res3->opening_balance;
    $purchase_date=$res3->purchase_date;
    $reference_no=$res3->reference_no;
    $purchase_code=$res3->purchase_code;
    $purchase_note=$res3->purchase_note;
    $purchase_status=$res3->purchase_status;

    
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
    
    $supplier_country = $this->db->query("select country from db_country where id=".$res3->country_id)->row()->country;
    if(!empty($supplier_state)){
      $supplier_state = $this->db->query("select state from db_states where id=".$res3->state_id)->row()->state;
    }  
  
    ?>

<table align="center" width="100%" height='100%'>
    <thead>
      
      <tr>
          <th colspan="5" rowspan="2" style="padding-left: 15px;">
            <b><?php echo $company_name; ?></b><br/>
            <?php echo $this->lang->line('address')." : ".$company_address; ?>,
            <?php echo $company_country; ?><br/>
            <?php echo $this->lang->line('mobile').":".$company_mobile; ?><br/>
            <?php echo (!empty(trim($company_email))) ? $this->lang->line('email').": ".$company_email."<br>" : '';?>
            <?php echo (!empty(trim($company_gst_no))) ? $this->lang->line('gst_number').": ".$company_gst_no."<br>" : '';?>
            <?php echo (!empty(trim($company_vat_no))) ? $this->lang->line('vat_number').": ".$company_vat_no."<br>" : '';?>
          </th>
          <th colspan="5" rowspan="1"><b style="text-transform: capitalize;"><?= $this->lang->line('purchase_invoice'); ?> </b>(<?=$purchase_status;?>)</th>
            
      </tr>
      <tr>
          <th colspan="2" rowspan="1"><?= $this->lang->line('invoice_no'); ?> : <?php echo "$purchase_code"; ?></th>  
          <th colspan="3" rowspan="1"><?= $this->lang->line('date'); ?> : <?php echo date("Y/m/d"); ?></th>
      </tr>
    


      <tr>
    <td colspan="5" style="padding-left: 15px;">
      <b><i><?= $this->lang->line('supplier_address'); ?></i></b><br/>
    <?php echo $this->lang->line('name').": ".$supplier_name; ?><br/>
      <?php echo (!empty(trim($supplier_mobile))) ? $this->lang->line('mobile').": ".$supplier_mobile."<br>" : '';?>
      <?php 
              if(!empty($supplier_address)){
                echo $supplier_address;
              }
              if(!empty($supplier_country)){
                echo $supplier_country;
              }
              if(!empty($supplier_state)){
                echo ",".$supplier_state;
              }
              if(!empty($supplier_city)){
                echo ",".$supplier_city;
              }
              if(!empty($supplier_postcode)){
                echo "-".$supplier_postcode;
              }
            ?>
            <br>
      <?php echo (!empty(trim($supplier_email))) ? $this->lang->line('email').": ".$supplier_email."<br>" : '';?>
      <?php echo (!empty(trim($supplier_gst_no))) ? $this->lang->line('gst_number').": ".$supplier_gst_no."<br>" : '';?>
      <?php echo (!empty(trim($supplier_tax_number))) ? $this->lang->line('tax_number').": ".$supplier_tax_number."<br>" : '';?>

  </td>
    
    <td colspan="5" style="padding-left: 15px;">
    <b><i><?= $this->lang->line('shipping_address'); ?></i></b><br/>
    <b><?php echo $company_name; ?></b><br/>
            <?php echo $this->lang->line('address')." : ".$company_address; ?>,
            <?php echo $company_country; ?><br/>
            <?php echo $this->lang->line('mobile').":".$company_mobile; ?><br/>
            <?php echo (!empty(trim($company_email))) ? $this->lang->line('email').": ".$company_email."<br>" : '';?>
            <?php echo (!empty(trim($company_gst_no))) ? $this->lang->line('gst_number').": ".$company_gst_no."<br>" : '';?>
            <?php echo (!empty(trim($company_vat_no))) ? $this->lang->line('vat_number').": ".$company_vat_no."<br>" : '';?>
  </td>
  </tr>
  
    
  <tr>
    <th rowspan='2'>#</th>
    <th rowspan='2'><?= $this->lang->line('item_name'); ?></th>
    <th rowspan='2'><?= $this->lang->line('purchase_price'); ?></th>
    <th rowspan='2'><?= $this->lang->line('quantity'); ?></th>
    <th rowspan='2'><?= $this->lang->line('tax'); ?></th>
    <th rowspan='2'><?= $this->lang->line('tax_amount'); ?></th>
    <th rowspan='2'><?= $this->lang->line('discount'); ?></th>
    <th rowspan='2'><?= $this->lang->line('discount_amount'); ?></th>
    <th rowspan='2'><?= $this->lang->line('unit_cost'); ?></th>
    <th rowspan='2'><?= $this->lang->line('total_amount'); ?></th>

  </tr>
  </thead>
<tbody>
  <tr>
 <?php
              $i=0;
              $tot_qty=0;
              $tot_purchase_price=0;
              $tot_tax_amt=0;
              $tot_discount_amt=0;
              $tot_unit_total_cost=0;
              $tot_total_cost=0;
              $q2=$this->db->query("SELECT c.item_name, a.purchase_qty,
                                  a.price_per_unit, b.tax,b.tax_name,a.tax_amt,
                                  a.unit_discount_per,a.discount_amt, a.unit_total_cost,
                                  a.total_cost 
                                  FROM 
                                  db_purchaseitems AS a,db_tax AS b,db_items AS c 
                                  WHERE 
                                  c.id=a.item_id AND b.id=a.tax_id AND a.purchase_id='$purchase_id'");
              foreach ($q2->result() as $res2) {
                  $discount = (!empty($res2->unit_discount_per)||$res2->unit_discount_per==0)?0:$res2->unit_discount_per;
                  echo "<tr>";  
                  echo "<td>".++$i."</td>";
                  echo "<td>".$res2->item_name."</td>"; 
                  echo "<td>".$res2->price_per_unit."</td>"; 
                //  echo "<td>".$res2->price_per_unit."</td>";
                  echo "<td>".$res2->purchase_qty."</td>";
                  echo "<td>".$res2->tax_name."</td>";
                  echo "<td style='text-align: right;'>".$res2->tax_amt."</td>";
                  echo "<td style='text-align: right;'>".$discount."% </td>";
                  echo "<td style='text-align: right;'>".$res2->discount_amt."</td>";
                  echo "<td style='text-align: right;'>".$res2->unit_total_cost."</td>";
                  echo "<td style='text-align: right;'>".$res2->total_cost."</td>";
                  echo "</tr>";  
                  $tot_qty +=$res2->purchase_qty;
                  $tot_purchase_price +=$res2->price_per_unit;
                  $tot_tax_amt +=$res2->tax_amt;
                  $tot_discount_amt +=$res2->discount_amt;
                  $tot_unit_total_cost +=$res2->unit_total_cost;
                  $tot_total_cost +=$res2->total_cost;
              }
              ?>
  </tr>
  </tbody>
<tfoot>
   <tr>
    <td colspan="3" style="text-align: center;font-weight: bold;"><?= $this->lang->line('total'); ?></td>
    <td colspan="1" style="font-weight: bold;"><?=$tot_qty; ?></td>
    <td colspan="1" style="">-</td>
    <td colspan="1" style="text-align: right;" ><b><?php echo number_format(($tot_tax_amt),2,'.',''); ?></b></td>
    <td colspan="1" style="">-</td>
    <td colspan="1" style="text-align: right;" ><b><?php echo number_format(($tot_discount_amt),2,'.',''); ?></b></td>
    <td colspan="1" style="text-align: right;" ><b><?php echo number_format(($tot_unit_total_cost),2,'.',''); ?></b></td>
    <td colspan="1" style="text-align: right;" ><b><?php echo number_format(($tot_total_cost),2,'.',''); ?></b></td>
  </tr>
  <tr>
    <td colspan="9" style="text-align: right;"><b><?= $this->lang->line('subtotal'); ?></b></td>
    <td colspan="1" style="text-align: right;" ><b><?php echo number_format(round($subtotal),2,'.',''); ?></b></td>
  </tr>
  <tr>
    <td colspan="9" style="text-align: right;"><b><?= $this->lang->line('other_charges'); ?></b></td>
    <td colspan="1" style="text-align: right;" ><b><?php echo number_format(round($other_charges_amt),2,'.',''); ?></b></td>
  </tr>
  <tr>
    <td colspan="9" style="text-align: right;"><b><?= $this->lang->line('discount_on_all'); ?>(<?= $discount_to_all_input." ".$discount_to_all_type; ?>)</b></td>
    <td colspan="1" style="text-align: right;" ><b><?php echo number_format(round($tot_discount_to_all_amt),2,'.',''); ?></b></td>
  </tr>
  <tr>
    <td colspan="9" style="text-align: right;"><b><?= $this->lang->line('grand_total'); ?></b></td>
    <td colspan="1" style="text-align: right;" ><b><?php echo number_format(round($grand_total),2,'.',''); ?></b></td>
  </tr>
  <tr>
    <td colspan="10">
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
      echo "<span class='amt-in-word'>Amount in words: <i style='font-weight:bold;'>".no_to_words(round($grand_total))." Only</i></span>";

      ?>
  
</td>
  </tr>

  <tr>
    <td colspan="5" style="height:100px;">
      <b><?= $this->lang->line('supplier_signature'); ?></b><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>
    </td>
    <td colspan="5">
      <b><?= $this->lang->line('authorised_signature'); ?></b><br/><br/><br/><br/><br/>
    </td>
  </tr>
</tfoot>
</table>



</body>
</html>
