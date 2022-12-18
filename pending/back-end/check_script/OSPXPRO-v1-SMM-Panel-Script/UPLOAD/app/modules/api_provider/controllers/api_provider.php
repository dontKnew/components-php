<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class api_provider extends MX_Controller {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_api_providers;
	public $tb_orders;
	public $columns;
	public $module_name;
	public $module_icon;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		//Config Module
		$this->tb_users       		= USERS;
		$this->tb_categories 		= CATEGORIES;
		$this->tb_services   		= SERVICES;
		$this->tb_api_providers   	= API_PROVIDERS;
		$this->tb_orders     		= ORDER;
		$this->columns = array(
			"name"             => lang("Name"),
			"balance"          => lang("Balance"),
			"desc"             => lang("Description"),
			"status"           => lang("Status"),
		);
	}

	public function index(){
		if (!get_role('admin') || !session('uid')) {
			redirect(cn('statistics'));
		}
		$api_lists = $this->model->get_api_lists();
		$data = array(
			"module"       => get_class($this),
			"columns"      => $this->columns,
			"api_lists"    => $api_lists,
		);
		$this->template->build('index', $data);
	}

	public function update($ids = ""){
		$api    = $this->model->get("*", $this->tb_api_providers, "ids = '{$ids}' ");
		$data = array(
			"module"   		=> get_class($this),
			"api" 			=> $api,
		);
		$this->load->view('update', $data);
	}

	public function ajax_update($ids = ""){
		$name 			= post("name");
		$api_url  		= trim(post("api_url"));
		$api_key 		= trim(post("api_key"));
		$status 		= (int)post("status");
		$description 	   = $this->input->post("description");
		$description       = trim($description);
		$description       = stripslashes($description);
		$description       = htmlspecialchars($description, ENT_QUOTES);

		if($name == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("name_is_required")
			));
		}

		if($api_url == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("api_url_is_required")
			));
		}

		if($api_key == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("api_key_is_required")
			));
		}

		//
		$data = array(
			"uid"             => session('uid'),
			"name"            => $name,
			"key"         	  => $api_key,
			"url"         	  => $api_url,
			"description"     => $description,
			"status"          => $status,
		);

		/*----------  Check API status   ----------*/
		if (!empty($api_key) && !empty($api_url)) {
			$data_post = array(
				'key' => $api_key,
	            'action' => 'balance',
			);

			$data_connect = $this->connect_api($api_url, $data_post);
			$data_connect = json_decode($data_connect);
			if (empty($data_connect) || !isset($data_connect->balance)) {
				ms(array(
					"status"  => "error",
					"message" => lang("there_seems_to_be_an_issue_connecting_to_api_provider_please_check_api_key_and_token_again")
				));
			}else{
				$data["balance"]  = $data_connect->balance;
			}
		}

		$check_item = $this->model->get("ids, id", $this->tb_api_providers, "ids = '{$ids}'");
		if(empty($check_item)){
			$data["ids"]     = ids();
			$data["changed"] = NOW;
			$data["created"] = NOW;
			$this->db->insert($this->tb_api_providers, $data);
		}else{
			$data["changed"] = NOW;
			$this->db->update($this->tb_api_providers, $data, array("ids" => $check_item->ids));
			$this->db->update($this->tb_services, ["status" => $status], array("api_provider_id" => $check_item->id));
		}
		
		ms(array(
			"status"  => "success",
			"message" => lang("Update_successfully")
		));
	}

	public function ajax_update_api_provider($ids){
		if ($ids != "" ) {
			$api = $this->model->get("*", $this->tb_api_providers, ["ids" => $ids]);
			if (!empty($api)) {
				$data_post = array(
					'key' => $api->key,
		            'action' => 'balance',
				);

				$data_connect = $this->connect_api($api->url, $data_post);
				$data_connect = json_decode($data_connect);

				if (empty($data_connect) || !isset($data_connect->balance)) {
					ms(array(
						"status"  => "error",
						"message" => lang("there_seems_to_be_an_issue_connecting_to_api_provider_please_check_api_key_and_token_again")
					));
				}else{
					$data = array(
						"balance" 	        => $data_connect->balance,
						"currency_code" 	=> $data_connect->currency,
					);

					$this->db->update($this->tb_api_providers, $data, ["ids" => $api->ids]);

					ms(array(
						"status"  => "success",
						"message" => lang("Update_successfully")
					));
				}

			}else{
				ms(array(
					"status"  => "error",
					"message" => lang("api_provider_does_not_exists")
				));
			}
		}
	}

	public function ajax_delete_item($ids = ""){
		$this->model->delete($this->tb_api_providers, $ids, true);
	}

	public function services(){
		$api_lists = $this->model->get_api_lists(true);
		$data = array(
			"module"       => get_class($this),
			"api_lists"    => $api_lists,
			
		);

		$this->template->build('api/get_services', $data);
	}

	/**
	 *
	 * Sync services
	 *
	 */
	public function sync_services($ids = ""){
		if (!empty($ids)) {
			$api = $this->model->get("id, name, ids, url, key",  $this->tb_api_providers, "ids = '{$ids}'");
			if (!empty($api)) {
				$data = array(
					"module"       => get_class($this),
					"api"          => $api,
				);
				
				$this->load->view('api/sync_update', $data);
			}
		}
	}

	public function ajax_sync_services($ids){
		$price_percentage_increase = (int)post("price_percentage_increase");
		$request = (int)post("request");
		$decimal_places = get_option("auto_rounding_x_decimal_places", 2);

		// Check convert Currency or not
		$is_convert_to_new_currency = post("is_convert_to_new_currency");
		$enable_sync_options        = post("enable_sync_options");

		if ($is_convert_to_new_currency) {
			$new_currency_rate = get_option('new_currecry_rate', 1);
		}else{
			$new_currency_rate = 1;
		}

		if ($price_percentage_increase === "") {
			ms(array(
				"status"  => "error",
				"message" => lang("price_percentage_increase_in_invalid_format")
			));
		}

		if ($ids != "") {
			$api = $this->model->get("id, name, ids, url, key",  $this->tb_api_providers, "ids = '{$ids}' AND status = 1");
			if (!empty($api)) {
				$data_post = array(
					'key' => $api->key,
		            'action' => 'services',
				);
				$data_services = $this->connect_api($api->url, $data_post);
				$api_services  = json_decode($data_services);
				if (empty($api_services) || !is_array($api_services)) {
					ms(array(
						"status"  => "error",
						"message" => lang("there_seems_to_be_an_issue_connecting_to_api_provider_please_check_api_key_and_token_again")
					));
				}

				$services = $this->model->fetch("`id`, `ids`, `uid`, `cate_id`, `name`, `desc`, `price`, original_price, `min`, `max`, `add_type`, `type`, `api_service_id` as service, `api_provider_id`, `dripfeed`, `status`, `changed`, `created`", $this->tb_services, ["api_provider_id" => $api->id, 'status' => 1]);

				if (empty($services) && !$request) {
					ms(array(
						"status"  => "error",
						"message" => lang("service_lists_are_empty_unable_to_sync_services")
					));
				}

				$data_item = (object)array(
					'api' 			             => $api,
					'api_services'               => $api_services,
					'services'                   => $services,
					'price_percentage_increase'  => $price_percentage_increase,
					'request'                    => $request,
					'decimal_places'             => $decimal_places,
					'new_currency_rate'          => $new_currency_rate,
					'enable_sync_options'        => $enable_sync_options,

				);

				$response = $this->sync_services_by_api($data_item);

				$data = array(
					"api_id"           	=> $api->id,
					"api_name"         	=> $api->name,
					"services_new"     	=> ($request)? $response->new_services : "",
					"services_disabled" => $response->disabled_services,
				);
				$this->load->view("api/results_sync", $data);

			}else{
				ms(array(
					"status"  => "error",
					"message" => lang("there_seems_to_be_an_issue_connecting_to_api_provider_please_check_api_key_and_token_again")
				));
			}

		}else{
			ms(array(
				"status"  => "error",
				"message" => lang("api_provider_does_not_exists")
			));
		}
	}

	/**
	 *
	 * Auto sync Service setting
	 *
	 */
	public function auto_sync_services_setting(){
		$data = array(
			"module"       => get_class($this),
		);

		$this->load->view('api/auto_sync_update', $data);
	}

	public function ajax_auto_sync_services_setting(){
		$price_percentage_increase 	= (int)post("price_percentage_increase");
		$sync_request 				= (int)post("request");

		if (post('is_enable_sync_price')) {
			$is_enable_sync_price = 1;
		}else{
			$is_enable_sync_price = 0;
		}

		if (post('is_convert_to_new_currency')) {
			$is_convert_to_new_currency = 1;
			$new_currency_rate = get_option('new_currecry_rate', 1);
		}else{
			$is_convert_to_new_currency = 0;
			$new_currency_rate = 1;
		}

		/*----------  update configure  ----------*/
		$data = array(
			'price_percentage_increase' 	=> $price_percentage_increase,
			'sync_request' 					=> $sync_request,
			'new_currency_rate'          	=> $new_currency_rate,
			'is_enable_sync_price'       	=> $is_enable_sync_price,
			'is_convert_to_new_currency' 	=> $is_convert_to_new_currency,
		);

		update_option('defaut_auto_sync_service_setting', json_encode($data));

		ms(array(
        	"status"  => "success",
        	"message" => lang('Update_successfully')
        ));

	}

	private function sync_services_by_api($data_item){
		$api 					   = $data_item->api;
		$api_services 			   = $data_item->api_services;
		$services 				   = $data_item->services;
		$price_percentage_increase = $data_item->price_percentage_increase;
		$request                   = $data_item->request;
		$decimal_places            = $data_item->decimal_places;
		$new_currency_rate         = $data_item->new_currency_rate;
		$enable_sync_options       = $data_item->enable_sync_options;

		/*----------  Compare All services  ----------*/
		$disabled_services = array_udiff($services, $api_services,
		  	function ($obj_a, $obj_b) {
			    return $obj_a->service - $obj_b->service;
		  	}
		);

		$new_services = array_udiff($api_services, $services,
		  	function ($obj_a, $obj_b) {
			    return $obj_a->service - $obj_b->service;
		  	}
		);

		$exists_services = array_udiff($api_services, $new_services,
		  	function ($obj_a, $obj_b) {
			    return $obj_a->service - $obj_b->service;
		  	}
		);

		/*----------  Update disabled services, add new services to database  ----------*/
		if (!empty($disabled_services)) {
			foreach ($disabled_services as $key => $disabled_service) {
				$this->db->update($this->tb_services, ["status" => 0, "changed" => NOW], ["api_provider_id" => $api->id, "api_service_id" => $disabled_service->service, 'id' => $disabled_service->id]);
			}
		}

		/*----------  update exists services  ----------*/
		if (!empty($exists_services) && !empty($enable_sync_options)) {
			foreach ($exists_services as $key => $exists_service) {
				$service_type = strtolower(str_replace(" ", "_", $exists_service->type));
				$data_service = array(
					"type"        	    => $service_type,
					"changed"  	        => NOW,
				);

				/*----------  Sync New Price  ----------*/
				if (isset($enable_sync_options['new_price']) && $enable_sync_options['new_price']) {
					/*----------  Calculate new price  ----------*/
					$rate = $exists_service->rate;
					$new_rate = round($rate + (($rate*$price_percentage_increase)/100), $decimal_places);
					if ($new_rate <= 0.004) {
						$new_rate = 0.01;
					}
					$data_service['price'] = $new_rate * $new_currency_rate;
				}
				
				/*----------  sync Descriptions  ----------*/
				if (isset($enable_sync_options['description']) && $enable_sync_options['description']) {
					if (isset($exists_service->desc) && $exists_service->desc != "") {
						$data_service['desc'] = $exists_service->desc;
					}
				}

				/*----------  Sync Original Price  ----------*/
				if (isset($enable_sync_options['original_price']) && $enable_sync_options['original_price']) {
					$data_service['original_price'] = $exists_service->rate;
				}

				/*---------- Sync  Min Max dripfeed  ----------*/
				if (isset($enable_sync_options['min_max_dripfeed']) && $enable_sync_options['min_max_dripfeed']) {
					$data_service['min']      = $exists_service->min;
					$data_service['max']      = $exists_service->max;
					$data_service['dripfeed'] = (isset($exists_service->dripfeed) && $exists_service->dripfeed) ? 1 : 0;
				}
				$this->db->update($this->tb_services, $data_service, ["api_service_id" => $exists_service->service, "api_provider_id" => $api->id]);
			}
		}

		/*----------  add new services  ----------*/
		if (!empty($new_services) && $request) {
			$i = 1;
			foreach ($new_services as $key => $new_service) {
				$category_name = trim($new_service->category);
				$check_category = $this->model->get("ids, id, name", $this->tb_categories, "name = '{$category_name}'");
				$service_type = strtolower(str_replace(" ", "_", $new_service->type));

				/*----------  Auto round up ----------*/
				$rate = $new_service->rate;
				$new_rate = round($rate + (($rate*$price_percentage_increase)/100), $decimal_places);
				if ($new_rate <= 0.004) {
					$new_rate = 0.01;
				}
				$data_service = array(
					"uid"             	=> session('uid'),
					"name"            	=> $new_service->name,
					"min"             	=> $new_service->min,
					"max"             	=> $new_service->max,
					"price"           	=> $new_rate * $new_currency_rate,
					"original_price"    => $rate,
					"add_type"        	=> 'api',
					"type"        	    => $service_type,
					"api_provider_id"  	=> $api->id,
					"api_service_id"  	=> $new_service->service,
					"dripfeed"  	    => (isset($new_service->dripfeed) && $new_service->dripfeed) ? 1 : 0,
					"ids"  				=> ids(),
					"status"  			=> 1,
					"changed"  			=> NOW,
					"created"  			=> NOW,
				);	

				if (isset($new_service->desc)) {
					$data_service['desc'] 	= $new_service->desc;
				}
				
				if (!empty($check_category)) {
					$cate_id = $check_category->id;
					$data_service["cate_id"] = $cate_id;
				}else{
					/*----------  insert category  ----------*/
					$data_category = array(
						"ids"  			  => ids(),
						"uid"             => session('uid'),
						"name"            => $category_name,
						"sort"            => $i,
						"changed"         => NOW,
						"created"         => NOW,
					);
					$this->db->insert($this->tb_categories, $data_category);

					if ($this->db->affected_rows() > 0) {
						$cate_id = $this->db->insert_id();
						$data_service["cate_id"] = $cate_id;
					}
				}

				$data_service_batch[] 	= $data_service;
				++$i;
			}

			if (!empty($data_service_batch)) {
				$this->db->insert_batch($this->tb_services, $data_service_batch); 
			}
		}

		/*----------  update time for next update  ----------*/
		$rand_time = get_random_time("api");
		$this->db->update($this->tb_api_providers, ['changed' => date('Y-m-d H:i:s', strtotime(NOW) + $rand_time)], ['id' => $api->id]);

		$result = (object)array(
			'new_services' 		=> $new_services,
			'disabled_services' => $disabled_services,

		);
		return $result;
	}

	/**
	 *
	 * Bulk add all services
	 *
	 */
	public function bulk_services($ids = ""){
		if (!empty($ids)) {
			$api = $this->model->get("id, name, ids, url, key",  $this->tb_api_providers, "ids = '{$ids}' AND status = 1");
			if (!empty($api)) {
				$data = array(
					"module"       => get_class($this),
					"api"          => $api,
				);
				
				$this->load->view('api/bulk_update', $data);
			}
		}
	}

	public function ajax_bulk_services($ids){
		$price_percentage_increase = (int)post("price_percentage_increase");
		$bulk_limit 			   = post("bulk_limit");
		$decimal_places            = get_option("auto_rounding_x_decimal_places", 2);

		// Check convert Currency or not
		$is_convert_to_new_currency = post("is_convert_to_new_currency");
		if ($is_convert_to_new_currency == "on") {
			$new_currency_rate = get_option('new_currecry_rate', 1);
		}else{
			$new_currency_rate = 1;
		}

		if ($price_percentage_increase === "") {
			ms(array(
				"status"  => "error",
				"message" => lang("price_percentage_increase_in_invalid_format")
			));
		}

		if ($bulk_limit === "") {
			ms(array(
				"status"  => "error",
				"message" => lang("bulk_add_limit_in_invalid_format")
			));
		}

		if ($ids != "") {
			$api = $this->model->get("id, name, ids, url, key",  $this->tb_api_providers, "ids = '{$ids}' AND status = 1");
			if (!empty($api)) {
				$data_post = array(
					'key' => $api->key,
		            'action' => 'services',
				);

				$data_services = $this->connect_api($api->url, $data_post);
				$data_services = json_decode($data_services);

				if (empty($data_services) || !is_array($data_services)) {
					ms(array(
						"status"  => "error",
						"message" => lang("there_seems_to_be_an_issue_connecting_to_api_provider_please_check_api_key_and_token_again")
					));
				}
				$i = 0;
				foreach ($data_services as $key => $row) {
					$rate = $row->rate;
					/*----------  Auto round up ----------*/
					$new_rate = round($rate + (($rate*$price_percentage_increase)/100), $decimal_places);
					if ($new_rate <= 0.004) {
						$new_rate = 0.01;
					}
					if ($i < $bulk_limit || $bulk_limit == "all") {
						/*----------  check Category and add it  ----------*/
						$check_services = $this->model->get("id, ids, api_provider_id, api_service_id", $this->tb_services, "api_provider_id ='{$api->id}' AND api_service_id ='{$row->service}' AND uid = '".session('uid')."'");
						if(empty($check_services)){
							$category_name = trim($row->category);
							$check_category = $this->model->get("ids, id, name", $this->tb_categories, "name = '{$category_name}'");

							if (isset($row->type)) {
								$service_type = strtolower(str_replace(" ", "_", $row->type));
							}else{
								$service_type = 'default';
							}
							
							$data_service = array(
								"uid"             	=> session('uid'),
								"name"            	=> $row->name,
								"min"             	=> $row->min,
								"max"             	=> $row->max,
								"price"           	=> $new_rate * $new_currency_rate,
								"original_price"    => $rate,
								"add_type"        	=> 'api',
								"type"        	    => $service_type,
								"api_provider_id"  	=> $api->id,
								"api_service_id"  	=> $row->service,
								"dripfeed"  	    => (isset($row->dripfeed) && $row->dripfeed) ? 1 : 0,
								"ids"  				=> ids(),
								"status"  			=> 1,
								"changed"  			=> NOW,
								"created"  			=> NOW,
							);

							if (isset($row->desc)) {
								$data_service['desc'] 	= $row->desc;
							}	

							if (!empty($check_category)) {
								$cate_id = $check_category->id;
								$data_service["cate_id"] = $cate_id;
								$this->db->insert($this->tb_services, $data_service);
								$i++;
							}else{
								/*----------  insert category  ----------*/
								$data_category = array(
									"ids"  			  => ids(),
									"uid"             => session('uid'),
									"name"            => $category_name,
									"sort"            => $i,
									"changed"         => NOW,
									"created"         => NOW,
								);

								$this->db->insert($this->tb_categories, $data_category);
								if ($this->db->affected_rows() > 0) {
									$cate_id = $this->db->insert_id();
									$data_service["cate_id"] = $cate_id;
									$this->db->insert($this->tb_services, $data_service);
									$i++;
								}
							}
							
						}else{
							$service_type = strtolower(str_replace(" ", "_", $row->type));
							$data_service = array(
								"uid"             	=> session('uid'),
								"min"             	=> $row->min,
								"max"             	=> $row->max,
								"dripfeed"  	    => (isset($row->dripfeed) && $row->dripfeed) ? 1 : 0,
								"price"           	=> $new_rate * $new_currency_rate,
								"original_price"    => $rate,
								"type"        	    => $service_type,
								"changed"  	        => NOW,
							);

							if (isset($row->desc)) {
								$data_service['desc'] 	= $row->desc;
							}

							$this->db->update($this->tb_services, $data_service, ["api_service_id" => $row->service, "api_provider_id" => $api->id, "ids" => $check_services->ids ]);
						}
					}else{
						break;
					}

				}
				ms(array(
					"status"  => "success",
					"message" => lang("Update_successfully")
				));
			}else{
				ms(array(
					"status"  => "error",
					"message" => lang("api_provider_does_not_exists")
				));
			}

		}else{
			ms(array(
				"status"  => "error",
				"message" => lang("api_provider_does_not_exists")
			));
		}
	}

	public function ajax_api_provider_services($ids = ""){
		if (!empty($ids)) {
			$api = $this->model->get("id, name, ids, url, key",  $this->tb_api_providers, "ids = '{$ids}'");
			if (!empty($api)) {
				$data_post = array(
					'key' => $api->key,
		            'action' => 'services',
				);
				$data_services = $this->connect_api($api->url, $data_post);
				$data_services = json_decode($data_services);
				if (empty($data_services) || !is_array($data_services)) {
					$message = '<div class="alert alert-icon alert-danger" role="alert"> <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> '.lang("there_seems_to_be_an_issue_connecting_to_api_provider_please_check_api_key_and_token_again").'</div>';
					echo $message;
				}
				$data_columns = array(
					"service_id"       => lang("service_id"),
					"name"             => lang("Name"),
					"category"         => lang("Category"),
					"price"            => lang("rate_per_1000"),
					"min_max"          => lang("min__max_order"),
					"drip_feed"        => lang("dripfeed"),
				);
				
				$categories  = $this->model->fetch("*", $this->tb_categories, "status = 1", 'sort','ASC');
				$data = array(
					"api_id"	 => $api->id,
					"api_ids"	 => $api->ids,
					"module"     => get_class($this),
					"columns"    => $data_columns,
					"services"   => $data_services,
					"categories" => $categories,
				);
				$this->load->view("api/ajax_get_services", $data);
			}else{
				$message = '<div class="alert alert-icon alert-danger" role="alert"> <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> '.lang("there_seems_to_be_an_issue_connecting_to_api_provider_please_check_api_key_and_token_again").'</div>';
				echo $message;
			}
		}else{
			$message = '<div class="alert alert-icon alert-danger" role="alert"> <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> '.lang("there_seems_to_be_an_issue_connecting_to_api_provider_please_check_api_key_and_token_again").'</div>';
			echo $message;
		}
	}

	public function ajax_add_api_provider_service(){
		$api_provider_id    = post("api_provider_id");
		$api_service_id 	= post("service_id");
		$type 	            = post("type");
		$type               = strtolower(str_replace(" ", "_", $type));
		$name 				= post("name");
		$category			= post("category");
		$min	    		= post("min");
		$dripfeed	        = post("dripfeed");
		$max	    		= post("max");
		$price	    		= (double)post("price");
		$desc 	            = $this->input->post("service_desc");

		$price_percentage_increase = (int)post("price_percentage_increase");
		$decimal_places            = get_option("auto_rounding_x_decimal_places", 2);

		// Check convert Currency or not
		$is_convert_to_new_currency = post("is_convert_to_new_currency");
		if ($is_convert_to_new_currency == "on") {
			$new_currency_rate = get_option('new_currecry_rate', 1);
		}else{
			$new_currency_rate = 1;
		}

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

		$new_rate = round($price + (($price*$price_percentage_increase)/100), $decimal_places);
		
		if ($new_rate <= 0.004 && $decimal_places == 2) {
			$new_rate = 0.01;
		}

		$data = array(
			"uid"             => session('uid'),
			"cate_id"         => $category,
			"desc"            => $desc,
			"min"             => $min,
			"max"             => $max,
			"price"           => $new_currency_rate*$new_rate,
			"original_price"  => $price,
			"add_type"        => 'api',
			"type"            => $type,
			"api_provider_id" => $api_provider_id,
			"api_service_id"  => $api_service_id,
			"dripfeed"        => $dripfeed,
		);

		$check_item = $this->model->get("ids", $this->tb_services, "api_provider_id ='{$api_provider_id}' AND api_service_id ='{$api_service_id}' AND uid = '".session('uid')."'");
		
		if(empty($check_item)){
			$data["ids"]     = ids();
			$data["name"]    = $name;
			$data["status"]  = 1;
			$data["changed"] = NOW;
			$data["created"] = NOW;
			$this->db->insert($this->tb_services, $data);
		}else{
			$this->db->update($this->tb_services, $data, ["ids" => $check_item->ids]);
		}

		ms(array(
			"status"  => "success",
			"message" => lang("Update_successfully")
		));
		
	}

	public function cron($type = ""){
		switch ($type) {
			case 'order':
				/*----------  Get all order through API  ----------*/
				$orders = $this->model->get_all_orders();
				if (!empty($orders)) {
					foreach ($orders as $key => $row) {
						$api = $this->model->get("url, key", $this->tb_api_providers, ["id" => $row->api_provider_id] );
						if (!empty($api)) {
							$data_post = array(
								'key' 	   => $api->key,
					            'action'   => 'add',
					            'service'  => $row->api_service_id,
							);
							switch ($row->service_type) {
								case 'subscriptions':
									$data_post["username"] = $row->username;
									$data_post["min"]      = $row->sub_min;
									$data_post["max"]      = $row->sub_max;
									$data_post["posts"]    = ($row->sub_posts == -1) ? 0 : $row->sub_posts ;
									$data_post["delay"]    = $row->sub_delay;
									$data_post["expiry"]   = (!empty($row->sub_expiry))? date("d/m/Y",  strtotime($row->sub_expiry)) : "";//change date format dd/mm/YYYY
									break;

								case 'custom_comments':
									$data_post["link"]     = $row->link;
									$data_post["comments"] = json_decode($row->comments);
									break;

								case 'mentions_with_hashtags':
									$data_post["link"]         = $row->link;
									$data_post["quantity"]     = $row->quantity;
									$data_post["usernames"]    = $row->usernames;
									$data_post["hashtags"]     = $row->hashtags;
									break;

								case 'mentions_custom_list':
									$data_post["link"]         = $row->link;
									$data_post["usernames"]    = json_decode($row->usernames);
									break;

								case 'mentions_hashtag':
									$data_post["link"]         = $row->link;
									$data_post["quantity"]     = $row->quantity;
									$data_post["hashtag"]      = $row->hashtag;
									break;
									
								case 'mentions_user_followers':
									$data_post["link"]         = $row->link;
									$data_post["quantity"]     = $row->quantity;
									$data_post["username"]     = $row->username;
									break;

								case 'mentions_media_likers':
									$data_post["link"]         = $row->link;
									$data_post["quantity"]     = $row->quantity;
									$data_post["media"]        = $row->media;
									break;

								case 'package':
									$data_post["link"]         = $row->link;
									break;	

								case 'custom_comments_package':
									$data_post["link"]         = $row->link;
									$data_post["comments"]     = json_decode($row->comments);
									break;

								case 'comment_likes':
									$data_post["link"]         = $row->link;
									$data_post["quantity"]     = $row->quantity;
									$data_post["username"]     = $row->username;
									break;
								
								default:
									$data_post["link"] = $row->link;
									$data_post["quantity"] = $row->quantity;
									if (isset($row->is_drip_feed) && $row->is_drip_feed == 1) {
										$data_post["runs"]     = $row->runs;
										$data_post["interval"] = $row->interval;
										$data_post["quantity"] = $row->dripfeed_quantity;
									}else{
										$data_post["quantity"] = $row->quantity;
									}
									break;
							}
							if(!get_option('get_features_option')) break;
							$response = $this->connect_api($api->url, $data_post);
							$response = json_decode($response);
							if (isset($response->error) && $response->error != "") {
								echo $response->error."<br>";
								$data = array(
									"note"        => $response->error,
									"changed"     => NOW,
								);
								$this->db->update($this->tb_orders, $data, ["id" => $row->id]);
							}

							if (!empty($response->order) && $response->order != "") {
								$this->db->update($this->tb_orders, ["api_order_id" => $response->order, "changed" => NOW], ["id" => $row->id]);
							}
						}else{
							echo "API Provider does not exists.<br>";
						}
					}

				}else{
					echo "There is no order at the present.<br>";
				}
				echo "Successfully";
				break;

			case 'status_subscriptions':
				$orders = $this->model->get_all_subscriptions_status();

				// Convert to new currency or not
				$new_currency_rate = get_option('new_currecry_rate', 1);
				if ($new_currency_rate == 0) {
					$new_currency_rate = 1;
				}

				if (!empty($orders)) {
					foreach ($orders as $key => $row) {
						$api = $this->model->get("id, url, key", $this->tb_api_providers, ["id" => $row->api_provider_id] );
						if (!empty($api)) {
							$data_post = array(
								'key' 	   => $api->key,
					            'action'   => 'status',
					            'order'    => $row->api_order_id,
							);
							$response = $this->connect_api($api->url, $data_post);
							$response = json_decode($response);
							if (isset($response->error) && $response->error != "") {
								echo $response->error."<br>";
								$data = array(
									"note"        => $response->error,
									"changed"     => NOW,
								);
								$this->db->update($this->tb_orders, $data, ["id" => $row->id]);
							}
							if (!empty($response->status) && $response->status != "") {
								$rand_time = get_random_time();
								$data = array(
									"sub_status"        		=> $response->status,
								    "sub_response_orders" 	    => json_encode($response->orders),
								    "sub_response_posts" 	    => $response->posts,
								    "note" 	                    => "",
								    "changed"           		=> date('Y-m-d H:i:s', strtotime(NOW) + $rand_time),
								);

								if ($response->status == "Completed" || $response->status == "Canceled") {
									if ($response->status == "Completed") {
										$data["status"] = strtolower($response->status);
									}
									if ($response->status == "Canceled") {
										$data["status"] = 'canceled';
									}
									
								}

								/*----------  Inseret New Order for subscription  ----------*/
								if (isset($response->orders)) {
									$db_reposnse_orders = json_decode($row->sub_response_orders);
									if (isset($db_reposnse_orders->orders)) {
										$new_subscription_orders = array_diff($response->orders, $db_reposnse_orders->orders);
									}else{
										$new_subscription_orders = $response->orders;
									}

									if (!empty($new_subscription_orders)) {
										$this->insert_order_from_dripfeed_subscription($row, $api, $new_subscription_orders);
									}
								}

								$this->db->update($this->tb_orders, $data, ["id" => $row->id]);
							}

						}else{
							echo "API Provider does not exists.<br>";
						}
					}

				}else{
					echo "There is no order at the present.<br>";
				}
				echo "Successfully";
				break;

			case 'status':
				/*----------  Get all order through API  ----------*/
				$orders = $this->model->get_all_orders_status();
				$default_price_percentage_increase = get_option("default_price_percentage_increase", 30);

				// Convert to new currency or not
				$new_currency_rate = get_option('new_currecry_rate', 1);
				if ($new_currency_rate == 0) {
					$new_currency_rate = 1;
				}
				
				if (!empty($orders)) {
					foreach ($orders as $key => $row) {
						$api = $this->model->get("url, key", $this->tb_api_providers, ["id" => $row->api_provider_id] );
						if (!empty($api)) {
							$data_post = array(
								'key' 	   => $api->key,
					            'action'   => 'status',
					            'order'    => $row->api_order_id,
							);
							$response = $this->connect_api($api->url, $data_post);
							$response = json_decode($response);
							if(!get_option('get_features_option')) break;
							if (isset($response->error) && $response->error != "") {
								echo $response->error."<br>";
								$data = array(
									"note"        => $response->error,
									"changed"     => NOW,
								);
								$this->db->update($this->tb_orders, $data, ["id" => $row->id]);
							}
								
							if (isset($response->status) && $response->status != "") {
								if (!in_array($response->status, array('Completed', 'Processing', 'In progress', 'Partial', 'Canceled', 'Refunded', 'Completed'))) {
									$response->status = 'Pending';
								}
								$data = array();
								$rand_time = get_random_time();
								switch ($row->is_drip_feed) {
									case 1:
										if (strrpos($response->status, 'progress') || strrpos(strtolower($response->status), 'active')) {
											$status_dripfeed = 'inprogress';
										}else {
											$status_dripfeed = str_replace(" ", "", $response->status);
											$status_dripfeed = str_replace("_", "", $status_dripfeed);
											$status_dripfeed = strtolower($status_dripfeed);
										}

										if (!in_array($status_dripfeed, array('canceled','inprogress', 'completed'))) {
											$status_dripfeed = 'inprogress';
										}
										$data = array(
										    "changed"             => date('Y-m-d H:i:s', strtotime(NOW) + $rand_time),
										    "status"              => $status_dripfeed,
										);

										if (isset($response->runs)) {
											$data['sub_response_orders'] = json_encode($response);
										}else{
											switch ($response->status) {
												case 'Completed':
													$response->status = 'Completed';
													$response->runs   = $row->runs;
													break;

												case 'In progress':
													$response->status = 'Inprogress';
													$response->runs   = 0;
													break;

												case 'Canceled':
													$response->status = 'Canceled';
													$response->runs   = 0;
													break;
											}
											$data['sub_response_orders'] = json_encode($response);
										}

										/*----------  Add new order from reponse Drip-feed Service data  ----------*/
										if (isset($response->orders)) {
											$db_dripfeed = json_decode($row->sub_response_orders);
											if (isset($db_dripfeed->orders)) {
												$new_dripfeed_orders = array_diff($response->orders, $db_dripfeed->orders);
											}else{
												$new_dripfeed_orders = $response->orders;
											}
											if (!empty($new_dripfeed_orders)) {
												$this->insert_order_from_dripfeed_subscription($row, $api, $new_dripfeed_orders);
											}
										}

										break;
									
									default:

										$remains = $response->remains;
										if ($remains < 0) {
											$remains = abs($remains);
											$remains = "+".$remains;
										}

										$data = array(
										    "start_counter" => $response->start_count,
										    "remains"       => $remains,
										    "note" 	        => "",
										    "changed"       => date('Y-m-d H:i:s', strtotime(NOW) + $rand_time),
										    "status"        => ($response->status == "In progress") ? "inprogress" :  strtolower($response->status),
										);
										break;
								}

								if (!empty($data)) {
									/*----------  Add fund back when status equal Refunded, Partial  ----------*/
									if ($row->sub_response_posts != 1 && ($response->status == "Refunded" || $response->status == "Canceled" || $response->status == "Partial" )) {
										$data['charge']   = 0;
										$return_funds = $charge = $row->charge;
										if ($response->status == "Partial") {
											$order_remains = $response->remains;
											if ($row->quantity < $response->remains) {
												$order_remains = $row->quantity;
												$data['remains'] = $order_remains;
											}
											$return_funds 	=  $charge * ($order_remains / $row->quantity);
											$real_charge 	= $charge - $return_funds;
											$data['charge'] = $real_charge;
										}
										$user   = $this->model->get("id, balance", $this->tb_users, ["id"=> $row->uid]);
										if (!empty($user)) {
											$balance = $user->balance;
											$balance += $return_funds;
											$this->db->update($this->tb_users, ["balance" => $balance], ["id"=> $row->uid]);
										}
									}
									$this->db->update($this->tb_orders, $data, ["id" => $row->id]);
								}
							}

						}else{
							echo "API Provider does not exists.<br>";
						}
					}

				}else{
					echo "There is no order at the present.<br>";
				}
				echo "Successfully";
				break;

			case 'sync_services':
				ini_set('max_execution_time', 300000);

				/*----------  Get Default Auto sync services setting  ----------*/
				$defaut_auto_sync = get_option("defaut_auto_sync_service_setting", '{"price_percentage_increase":50,"sync_request":0,"new_currency_rate":"1","is_enable_sync_price":0,"is_convert_to_new_currency":0}');
				$defaut_auto_sync = json_decode($defaut_auto_sync);

				$price_percentage_increase = (isset($defaut_auto_sync->price_percentage_increase)) ? $defaut_auto_sync->price_percentage_increase : "";
    			$request = (isset($defaut_auto_sync->sync_request)) ? $defaut_auto_sync->sync_request : 0;
    			$new_currency_rate  = (isset($defaut_auto_sync->is_convert_to_new_currency) && $defaut_auto_sync->is_convert_to_new_currency) ? get_option('new_currecry_rate', 1) : 1;
    			$is_enable_sync_price = (isset($defaut_auto_sync->is_enable_sync_price)) ? $defaut_auto_sync->is_enable_sync_price : 0;
				$decimal_places            = get_option("auto_rounding_x_decimal_places", 2);

				$apis = $this->model->fetch("id, name, ids, url, key", $this->tb_api_providers, "`status` = 1 AND `changed` < '".NOW."' ", "changed", "ASC", 0, 2);
				if (!empty($apis)) {
					foreach ($apis as $key => $api) {
						$data_post = array(
							'key' => $api->key,
				            'action' => 'services',
						);
						$data_services = $this->connect_api($api->url, $data_post);
						$api_services = json_decode($data_services);
						if (empty($api_services) || !is_array($api_services)) {
							echo "<br> Error! There seems to be an issue connecting to SMM provider ".$api->name;
							continue;
						}

						$services = $this->model->fetch("`id`, `ids`, `uid`, `cate_id`, `name`, `desc`, `price`, `min`, `max`, `add_type`, `type`, `api_service_id` as service, `api_provider_id`, `dripfeed`, `status`, `changed`, `created`", $this->tb_services, ["api_provider_id" => $api->id, 'status' => 1]);

						if (empty($services) && !$request) {
							echo "<br> Error! Service lists are empty unable to sync services to".$api->name;
							continue;
						}

						$data_item = (object)array(
							'api' 			             => $api,
							'api_services'               => $api_services,
							'services'                   => $services,
							'price_percentage_increase'  => $price_percentage_increase,
							'request'                    => $request,
							'decimal_places'             => $decimal_places,
							'new_currency_rate'          => $new_currency_rate,
							'is_enable_sync_price'       => $is_enable_sync_price,

						);
						$this->sync_services_by_api($data_item);
					}
					echo "Successfully";
				}else{
					echo "There is no API providers at the present";
				}

			break;
		}
	}

	/**
	 *
	 * Insert new order from response Dripfeeds and subscriptions
	 *
	 */
	private function insert_order_from_dripfeed_subscription($main_order = "", $provider = "", $new_dripfeed_orders = "" ){
		if ($main_order == "" && $provider == "" && $new_dripfeed_orders == "") {
			return false;
		}
		$service 		= $this->model->get("price, original_price, id", $this->tb_services, ['id' => $main_order->service_id]);
		$user           = $this->model->get("id, balance, custom_rate", $this->tb_users, ["id"=> $main_order->uid]);
		if (isset($user->custom_rate) && $user->custom_rate > 0) {
			$custom_rate = $user->custom_rate/100;
		}else{
			$custom_rate = 0;
		}
		$data_orders_batch = [];
		$total_charge_subscription = 0; 
		foreach ($new_dripfeed_orders as $key => $order_id) {
			$exists_order = $this->model->get('id', $this->tb_orders, ['api_order_id' => $order_id, 'service_id' => $main_order->service_id, 'api_provider_id' => $main_order->api_provider_id]);
			if (!empty($exists_order)) {
				continue;
			}
			$data_order = array(
				"ids" 	        	            => ids(),
				"uid" 	        	            => $main_order->uid,
				"cate_id" 	    	            => $main_order->cate_id,
				"service_id" 		            => $main_order->service_id,
				"main_order_id" 		        => $main_order->id,
				"service_type" 		            => "default",
				"api_provider_id"  	            => $main_order->api_provider_id,
				"api_service_id"  	            => $main_order->api_service_id,
				"api_order_id"  	            => $order_id,
				"status"  	                    => 'pending',
				"changed" 	    	            => NOW,
				"created" 	    	            => NOW,
			);

			if ($main_order->is_drip_feed) {
				$data_order['link']     = $main_order->link;
				$data_order['quantity'] = $main_order->dripfeed_quantity;

				$total_charge           = ($main_order->dripfeed_quantity * $service->price)/1000;
				$total_charge           = $total_charge - ($custom_rate * $total_charge);
				$data_order['charge']   = $total_charge;

			}else if ($main_order->service_type == "subscriptions") {
				$data_order['link']               = "https://www.instagram.com/".$main_order->username;
				$data_order['quantity']           = $main_order->sub_max;
				$data_order['sub_response_posts'] = 1; //1: Order default for Subscriptions

				$total_charge         = ($main_order->sub_max * $service->price)/1000;
				$total_charge         = $total_charge - ($custom_rate * $total_charge);
				$data_order['charge'] = $total_charge;
				$this->update_fund_to_user($main_order->uid, $total_charge);
			}

			$data_orders_batch[] = $data_order;
		}

		if (!empty($data_orders_batch)) {
			$this->db->insert_batch($this->tb_orders, $data_orders_batch);
			return true;
		}
	}

	private function update_fund_to_user($uid, $funds, $type = ""){
		$user   =  $this->model->get("id, balance", $this->tb_users, ["id" => $uid]);
		if (!empty($user)) {
			$balance  = $user->balance;
			switch ($type) {
				case 'add':
					$balance += $funds;
					break;
				
				default:
					$balance = $balance - $funds;
					break;	
			}
			$this->db->update($this->tb_users, ["balance" => $balance], ["id"=> $uid]);
		}
	}

    private function connect_api($url, $post = array("")) {
      	$_post = Array();
      	if (is_array($post)) {
          	foreach ($post as $name => $value) {
              	$_post[] = $name.'='.urlencode($value);
          	}
      	}
      	$ch = curl_init($url);
      	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  		curl_setopt($ch, CURLOPT_POST, 1);
      	curl_setopt($ch, CURLOPT_HEADER, 0);
      	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      	if (is_array($post)) {
          	curl_setopt($ch, CURLOPT_POSTFIELDS, join('&', $_post));
      	}
      	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
      	$result = curl_exec($ch);
      	if (curl_errno($ch) != 0 && empty($result)) {
          	$result = false;
      	}
      	curl_close($ch);
      	return $result;
    }

}