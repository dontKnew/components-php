<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class home extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		if (session('uid')) {
			redirect(cn('statistics'));
		}
	}

	public function index(){
		if (get_option("enable_disable_homepage")) {
			redirect(cn("auth/login"));
		}

		$data = array();
		$this->template->set_layout('landing_page');
		$this->template->build('index', $data);
	}
	
}