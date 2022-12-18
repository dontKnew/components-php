<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class user_logs extends MX_Controller {
	public $tb_users;
	public $tb_user_logs;
	public $tb_categories;
	public $tb_services;
	public $tb_transaction_logs;
	public $columns;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		//Config Module
		$this->tb_categories         = CATEGORIES;
		$this->tb_services           = SERVICES;
		$this->tb_user_logs          = USER_LOGS;
		$this->tb_transaction_logs   = TRANSACTION_LOGS;
		$this->columns = array(
			"uid"              => lang('Name'),
			"email"            => lang('Email'),
			"type"             => lang('Role'),
			"action_type"      => lang('Action Type'),
			"ip_address"       => lang('IP_Address'),
			"location"         => lang('Location'),
			"time"             => lang("Date_Time"),
		);
	}

	public function index(){
		$page        = (int)get("p");
		$page        = ($page > 0) ? ($page - 1) : 0;
		$limit_per_page = get_option("default_limit_per_page", 10);
		$query = array();
		$query_string = "";
		if(!empty($query)){
			$query_string = "?".http_build_query($query);
		}
		$config = array(
			'base_url'           => cn(get_class($this).$query_string),
			'total_rows'         => $this->model->get_user_logs_list(true),
			'per_page'           => $limit_per_page,
			'use_page_numbers'   => true,
			'prev_link'          => '<i class="fe fe-chevron-left"></i>',
			'first_link'         => '<i class="fe fe-chevrons-left"></i>',
			'next_link'          => '<i class="fe fe-chevron-right"></i>',
			'last_link'          => '<i class="fe fe-chevrons-right"></i>',
		);
		$this->pagination->initialize($config);
		$links = $this->pagination->create_links();

		$user_logs = $this->model->get_user_logs_list(false, "all", $limit_per_page, $page * $limit_per_page);
		$data = array(
			"module"         => get_class($this),
			"columns"        => $this->columns,
			"user_logs"      => $user_logs,
			"links"          => $links,
		);

		$this->template->build('index', $data);
	}

	
	public function ajax_search(){
		$k = post("k");
		$user_logs = $this->model->get_user_logs_by_search($k);
		$data = array(
			"module"      => get_class($this),
			"columns"     => $this->columns,
			"user_logs"   => $user_logs,
		);
		$this->load->view("ajax_search", $data);
	}

	public function ajax_delete_item($ids = ""){
		$this->model->delete($this->tb_user_logs, $ids, true);
	}

	public function ajax_actions_option(){
		$type = post("type");
		$idss = post("ids");
		if ($type == '') {
			ms(array(
				"status"  => "error",
				"message" => lang('There_was_an_error_processing_your_request_Please_try_again_later')
			));
		}

		if (in_array($type, ['delete']) && empty($idss)) {
			ms(array(
				"status"  => "error",
				"message" => lang("please_choose_at_least_one_item")
			));
		}
		switch ($type) {
			case 'delete':
				foreach ($idss as $key => $ids) {
					$this->db->delete($this->tb_user_logs, ['ids' => $ids]);
				}
				ms(array(
					"status"  => "success",
					"message" => lang("Deleted_successfully")
				));
				break;

			case 'clear_all':
				$this->db->empty_table($this->tb_user_logs);
				ms(array(
					"status"  => "success",
					"message" => lang("Deleted_successfully")
				));

				break;
			
			default:
				ms(array(
					"status"  => "error",
					"message" => lang('There_was_an_error_processing_your_request_Please_try_again_later')
				));
				break;
		}

	}
}