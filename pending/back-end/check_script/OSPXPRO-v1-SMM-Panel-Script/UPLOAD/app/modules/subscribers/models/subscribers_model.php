<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class subscribers_model extends MY_Model {
	public $tb_users;
	public $tb_subscribers;

	public function __construct(){
		$this->tb_categories 			= CATEGORIES;
		$this->tb_services   			= SERVICES;
		$this->tb_users      			= USERS;
		$this->tb_subscribers           = SUBSCRIBERS;
		parent::__construct();
	}

	function get_users_list($total_rows = false, $status = "", $limit = "", $start = ""){
		$data  = array();
		if ($limit != "" && $start >= 0) {
			$this->db->limit($limit, $start);
		}
		$this->db->select("*");
		$this->db->from($this->tb_subscribers);
		$this->db->order_by("id", 'DESC');
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

	function get_users_by_search($k){
		$k = trim(htmlspecialchars($k));
		$this->db->select('*');
		$this->db->from($this->tb_subscribers);
		if ($k != "" && strlen($k) >= 2) {
			$this->db->where("(`first_name` LIKE '%".$k."%' ESCAPE '!' OR `last_name` LIKE '%".$k."%' ESCAPE '!' OR `email` LIKE '%".$k."%' ESCAPE '!' OR `country` LIKE '%".$k."%' ESCAPE '!' OR `ip` LIKE '%".$k."%' ESCAPE '!')");
		}
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
}
