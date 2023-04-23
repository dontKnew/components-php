<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_logs_model extends MY_Model {
	public $tb_users;
	public $tb_user_logs;
	public $tb_categories;
	public $tb_services;
	public $tb_transaction_logs;

	public function __construct(){
		$this->tb_users 		     = USERS;
		$this->tb_user_logs          = USER_LOGS;
		$this->tb_categories 		 = CATEGORIES;
		$this->tb_services   		 = SERVICES;
		$this->tb_transaction_logs   = TRANSACTION_LOGS;
		parent::__construct();
	}

	function get_user_logs_list($total_rows = false, $status = "", $limit = "", $start = ""){
		$data  = array();
		if ($limit != "" && $start >= 0) {
			$this->db->limit($limit, $start);
		}
		$this->db->select('ul.*, u.email as user_email, u.first_name, u.last_name, u.role as account_type, u.ids as user_ids');
		$this->db->from($this->tb_user_logs." ul");
		$this->db->join($this->tb_users." u", "u.id = ul.uid", 'left');
		
		$this->db->order_by("ul.id", 'DESC');
		$query = $this->db->get();
		if ($total_rows) {
			$result = $query->num_rows();
			return $result;
		}else{
			$result = $query->result();
			return $result;
		}
		return false;
	}

	function get_user_logs_by_search($k){
		$k = trim(htmlspecialchars($k));
		$this->db->select('ul.*, u.email as user_email, u.first_name, u.last_name, u.role as account_type, u.ids as user_ids');
		$this->db->from($this->tb_user_logs." ul");
		$this->db->join($this->tb_users." u", "u.id = ul.uid", 'left');

		if ($k != "" && strlen($k) >= 2) {
			$this->db->where("(`ul`.`ip` LIKE '%".$k."%' ESCAPE '!' OR `u`.`email` LIKE '%".$k."%' ESCAPE '!' OR `u`.`first_name` LIKE '%".$k."%' ESCAPE '!' OR `u`.`last_name` LIKE '%".$k."%' ESCAPE '!')");
		}
		$this->db->order_by('id', 'DESC');

		$query = $this->db->get();
		$result = $query->result();
		return $result;

		return $result;
	}
}
