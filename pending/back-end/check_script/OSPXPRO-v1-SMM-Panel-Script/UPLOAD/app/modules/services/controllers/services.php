<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class services extends MX_Controller {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_api_providers;
	public $columns;
	public $module_name;
	public $module_icon;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		//Config Module
		$this->tb_categories = CATEGORIES;
		$this->tb_services   = SERVICES;
		$this->tb_api_providers   = API_PROVIDERS;
		$this->module_name   = 'Services';
		$this->module_icon   = "fa ft-users";

		$this->columns = array(
			"price"            => lang("rate_per_1000")."(".get_option("currency_symbol","").")",
			"min_max"          => lang("min__max_order"),
			"desc"             => lang("Description"),
		);

        if (get_role("admin") || get_role("supporter")) {
			$this->columns = array(
				"provider"         => 'Provider',
				"price"            => lang("rate_per_1000")."(".get_option("currency_symbol","").")",
				"min_max"          => lang("min__max_order"),
				"desc"             => lang("Description"),
				"dripfeed"         => lang("dripfeed"),
				"status"           => lang("Status"),
			);
		}				
	}

	public function index(){

		if (!session('uid') && get_option("enable_service_list_no_login") != 1) {
			redirect(cn());
		}

		$all_services = $this->model->get_services_list();
		$data = array(
			"module"       => get_class($this),
			"columns"      => $this->columns,
			"all_services" => $all_services,
			"categories"   => $all_services,
		);
		
		if (!session('uid')) {
			$this->template->set_layout('general_page');
			$this->template->build("index", $data);
		}
		$this->template->build("index", $data);
	}

	public function update($ids = ""){
		$service     = $this->model->get("*", $this->tb_services, "ids = '{$ids}' ");
		$categories  = $this->model->fetch("*", $this->tb_categories, "status = 1", 'sort','ASC');
		$api_providers  = $this->model->fetch("*", $this->tb_api_providers, "status = 1", 'id','ASC');
		$data = array(
			"module"   			=> get_class($this),
			"service" 			=> $service,
			"categories" 		=> $categories,
			"api_providers" 	=> $api_providers,
		);
		$this->load->view('update', $data);
	}

	public function desc($ids = ""){
		$service    = $this->model->get("id, ids, name, desc", $this->tb_services, "ids = '{$ids}' ");
		$data = array(
			"module"   		=> get_class($this),
			"service" 		=> $service,
		);
		$this->load->view('descriptions', $data);
	}

	public function ajax_update($ids = ""){
		$name 		        = post("name");
		$category	        = post("category");
		$min	            = post("min");
		$max	            = post("max");
		$service_type	    = post("service_type");
		$add_type			= post("add_type");
		$price	            = (float)post("price");
		$status 	        = (int)post("status");
		$dripfeed 	        = (int)post("dripfeed");
		$desc 	            = $this->input->post("desc");
		if($name == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("name_is_required")
			));
		}

		if($category == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("category_is_required")
			));
		}

		if($min == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("min_order_is_required")
			));
		}

		if($max == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("max_order_is_required")
			));
		}

		if($min > $max){
			ms(array(
				"status"  => "error",
				"message" => lang("max_order_must_to_be_greater_than_min_order")
			));
		}

		if($price == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("price_invalid")
			));
		}

		$decimal_places = get_option("auto_rounding_x_decimal_places", 2);
		if(strlen(substr(strrchr($price, "."), 1)) > $decimal_places || strlen(substr(strrchr($price, "."), 1)) < 0){
			ms(array(
				"status"  => "error",
				"message" => lang("price_invalid_format")
			));
		}

		$service_type_array = array('default', 'subscriptions', 'custom_comments', 'custom_comments_package', 'mentions_with_hashtags', 'mentions_custom_list', 'mentions_hashtag', 'mentions_user_followers', 'mentions_media_likers', 'package', 'comment_likes');

		if (!in_array($service_type, $service_type_array)) {
			ms(array(
				"status"  => "error",
				"message" => 'Service Type invalid format'
			));
		}

		$data = array(
			"uid"             => session('uid'),
			"cate_id"         => $category,
			"name"            => $name,
			"desc"            => $desc,
			"min"             => $min,
			"type"            => $service_type,
			"max"             => $max,
			"price"           => $price,
			"dripfeed"        => $dripfeed,
			"status"          => $status,
		);

		/*----------  Fields for Service API type  ----------*/
		switch ($add_type) {
			case 'api':
				$api_provider_id	 = post("api_provider_id");
				$api_service_id	     = post("api_service_id");
				$api = $this->model->get("ids", $this->tb_api_providers, ['id' => $api_provider_id, 'status' => 1]);
				if (empty($api)) {
					ms(array(
						"status"  => "error",
						"message" => lang("api_provider_does_not_exists")
					));
				}

				if ($api_service_id == "") {
					ms(array(
						"status"  => "error",
						"message" => 'API Service ID invalid format'
					));
				}
				$data['api_provider_id'] = $api_provider_id;
				$data['api_service_id']  = $api_service_id;
				break;
			
			default:
				$data['api_provider_id'] = "";
				$data['api_service_id']  = "";
				break;
		}
		
		$data['add_type']        = $add_type;

		$check_item = $this->model->get("ids", $this->tb_services, "ids = '{$ids}'");
		
		if(empty($check_item)){

			$data["ids"]     = ids();
			$data["changed"] = NOW;
			$data["created"] = NOW;

			$this->db->insert($this->tb_services, $data);
		}else{
			$data["changed"] = NOW;
			$this->db->update($this->tb_services, $data, array("ids" => $check_item->ids));
		}
		
		ms(array(
			"status"  => "success",
			"message" => lang("Update_successfully")
		));
	}
	
	public function ajax_search(){
		$k = post("k");
		$services = $this->model->get_services_by_search($k);
		$data = array(
			"module"     => get_class($this),
			"columns"    => $this->columns,
			"services"   => $services,
		);
		$this->load->view("ajax_search", $data);
	}
	
	public function ajax_service_sort_by_cate($id){
		$data = array(
			"module"     => get_class($this),
			"columns"    => $this->columns,
			"cate_name"  => get_field($this->tb_categories, ['id' => $id], 'name'),
			"services"   => $this->model->get_services_by_cate_id($id),
		);
		$this->load->view("ajax_search", $data);
	}

	public function ajax_load_services_by_cate($id){

		$data = array(
			"module"     => get_class($this),
			"columns"    => $this->columns,
			"services"   => $this->model->get_services_by_cate_id($id),
			"cate_id"    => $id,
		);
		$this->load->view("ajax_load_services_by_cate", $data);
	}

	public function ajax_delete_item($ids = ""){
		$this->model->delete($this->tb_services, $ids, false);
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

		if (in_array($type, ['delete', 'deactive', 'active']) && empty($idss)) {
			ms(array(
				"status"  => "error",
				"message" => lang("please_choose_at_least_one_item")
			));
		}
		switch ($type) {
			case 'delete':
				foreach ($idss as $key => $ids) {
					$this->db->delete($this->tb_services, ['ids' => $ids]);
				}
				ms(array(
					"status"  => "success",
					"message" => lang("Deleted_successfully")
				));
				break;
			case 'deactive':
				foreach ($idss as $key => $ids) {
					$this->db->update($this->tb_services, ['status' => 0], ['ids' => $ids]);
				}
				ms(array(
					"status"  => "success",
					"message" => lang("Updated_successfully")
				));
				break;

			case 'active':
				foreach ($idss as $key => $ids) {
					$this->db->update($this->tb_services, ['status' => 1], ['ids' => $ids]);
				}
				ms(array(
					"status"  => "success",
					"message" => lang("Updated_successfully")
				));
				break;


			case 'all_deactive':
				$deactive_services = $this->model->fetch("*", $this->tb_services, ['status' => 0]);
				if (empty($deactive_services)) {
					ms(array(
						"status"  => "error",
						"message" => lang("failed_to_delete_there_are_no_deactivate_service_now")
					));
				}
				$this->db->delete($this->tb_services, ['status' => 0]);
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