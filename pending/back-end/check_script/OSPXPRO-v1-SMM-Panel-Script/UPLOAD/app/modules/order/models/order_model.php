<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class order_model extends MY_Model {
	public $tb_users;
	public $tb_order;
	public $tb_categories;
	public $tb_services;
	public $tb_api_providers;

	public function __construct(){
		$this->tb_categories        = CATEGORIES;
		$this->tb_order             = ORDER;
		$this->tb_users             = USERS;
		$this->tb_services          = SERVICES;
		$this->tb_api_providers   	= API_PROVIDERS;
		parent::__construct();
	}

	function get_categories_list(){
		$data  = array();
		$this->db->select("*");
		$this->db->from($this->tb_categories);
		$this->db->where("status", "1");
		$this->db->order_by("sort", 'ASC');
		$query = $this->db->get();

		$categories = $query->result();
		if(!empty($categories)){
			return $categories;
		}
		return false;
	}

	function get_services_list_by_cate($id = ""){
		$data  = array();
		if (!get_role("admin")) {
			$this->db->where("status", "1");
		}
		$this->db->select("*");
		$this->db->from($this->tb_services);
		$this->db->where("cate_id", $id);
		$this->db->order_by("price", "ASC");
		$query = $this->db->get();
		$services = $query->result();
		if(!empty($services)){
			return $services;
		}
		return false;
	}

	function get_service_item($id = ""){
		$data  = array();

		$this->db->select("*");
		$this->db->from($this->tb_services);
		$this->db->where("id", $id);
		$this->db->where("status", "1");
		$query = $this->db->get();

		$service = $query->row();
		if(!empty($service)){
			return $service;
		}
		return false;
	}

	function get_services_by_cate($id = ""){
		$data  = array();
		$this->db->select("*");
		$this->db->from($this->tb_services);
		$this->db->where("cate_id", $id);
		$this->db->where("status", "1");
		$this->db->order_by('price', 'ASC');
		$query = $this->db->get();
		$services = $query->result();
		if(!empty($services)){
			return $services;
		}

		return false;
	}

	function get_order_logs_list($total_rows = false, $status = "", $limit = "", $start = ""){
		$data  = array();
		if (get_role("user")) {
			$this->db->where("o.uid", session("uid"));
		}
		if ($limit != "" && $start >= 0) {
			$this->db->limit($limit, $start);
		}
		$this->db->select('o.*, u.email as user_email, s.name as service_name, api.name as api_name');
		$this->db->from($this->tb_order." o");
		$this->db->join($this->tb_users." u", "u.id = o.uid", 'left');
		$this->db->join($this->tb_services." s", "s.id = o.service_id", 'left');
		$this->db->join($this->tb_api_providers." api", "api.id = o.api_provider_id", 'left');
		if($status != "all" && !empty($status)){
			$this->db->where("o.status", $status);
		}
		$this->db->where("o.service_type !=", "subscriptions");
		$this->db->where("o.is_drip_feed !=", 1);
		$this->db->order_by("o.id", 'DESC');

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

	function get_orders_logs_by_search($k){
		$k = trim(htmlspecialchars($k));
		if (get_role("user")) {
			$this->db->select('o.*, u.email as user_email, s.name as service_name');
			$this->db->from($this->tb_order." o");
			$this->db->join($this->tb_users." u", "u.id = o.uid", 'left');
			$this->db->join($this->tb_services." s", "s.id = o.service_id", 'left');

			if ($k != "" && strlen($k) >= 2) {
				$this->db->where("(`o`.`id` LIKE '%".$k."%' ESCAPE '!' OR `o`.`link` LIKE '%".$k."%' ESCAPE '!' OR `o`.`status` LIKE '%".$k."%' ESCAPE '!' OR  `s`.`name` LIKE '%".$k."%' ESCAPE '!')");
			}
			$this->db->where("o.service_type !=", "subscriptions");
			$this->db->where("o.is_drip_feed !=", 1);
			$this->db->where("u.id", session("uid"));
			$this->db->order_by("o.id", 'DESC');
			$query = $this->db->get();
			$result = $query->result();

		}else{
			$this->db->select('o.*, u.email as user_email, s.name as service_name, api.name as api_name');
			$this->db->from($this->tb_order." o");
			$this->db->join($this->tb_users." u", "u.id = o.uid", 'left');
			$this->db->join($this->tb_services." s", "s.id = o.service_id", 'left');
			$this->db->join($this->tb_api_providers." api", "api.id = o.api_provider_id", 'left');

			if ($k != "" && strlen($k) >= 2) {
				$this->db->where("(`o`.`api_order_id` LIKE '%".$k."%' ESCAPE '!' OR `o`.`id` LIKE '%".$k."%' ESCAPE '!' OR `o`.`status` LIKE '%".$k."%' ESCAPE '!' OR `o`.`link` LIKE '%".$k."%' ESCAPE '!' OR  `u`.`email` LIKE '%".$k."%' ESCAPE '!' OR  `s`.`name` LIKE '%".$k."%' ESCAPE '!')");
			}
			$this->db->where("o.service_type !=", "subscriptions");
			$this->db->where("o.is_drip_feed !=", 1);
			$this->db->order_by("o.id", 'DESC');

			$query = $this->db->get();
			$result = $query->result();
		}
		return $result;
	}

	function get_log_details($id){
		$this->db->select('o.*, u.email as user_email, s.name as service_name, api.name as api_name');
		$this->db->from($this->tb_order." o");
		$this->db->join($this->tb_users." u", "u.id = o.uid", 'left');
		$this->db->join($this->tb_services." s", "s.id = o.service_id", 'left');
		$this->db->join($this->tb_api_providers." api", "api.id = o.api_provider_id", 'left');
		$this->db->where("o.main_order_id", $id);
		$this->db->order_by("o.id", 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function get_top_bestsellers($limit = ""){
		if ($limit == "") {
			$limit = 10;
		}
		$query = "SELECT count(service_id) as total_orders, service_id FROM {$this->tb_order} GROUP BY service_id ORDER BY total_orders DESC LIMIT 30";
		$top_sellers =  $this->db->query($query)->result();
		$result = [];
		$i = 1;
		foreach ($top_sellers as $key => $row) {
			$this->db->select('s.*, api.name as api_name');
			$this->db->from($this->tb_services." s");
			$this->db->join($this->tb_api_providers." api", "s.api_provider_id = api.id", 'left');

			$this->db->where("s.id", $row->service_id);
			$this->db->order_by("s.price", 'ASC');
			$query = $this->db->get();
			if(!empty($query->row()) && $i <= $limit ){
				$item = $query->row();
				$item->total_orders = $row->total_orders;
				$result[] = $item;
				$i++;
			}
		}
		return $result;
	}

	
}

