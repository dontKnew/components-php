<?php

/**
 * Author: Askarali Makanadar
 * Date: 05-11-2018
 */
class Dashboard_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function breadboard_values()
	{
		///Find total suppliers
		$query1="select coalesce(count(*),0) as tot_sup from db_suppliers where status=1";
		$tot_sup=$this->db->query($query1)->row()->tot_sup;	

		///Find total Products
		$query2="select coalesce(count(*),0) as tot_pro from db_items where status=1";
		$tot_pro=$this->db->query($query2)->row()->tot_pro;	

		//Total Customers
		$query3="select coalesce(count(*),0) as tot_cust from db_customers where status=1 and id<>1";
		$tot_cust=$this->db->query($query3)->row()->tot_cust;	

  		//Total Purchases Active
  		$query4="SELECT COALESCE(COUNT(*),0) AS tot_pur FROM db_purchase where purchase_status='Received'";
		$tot_pur=$this->db->query($query4)->row()->tot_pur;	

  		//Total SAles Active
  		$query5="SELECT COALESCE(COUNT(*),0) AS tot_sal FROM db_sales where `sales_status`= 'Final'";
		$tot_sal=$this->db->query($query5)->row()->tot_sal;

		//Total SAles amount
		$query6="SELECT COALESCE(sum(grand_total),0) AS tot_sal_grand_total FROM db_sales where `sales_status`= 'Final'";
		$tot_sal_grand_total=$this->db->query($query6)->row()->tot_sal_grand_total;

		//Total expense amount
  		$query7="SELECT COALESCE(sum(expense_amt),0) AS tot_exp FROM db_expense ";
		$tot_exp=$this->db->query($query7)->row()->tot_exp;

		//Total SAles Due
		$query8="SELECT (COALESCE(sum(grand_total),0)-COALESCE(sum(paid_amount),0)) as sales_due FROM db_sales where `sales_status`= 'Final'";
		$sales_due=$this->db->query($query8)->row()->sales_due;

		//Total Purchase  Due
		$query9="SELECT (COALESCE(sum(grand_total),0)-COALESCE(sum(paid_amount),0)) as purchase_due FROM db_purchase where purchase_status='Received'";
		$purchase_due=$this->db->query($query9)->row()->purchase_due;

		//Total SAles  Due
		$query10="SELECT COALESCE(sum(payment),0) as today_payment_received FROM db_salespayments where payment_date='".date("Y-m-d")."'";
		$today_payment_received=$this->db->query($query10)->row()->today_payment_received;

		/*todays_total_purchase*/
		$query11="SELECT COALESCE(sum(grand_total),0) as todays_total_purchase FROM db_purchase where purchase_date='".date("Y-m-d")."'";
		$todays_total_purchase=$this->db->query($query11)->row()->todays_total_purchase;

		/*todays_total_sales*/
		$query12="SELECT COALESCE(sum(grand_total),0) AS todays_total_sales FROM db_sales where `sales_status`= 'Final' and sales_date='".date("Y-m-d")."'";
		$todays_total_sales=$this->db->query($query12)->row()->todays_total_sales;

		//Total expense amount
  		$query13="SELECT COALESCE(sum(expense_amt),0) AS todays_total_expense FROM db_expense where expense_date='".date("Y-m-d")."'";
		$todays_total_expense=$this->db->query($query13)->row()->todays_total_expense;


		$data['tot_sup']=$tot_sup;
		$data['tot_pro']=$tot_pro;
		$data['tot_cust']=$tot_cust;
		$data['tot_pur']=$tot_pur;
		$data['tot_sal']=$tot_sal;
		$data['tot_sal_grand_total']=$tot_sal_grand_total;
		$data['tot_exp']=$tot_exp;
		$data['sales_due']=$sales_due;
		$data['purchase_due']=$purchase_due;
		$data['today_payment_received']=$today_payment_received;
		$data['todays_total_purchase']=$todays_total_purchase;
		$data['todays_total_sales']=$todays_total_sales;
		$data['todays_total_expense']=$todays_total_expense;

		return $data;
	}
}