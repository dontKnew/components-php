<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class services_model extends MY_Model {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_api_providers;

	public function __construct(){
		$this->tb_categories     = CATEGORIES;
		$this->tb_services       = SERVICES;
		$this->tb_api_providers  = API_PROVIDERS;
		parent::__construct();
	}

	function get_services_list(){
		$data  = array();
		// get categories
		if (get_role("user")) {
			$this->db->where("status", "1");
		}

		$this->db->select("id, ids, name");
		$this->db->from($this->tb_categories);
		$this->db->order_by("sort", 'ASC');

		$query = $this->db->get();
		$categories = $query->result();
		if(!empty($categories)){
			$i = 0;
			foreach ($categories as $key => $row) {
				$i++;
				// get services
				if ($i > 0) {
					if (get_role("supporter") || get_role("admin")) {

						$this->db->select('s.*, api.name as api_name');
						$this->db->from($this->tb_services." s");
						$this->db->join($this->tb_api_providers." api", "s.api_provider_id = api.id", 'left');
						$this->db->where('s.cate_id', $row->id);
						$this->db->order_by("s.price", 'ASC');
						
						$query = $this->db->get();
						$services = $query->result();

					}else{
						$this->db->select('s.*, api.name as api_name');
						$this->db->from($this->tb_services." s");
						$this->db->join($this->tb_api_providers." api", "s.api_provider_id = api.id", 'left');
						$this->db->where('s.cate_id', $row->id);
						$this->db->where('s.status', 1);
						$this->db->order_by("s.price", 'ASC');

						$query = $this->db->get();
						$services = $query->result();
					}
					if(!empty($services)){
						$categories[$key]->is_exists_services = 1;
						$categories[$key]->services = $services;
					}else{
						unset($categories[$key]);	
					}
				}else{
					break;
				}
			}
		}
		return $categories;
	}

	function get_services_by_search($k){
		$k = trim(htmlspecialchars($k));

		if (get_role("supporter") || get_role("admin")) {
			$this->db->select('s.*, api.name as api_name');
			$this->db->from($this->tb_services." s");
			$this->db->join($this->tb_api_providers." api", "s.api_provider_id = api.id", 'left');

			if ($k != "" && strlen($k) >= 2) {
				$this->db->where("(`s`.`id` LIKE '%".$k."%' ESCAPE '!' OR `s`.`api_service_id` LIKE '%".$k."%' ESCAPE '!' OR  `s`.`name` LIKE '%".$k."%' ESCAPE '!' OR  `api`.`name` LIKE '%".$k."%' ESCAPE '!')");
			}
			
			$this->db->order_by("s.price", 'ASC');
			$query = $this->db->get();
			$result = $query->result();

		}else{
			$this->db->select('s.*, api.name as api_name');
			$this->db->from($this->tb_services." s");
			$this->db->join($this->tb_api_providers." api", "s.api_provider_id = api.id", 'left');

			if ($k != "" && strlen($k) >= 2) {
				$this->db->where("(`s`.`id` LIKE '%".$k."%' ESCAPE '!' OR `s`.`api_service_id` LIKE '%".$k."%' ESCAPE '!' OR  `s`.`name` LIKE '%".$k."%' ESCAPE '!')");
			}

			$this->db->where("s.status", 1);
			$this->db->order_by("s.price", 'ASC');
			$query = $this->db->get();
			$result = $query->result();
		}
		return $result;
	}

	function get_services_by_cate_id($id){
		if (get_role("supporter") || get_role("admin")) {
			$this->db->select('s.*, api.name as api_name');
			$this->db->from($this->tb_services." s");
			$this->db->join($this->tb_api_providers." api", "s.api_provider_id = api.id", 'left');
			
			$this->db->where("s.cate_id", $id);
			$this->db->order_by("s.price", 'ASC');
			$query = $this->db->get();
			$result = $query->result();
		}else{
			$this->db->select('s.*, api.name as api_name');
			$this->db->from($this->tb_services." s");
			$this->db->join($this->tb_api_providers." api", "s.api_provider_id = api.id", 'left');

			$this->db->where("s.cate_id", $id);
			$this->db->where("s.status", 1);
			$this->db->order_by("s.price", 'ASC');
			$query = $this->db->get();
			$result = $query->result();
		}
		return $result;
	}

}
