<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_model extends CI_Model {

	public function show_sales_report(){
		extract($_POST);

		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		
		$this->db->select("a.id,a.sales_code,a.sales_date,b.customer_name,b.customer_code,a.grand_total,a.paid_amount");
	    
		if($customer_id!=''){
			
			$this->db->where("a.customer_id=$customer_id");
		}
		if($view_all=="no"){
			$this->db->where("(a.sales_date>='$from_date' and a.sales_date<='$to_date')");
		}
		$this->db->where("b.`id`= a.`customer_id`");
		$this->db->from("db_sales as a");
		$this->db->where("a.`sales_status`= 'Final'");
		$this->db->from("db_customers as b");
		
		
		//echo $this->db->get_compiled_select();exit();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			$tot_grand_total=0;
			$tot_paid_amount=0;
			$tot_due_amount=0;
			foreach ($q1->result() as $res1) {
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td><a title='View Invoice' href='".base_url("sales/invoice/$res1->id")."'>".$res1->sales_code."</a></td>";
				echo "<td>".show_date($res1->sales_date)."</td>";
				echo "<td>".$res1->customer_code."</td>";
				echo "<td>".$res1->customer_name."</td>";
				echo "<td class='text-right'>".app_number_format($res1->grand_total)."</td>";
				echo "<td class='text-right'>".app_number_format($res1->paid_amount)."</td>";
				echo "<td class='text-right'>".app_number_format($res1->grand_total-$res1->paid_amount)."</td>";
				echo "</tr>";
				$tot_grand_total+=$res1->grand_total;
				$tot_paid_amount+=$res1->paid_amount;
				$tot_due_amount+=($res1->grand_total-$res1->paid_amount);

			}

			echo "<tr>
					  <td class='text-right text-bold' colspan='5'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_grand_total)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_paid_amount)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_due_amount)."</td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=13>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}

	public function show_sales_return_report(){
		extract($_POST);

		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		
		$this->db->select("a.id,a.return_code,a.return_date,b.customer_name,b.customer_code,a.grand_total,a.paid_amount");
	    
		if($customer_id!=''){
			
			$this->db->where("a.customer_id=$customer_id");
		}
		if($view_all=="no"){
			$this->db->where("(a.return_date>='$from_date' and a.return_date<='$to_date')");
		}
		$this->db->where("b.`id`= a.`customer_id`");
		$this->db->from("db_salesreturn as a");
		$this->db->from("db_customers as b");
		$this->db->select("CASE WHEN c.sales_code IS NULL THEN '' ELSE c.sales_code END AS sales_code");
		$this->db->join('db_sales as c','c.id=a.sales_id','left');
		
		
		//echo $this->db->get_compiled_select();exit();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			$tot_grand_total=0;
			$tot_paid_amount=0;
			$tot_due_amount=0;
			foreach ($q1->result() as $res1) {
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td><a title='View Invoice' href='".base_url("sales_return/invoice/$res1->id")."'>".$res1->return_code."</a></td>";
				echo "<td>".show_date($res1->return_date)."</td>";
				
				echo (!empty($res1->sales_code)) ? "<td><a title='Return Raised Against this Invoice' href='".base_url("sales/invoice/$res1->id")."'>".$res1->sales_code."</a></td>" : '<td>-NA-</td>';
				echo "<td>".$res1->customer_name."</td>";
				echo "<td class='text-right'>".app_number_format($res1->grand_total)."</td>";
				echo "<td class='text-right'>".app_number_format($res1->paid_amount)."</td>";
				echo "<td class='text-right'>".app_number_format($res1->grand_total-$res1->paid_amount)."</td>";
				echo "</tr>";
				$tot_grand_total+=$res1->grand_total;
				$tot_paid_amount+=$res1->paid_amount;
				$tot_due_amount+=($res1->grand_total-$res1->paid_amount);

			}

			echo "<tr>
					  <td class='text-right text-bold' colspan='5'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_grand_total)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_paid_amount)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_due_amount)."</td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=13>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}

	public function show_purchase_report(){
		extract($_POST);
		
		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		
		$this->db->select("a.id,a.purchase_code,a.purchase_date,b.supplier_name,b.supplier_code,a.grand_total,a.paid_amount");
	    
		if($supplier_id!=''){
			$this->db->where("a.supplier_id=$supplier_id");
		}
		if($view_all=="no"){
			$this->db->where("(a.purchase_date>='$from_date' and a.purchase_date<='$to_date')");
		}
		$this->db->where("b.`id`= a.`supplier_id`");
		$this->db->from("db_purchase as a");
		$this->db->where("a.`purchase_status`= 'Received'");
		$this->db->from("db_suppliers as b");
		
		//echo $this->db->get_compiled_select();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			$tot_grand_total=0;
			$tot_paid_amount=0;
			$tot_due_amount=0;
			foreach ($q1->result() as $res1) {
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td><a title='View Invoice' href='".base_url("purchase/invoice/$res1->id")."'>".$res1->purchase_code."</a></td>";
				echo "<td>".show_date($res1->purchase_date)."</td>";
				echo "<td>".$res1->supplier_code."</td>";
				echo "<td>".$res1->supplier_name."</td>";
				echo "<td class='text-right'>".app_number_format($res1->grand_total)."</td>";
				echo "<td class='text-right'>".app_number_format($res1->paid_amount)."</td>";
				echo "<td class='text-right'>".app_number_format($res1->grand_total-$res1->paid_amount)."</td>";
				echo "</tr>";
				$tot_grand_total+=$res1->grand_total;
				$tot_paid_amount+=$res1->paid_amount;
				$tot_due_amount+=($res1->grand_total-$res1->paid_amount);

			}

			echo "<tr>
					  <td class='text-right text-bold' colspan='5'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_grand_total)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_paid_amount)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_due_amount)."</td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=13>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}

	public function show_purchase_return_report(){
		extract($_POST);
		
		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		
		$this->db->select("a.id,a.return_code,a.return_date,b.supplier_name,a.grand_total,a.paid_amount");
	    
		if($supplier_id!=''){
			$this->db->where("a.supplier_id=$supplier_id");
		}
		if($view_all=="no"){
			$this->db->where("(a.return_date>='$from_date' and a.return_date<='$to_date')");
		}
		$this->db->where("b.`id`= a.`supplier_id`");
		$this->db->from("db_purchasereturn as a");
		$this->db->from("db_suppliers as b");
		$this->db->select("CASE WHEN c.purchase_code IS NULL THEN '' ELSE c.purchase_code END AS purchase_code");
		$this->db->join('db_purchase as c','c.id=a.purchase_id','left');
		
		//echo $this->db->get_compiled_select();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			$tot_grand_total=0;
			$tot_paid_amount=0;
			$tot_due_amount=0;
			foreach ($q1->result() as $res1) {
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td><a title='View Invoice' href='".base_url("purchase_return/invoice/$res1->id")."'>".$res1->return_code."</a></td>";
				echo "<td>".show_date($res1->return_date)."</td>";
				echo (!empty($res1->purchase_code)) ? "<td><a title='Return Raised Against this Invoice' href='".base_url("purchase/invoice/$res1->id")."'>".$res1->purchase_code."</a></td>" : '<td>-NA-</td>';
				
				echo "<td>".$res1->supplier_name."</td>";
				echo "<td class='text-right'>".app_number_format($res1->grand_total)."</td>";
				echo "<td class='text-right'>".app_number_format($res1->paid_amount)."</td>";
				echo "<td class='text-right'>".app_number_format($res1->grand_total-$res1->paid_amount)."</td>";
				echo "</tr>";
				$tot_grand_total+=$res1->grand_total;
				$tot_paid_amount+=$res1->paid_amount;
				$tot_due_amount+=($res1->grand_total-$res1->paid_amount);

			}

			echo "<tr>
					  <td class='text-right text-bold' colspan='5'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_grand_total)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_paid_amount)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_due_amount)."</td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=13>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}
	
	public function show_expense_report(){
		extract($_POST);
		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));

		/*$q1=$this->db->query("SELECT a.*,b.category_name from db_expense as a,db_expense_category as b where b.id=a.category_id and a.expense_date>='$from_date' and expense_date<='$to_date'");*/
		
		$this->db->select("a.*,b.category_name");
	    
		if($category_id!=''){
			$this->db->where("a.category_id=$category_id");
		}
		if($view_all=="no"){
			$this->db->where("(a.expense_date>='$from_date' and a.expense_date<='$to_date')");
		}
		$this->db->where("b.`id`= a.`category_id`");
		$this->db->from("db_expense as a");
		$this->db->from("db_expense_category as b");
		
		//echo $this->db->get_compiled_select();
		
		$q1=$this->db->get();
		
		if($q1->num_rows()>0){
			$i=0;
			$tot_expense_amt=0;
			foreach ($q1->result() as $res1) {
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td>".$res1->expense_code."</td>";
				echo "<td>".$res1->expense_date."</td>";
				echo "<td>".$res1->category_name."</td>";
				echo "<td>".$res1->reference_no."</td>";
				echo "<td>".$res1->expense_for."</td>";
				echo "<td class='text-right'>".app_number_format($res1->expense_amt)."</td>";
				echo "<td>".$res1->note."</td>";
				echo "<td>".ucfirst($res1->created_by)."</td>";
				echo "</tr>";
				$tot_expense_amt+=$res1->expense_amt;
			}
			echo "<tr>
					  <td class='text-right text-bold' colspan='6'><b>Total Expense :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_expense_amt)."</td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=13>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}
	public function show_stock_report(){
		extract($_POST);

		
		$this->db->select("a.*,b.tax_name");
		$this->db->from("db_items as a,db_tax as b");
		$this->db->where("b.id=a.tax_id");
		$this->db->order_by("a.id");
		
		//echo $this->db->get_compiled_select();exit();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			$tot_stock_value=0;
			$tot_purchase_price=0;
			$tot_sales_price=0;
			$tot_stock=0;
			foreach ($q1->result() as $res1) {
				$tax_type = ($res1->tax_type=='Inclusive') ? 'Inc.' : 'Exc.';
				$stock_value = $res1->sales_price * $res1->stock;
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td>".$res1->item_code."</td>";
				echo "<td>".$res1->item_name."</td>";
				echo "<td class='text-right'>".app_number_format($res1->purchase_price)."</td>";
				echo "<td>".$res1->tax_name."[".$tax_type."]</td>";
				echo "<td class='text-right'>".app_number_format($res1->sales_price)."</td>";
				echo "<td>".$res1->stock."</td>";
				echo "<td class='text-right'>".$stock_value."</td>";
				echo "</tr>";
				$tot_purchase_price+=$res1->purchase_price;
				$tot_sales_price+=$res1->sales_price;
				$tot_stock_value+=$stock_value;
				$tot_stock+=$res1->stock;

			}

			echo "<tr>
					  <td class='text-right text-bold' colspan='3'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_purchase_price)."</td>
					  <td class='text-right text-bold'></td>
					  <td class='text-right text-bold'>".app_number_format($tot_sales_price)."</td>
					  <td class='text-bold'>".app_number_format($tot_stock)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_stock_value)."</td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=8>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}
	public function show_item_sales_report(){
		extract($_POST);

		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		
		$this->db->select("a.id,a.sales_code,a.sales_date,b.customer_name,b.customer_code,c.total_cost");
		$this->db->select("c.sales_qty,d.item_name");
	    
	    
		if($view_all=="no"){
			$this->db->where("(a.sales_date>='$from_date' and a.sales_date<='$to_date')");
		}
//		$this->db->group_by("c.`item_id`");
		$this->db->order_by("a.`sales_date`,a.sales_code",'asc');
		$this->db->from("db_sales as a");
		$this->db->where("a.`id`= c.`sales_id`");
		$this->db->where("a.`sales_status`= 'Final'");
		$this->db->from("db_items as d");
		$this->db->where("d.`id`= c.`item_id`");
		$this->db->from("db_customers as b");
		$this->db->where("b.`id`= a.`customer_id`");
		$this->db->from("db_salesitems as c");
		if($item_id!=''){
			$this->db->where("c.item_id=$item_id");
		}
		
		
		
		//echo $this->db->get_compiled_select();exit();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			$tot_total_cost=0;
			$tot_paid_amount=0;
			$tot_due_amount=0;
			foreach ($q1->result() as $res1) {
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td><a title='View Invoice' href='".base_url("sales/invoice/$res1->id")."'>".$res1->sales_code."</a></td>";
				echo "<td>".show_date($res1->sales_date)."</td>";
				echo "<td>".$res1->customer_name."</td>";
				echo "<td>".$res1->item_name."</td>";
				echo "<td>".$res1->sales_qty."</td>";
				echo "<td class='text-right'>".app_number_format($res1->total_cost)."</td>";
				
				echo "</tr>";
				$tot_total_cost+=$res1->total_cost;
				
			}

			echo "<tr>
					  <td class='text-right text-bold' colspan='6'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_total_cost)."</td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=13>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}
	public function show_purchase_payments_report(){
		extract($_POST);
		$supplier_id = $this->input->post('supplier_id');
		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		
		$this->db->select("c.id,c.purchase_code,a.payment_date,b.supplier_name,b.supplier_code,a.payment_type,a.payment_note,a.payment");
	    
		if($supplier_id!=''){
			$this->db->where("c.supplier_id=$supplier_id");
		}
		$this->db->where("b.id=c.`supplier_id`");
		$this->db->where("(a.payment_date>='$from_date' and a.payment_date<='$to_date')");
		
		$this->db->where("c.id=a.purchase_id");

		$this->db->from("db_purchasepayments as a");
		$this->db->from("db_suppliers as b");
		$this->db->from("db_purchase as c");
		$this->db->where("c.`purchase_status`= 'Received'");
		//$this->db->group_by("c.purchase_code");
		
		//echo $this->db->get_compiled_select();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			$tot_payment=0;
			foreach ($q1->result() as $res1) {
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td><a title='View Invoice' href='".base_url("purchase/invoice/$res1->id")."'>".$res1->purchase_code."</a></td>";
				echo "<td>".show_date($res1->payment_date)."</td>";
				echo "<td>".$res1->supplier_code."</td>";
				echo "<td>".$res1->supplier_name."</td>";
				echo "<td>".$res1->payment_type."</td>";
				echo "<td>".$res1->payment_note."</td>";
				echo "<td class='text-right'>".app_number_format($res1->payment)."</td>";
				echo "</tr>";
				$tot_payment+=$res1->payment;
			}

			echo "<tr>
					  <td class='text-right text-bold' colspan='7'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_payment)."</td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=8>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}
	public function supplier_payments_report(){
		extract($_POST);
		
		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		
		$this->db->select("a.payment_date,b.supplier_name,a.payment_type,a.payment_note,a.payment");
	    
		if($supplier_id!=''){
			$this->db->where("a.supplier_id=$supplier_id");
		}
		
		$this->db->where("a.payment>0");
		$this->db->where("(a.payment_date>='$from_date' and a.payment_date<='$to_date')");
		
	

		$this->db->from("db_supplier_payments as a");
		$this->db->from("db_suppliers as b");
		$this->db->where("b.id=a.`supplier_id`");
		
		//$this->db->group_by("c.sales_code");
		
		//echo $this->db->get_compiled_select();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			$tot_payment=0;
			foreach ($q1->result() as $res1) {
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td>".show_date($res1->payment_date)."</td>";
				echo "<td>".$res1->supplier_name."</td>";
				echo "<td>".$res1->payment_type."</td>";
				echo "<td>".$res1->payment_note."</td>";
				echo "<td class='text-right'>".app_number_format($res1->payment)."</td>";
				echo "</tr>";
				$tot_payment+=$res1->payment;
			}

			echo "<tr>
					  <td class='text-right text-bold' colspan='5'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_payment)."</td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=6>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}
	public function show_sales_payments_report(){
		extract($_POST);
		
		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		
		$this->db->select("c.id,c.sales_code,a.payment_date,b.customer_name,b.customer_code,a.payment_type,a.payment_note,a.payment");
	    
		if($customer_id!=''){
			$this->db->where("c.customer_id=$customer_id");
		}
		$this->db->where("b.id=c.`customer_id`");
		$this->db->where("a.payment>0");
		$this->db->where("(a.payment_date>='$from_date' and a.payment_date<='$to_date')");
		
		$this->db->where("c.id=a.sales_id");

		$this->db->from("db_salespayments as a");
		$this->db->from("db_customers as b");
		$this->db->from("db_sales as c");
		$this->db->where("c.`sales_status`= 'Final'");
		//$this->db->group_by("c.sales_code");
		
		//echo $this->db->get_compiled_select();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			$tot_payment=0;
			foreach ($q1->result() as $res1) {
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td><a title='View Invoice' href='".base_url("sales/invoice/$res1->id")."'>".$res1->sales_code."</a></td>";
				echo "<td>".show_date($res1->payment_date)."</td>";
				echo "<td>".$res1->customer_code."</td>";
				echo "<td>".$res1->customer_name."</td>";
				echo "<td>".$res1->payment_type."</td>";
				echo "<td>".$res1->payment_note."</td>";
				echo "<td class='text-right'>".app_number_format($res1->payment)."</td>";
				echo "</tr>";
				$tot_payment+=$res1->payment;
			}

			echo "<tr>
					  <td class='text-right text-bold' colspan='7'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_payment)."</td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=8>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}

	public function customer_payments_report(){
		extract($_POST);
		
		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		
		$this->db->select("a.payment_date,b.customer_name,a.payment_type,a.payment_note,a.payment");
	    
		if($customer_id!=''){
			$this->db->where("a.customer_id=$customer_id");
		}
		
		$this->db->where("a.payment>0");
		$this->db->where("(a.payment_date>='$from_date' and a.payment_date<='$to_date')");
		
	

		$this->db->from("db_customer_payments as a");
		$this->db->from("db_customers as b");
		$this->db->where("b.id=a.`customer_id`");
		
		//$this->db->group_by("c.sales_code");
		
		//echo $this->db->get_compiled_select();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			$tot_payment=0;
			foreach ($q1->result() as $res1) {
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td>".show_date($res1->payment_date)."</td>";
				echo "<td>".$res1->customer_name."</td>";
				echo "<td>".$res1->payment_type."</td>";
				echo "<td>".$res1->payment_note."</td>";
				echo "<td class='text-right'>".app_number_format($res1->payment)."</td>";
				echo "</tr>";
				$tot_payment+=$res1->payment;
			}

			echo "<tr>
					  <td class='text-right text-bold' colspan='5'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_payment)."</td>
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=6>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}
	/*Expired Items Report*/
	public function show_expired_items_report(){
		extract($_POST);
		$CI =& get_instance();

		
		$to_date=date("Y-m-d",strtotime($to_date));
		
		$this->db->select("id,item_code,item_name,expire_date,stock,lot_number");
	    
		if($item_id!=''){
			
			$this->db->where("id=$item_id");
		}
		if($view_all=="no"){
			$this->db->where("(expire_date<='$to_date')");
		}
		$this->db->from("db_items");
		
		//echo $this->db->get_compiled_select();exit();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			foreach ($q1->result() as $res1) {
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td>".$res1->item_code."</td>";
				echo "<td>".$res1->item_name."</td>";
				echo "<td>".$res1->lot_number."</td>";
				echo "<td>".show_date($res1->expire_date)."</td>";
				echo "<td>".$res1->stock."</td>";

			}
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=6>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}

	public function get_profit_by_item(){
		$CI =& get_instance();
		extract($_POST);
		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		
		$q1=$this->db->query("
				SELECT c.id as sales_id,b.tax_amt,b.item_id,a.item_name,COALESCE(sum(b.sales_qty),0) as sales_qty,a.purchase_price,
						COALESCE(SUM(total_cost),0) as total_cost
				FROM db_items as a, db_salesitems as b, db_sales as c
				WHERE 
				c.id=b.sales_id
				and
				a.id=b.item_id 
				and
				c.sales_status='Final'
				and
				( c.sales_date>='".$from_date."' and  c.sales_date<='".$to_date."')
				GROUP BY item_id
			");
		
		if($q1->num_rows()>0){
			$i=0;
			$tot_purchase_price=0;
			$tot_sales_cost=0;
			$gross_profit=0;
			$tot_purchase_return_price=0;
			$tot_sales_return_price=0;
			$tot_sales_qty=0;
			$tot_purchase_return_qty=0;
			$tot_sales_return_qty=0;
			$grand_profit=0;
			$tot_net_profit=0;
			foreach ($q1->result() as $res1) {
				$sales_id = $res1->sales_id;
				/*Purchase Return Quantity*/
				$purchase_return_qty=$this->db->query("
						SELECT COALESCE(sum(return_qty),0) as return_qty
						FROM db_purchaseitemsreturn
						WHERE 
						item_id =".$res1->item_id)->row()->return_qty;

				/*Sales Return Quantity*/
				$q3=$this->db->query("
						SELECT COALESCE(sum(total_cost),0) as total_cost,COALESCE(sum(return_qty),0) as return_qty
						FROM db_salesitemsreturn
						WHERE 
						sales_id='$sales_id' and
						item_id =".$res1->item_id);
				$sales_return_total_cost=$q3->row()->total_cost;
				$sales_return_qty=$q3->row()->return_qty;
				
				$qty = $res1->sales_qty-$sales_return_qty;
				
				$purchase_price = $res1->purchase_price * $qty;

				$total_cost = ($res1->total_cost - $sales_return_total_cost);
				//$purchase_return_price = $res1->purchase_price*$purchase_return_qty;
				$profit = $total_cost - $purchase_price;

				$tax_amt = $res1->tax_amt/$res1->sales_qty;

			    $net_profit =$profit-($tax_amt*$qty);

				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td>".$res1->item_name."</td>";
				echo "<td>".$qty."</td>";
				echo "<td style='text-align:right;'>".app_number_format($total_cost)."</td>";
				echo "<td style='text-align:right;'>".app_number_format($purchase_price)."</td>";
				echo "<td style='text-align:right;'>".app_number_format($profit)."</td>";
				/*echo "<td style=''>".$purchase_return_qty."</td>";
				echo "<td style='text-align:right;'>".app_number_format($purchase_return_price)."</td>";*/
				/*echo "<td style=''>".$sales_return_qty."</td>";
				echo "<td style='text-align:right;'>".app_number_format($sales_return_total_cost)."</td>";*/
				/*echo "<td style='text-align:right;'>".app_number_format($net_profit)."</td>";*/
				echo "</tr>";
				$tot_purchase_price+=$purchase_price;
				//$tot_purchase_return_price+=$purchase_return_price;
				$tot_sales_cost+=$total_cost;
				//$tot_sales_return_cost+=$sales_return_total_cost;
				//$gross_profit+=(($profit + $purchase_return_price)-$sales_return_total_cost);
				$tot_sales_qty+=($res1->sales_qty-$sales_return_qty);
				$tot_purchase_return_qty+=$purchase_return_qty;
				$tot_sales_return_qty+=$sales_return_qty;
				$gross_profit+=$profit;
				$tot_net_profit+=$net_profit;
			}
			echo "<tr>
					  <td class='text-right text-bold' colspan='2'><b>Total :</b></td>
					  <td class='text-bold'>".$tot_sales_qty."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_sales_cost)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_purchase_price)."</td>
					  
					  <td class='text-right text-bold'>".app_number_format($gross_profit)."</td>
					  
				  </tr>";
				  /*<td class='text-bold'>".$tot_purchase_return_qty."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_purchase_return_price)."</td>
					  <td class='text-bold'>".$tot_sales_return_qty."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_sales_return_cost)."</td>
					  */
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=6>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}
	public function get_profit_by_invoice(){
		$CI =& get_instance();
		extract($_POST);
		$from_date=date("Y-m-d",strtotime($from_date));
		$to_date=date("Y-m-d",strtotime($to_date));
		$q1=$this->db->query("SELECT a.id,a.sales_date,a.sales_code,b.customer_name from db_sales as a,db_customers as b 
								where 
								a.sales_status='Final'
								and
								b.id=a.customer_id
								and
								( a.sales_date>='".$from_date."' and  a.sales_date<='".$to_date."')
								");

		if($q1->num_rows()>0){
			$i=0;
			$tot_purchase_price=0;
			$tot_sales_cost=0;
			$tot_profit=0;
			$net_profit=0;
			$tot_net_profit=0;

			foreach ($q1->result() as $res1) {
				$q2=$this->db->query("SELECT b.sales_qty,COALESCE(SUM(purchase_price*sales_qty),0) AS purchase_price, COALESCE(SUM(total_cost),0) AS total_cost FROM db_items AS a, db_salesitems AS b, db_sales AS c WHERE c.id=b.sales_id AND a.id=b.item_id and c.sales_status='Final'
					AND b.sales_id=".$res1->id);

				$q3=$this->db->query("SELECT COALESCE(SUM(purchase_price*return_qty),0) AS purchase_price, COALESCE(SUM(total_cost),0) AS total_cost FROM db_items AS a, db_salesitemsreturn AS b, db_salesreturn AS c WHERE c.id=b.return_id AND a.id=b.item_id and c.return_status!='Final'
					AND b.sales_id=".$res1->id);
				$purchase_return_price=$q3->row()->purchase_price;



				//Total price item_purchase_price * qty
				$purchase_price = ($q2->row()->purchase_price-$purchase_return_price);
				//Total price item_sales_price * qty
				$sales_price = ($q2->row()->total_cost-$q3->row()->total_cost);

				$profit = $sales_price - $purchase_price;
				
				/*$sales_tax_amt =$this->db->query("select COALESCE(SUM(tax_amt),0) AS tax_amt from db_salesitems where sales_id=".$res1->id)->row()->tax_amt;
				
				$sales_return_tax_amt =$this->db->query("select COALESCE(SUM(tax_amt),0) AS tax_amt from db_salesitemsreturn where sales_id=".$res1->id)->row()->tax_amt;

				$net_profit = $profit + ($sales_tax_amt-$sales_return_tax_amt);*/
				echo "<tr>";
				echo "<td>".++$i."</td>";
				echo "<td>".$res1->sales_code."</td>";
				echo "<td>".show_date($res1->sales_date)."</td>";
				echo "<td>".$res1->customer_name."</td>";
				echo "<td style='text-align:right;'>".app_number_format($sales_price)."</td>";
				echo "<td style='text-align:right;'>".app_number_format($purchase_price)."</td>";
				echo "<td style='text-align:right;'>".app_number_format($profit)."</td>";
				//echo "<td style='text-align:right;'>".app_number_format($net_profit)."</td>";
				echo "</tr>";
				$tot_purchase_price+=$purchase_price;
				$tot_sales_cost+=$sales_price;
				$tot_profit+=$profit;
				$tot_net_profit+=$net_profit;
			}
			echo "<tr>
					  <td class='text-right text-bold' colspan='4'><b>Total :</b></td>
					  <td class='text-right text-bold'>".app_number_format($tot_sales_cost)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_purchase_price)."</td>
					  <td class='text-right text-bold'>".app_number_format($tot_profit)."</td>
					  
				  </tr>";
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=7>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}

	public function brand_wise_stock(){
		extract($_POST);

		
		$this->db->select("a.item_name,COALESCE(sum(a.stock),0) as stock");
		$this->db->select("b.brand_name");
		$this->db->from("db_items as a");
		$this->db->join('db_brands as b', 'b.id=a.brand_id', 'left');
		$this->db->order_by("b.brand_name");
		$this->db->group_by("b.brand_name");
		
		//echo $this->db->get_compiled_select();exit();
		
		$q1=$this->db->get();
		if($q1->num_rows()>0){
			$i=0;
			foreach ($q1->result() as $res1) {
				//$tax_type = ($res1->tax_type=='Inclusive') ? 'Inc.' : 'Exc.';
				echo "<tr>";
				echo "<td>".++$i."</td>";
				//echo "<td>".$res1->item_code."</td>";
				echo "<td>".$res1->brand_name."</td>";
				//echo "<td class='text-right'>".$res1->purchase_price."</td>";
				//echo "<td>".$res1->tax_name."[".$tax_type."]</td>";
				//echo "<td class='text-right'>".$res1->sales_price."</td>";
				echo "<td>".$res1->stock."</td>";
				echo "</tr>";
			}
		}
		else{
			echo "<tr>";
			echo "<td class='text-center text-danger' colspan=13>No Records Found</td>";
			echo "</tr>";
		}
		
	    exit;
	}
}
