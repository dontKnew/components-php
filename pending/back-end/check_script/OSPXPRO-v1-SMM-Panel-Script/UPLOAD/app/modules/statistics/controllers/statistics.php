<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class statistics extends MX_Controller {
	public $tb_users;
	public $tb_tickets;
	public $tb_ticket_messages;
	public $tb_categories;
	public $tb_services;
	public $tb_orders;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');

		$this->tb_users 		    = USERS;
		$this->tb_categories 		= CATEGORIES;
		$this->tb_services   		= SERVICES;
		$this->tb_orders     		= ORDER;
		$this->tb_tickets     		= TICKETS;
		$this->tb_ticket_messages   = TICKET_MESSAGES;
		
	}

	public function index(){
		$data = array(
			"module"         => get_class($this),
			"data_log"       => $this->model->get_data_logs(),
		);
		$this->load->model('order/order_model');
		// Get Top 5 BestSellers
		$top_bestsellers = $this->order_model->get_top_bestsellers(10);
		$data['top_bestsellers']     = $top_bestsellers;
		if (get_role('admin')) {
			// get last 5 orders
			$last_5_orders = $this->order_model->get_order_logs_list(false, 'all', '5', 0);
			// get last 5 payments
			$this->load->model('transactions/transactions_model');
			$last_5_transactions = $this->transactions_model->get_transaction_list(false, 'all', '5', 0);
			// get last 5 newest user
			$this->load->model('users/users_model');
			$last_5_users = $this->users_model->get_users_list(false, 'all', '5', 0);
			
			$data['last_5_orders']       = $last_5_orders;
			$data['last_5_transactions'] = $last_5_transactions;
			$data['last_5_users']        = $last_5_users;
		}
		$this->template->build("index", $data);
	}

}

