<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class setting_model extends MY_Model {
	public $tb_users;
	public $tb_order;
	public $tb_categories;
	public $tb_services;
	public $tb_api_providers;

	public function __construct(){
		$this->tb_categories          = CATEGORIES;
		$this->tb_order               = ORDER;
		$this->tb_users               = USERS;
		$this->tb_services            = SERVICES;
		$this->tb_api_providers   	  = API_PROVIDERS;
		parent::__construct();
	}
}
