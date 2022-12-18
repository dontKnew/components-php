<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_block_ip_model extends MY_Model {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_user_block_ip;

	public function __construct(){
		$this->tb_users 		    = USERS;
		$this->tb_categories 		= CATEGORIES;
		$this->tb_user_block_ip   	= USER_BLOCK_IP;
		parent::__construct();
	}



	function get_block_ip_lists($total_rows = false, $status = "", $limit = "", $start = ""){
		if ($limit != "" && $start >= 0) {
			$this->db->limit($limit, $start);
		}
		$this->db->select('ip.*, u.email as user_email, u.first_name, u.last_name, u.role as account_type, u.ids as user_ids');
		$this->db->from($this->tb_user_block_ip." ip");
		$this->db->join($this->tb_users." u", "u.id = ip.uid", 'left');
		$this->db->order_by('id', 'DESC');
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

	function get_block_ip_lists_by_search($k = ""){
		$k = trim(htmlspecialchars($k));
		$this->db->select('ip.*, u.email as user_email, u.first_name, u.last_name, u.role as account_type, u.ids as user_ids');
		$this->db->from($this->tb_user_block_ip." ip");
		$this->db->join($this->tb_users." u", "u.id = ip.uid", 'left');

		if ($k != "" && strlen($k) >= 2) {
			$this->db->where("(`ip`.`ip` LIKE '%".$k."%' ESCAPE '!' OR `ip`.`description` LIKE '%".$k."%' ESCAPE '!' OR `u`.`first_name` LIKE '%".$k."%' ESCAPE '!' OR `u`.`role` LIKE '%".$k."%' ESCAPE '!')");
		}
		$this->db->order_by('id', 'DESC');

		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
}
