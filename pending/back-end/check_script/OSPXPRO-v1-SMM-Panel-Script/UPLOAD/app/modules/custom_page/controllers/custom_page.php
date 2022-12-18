<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class custom_page extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');

	}

	public function page_404(){

		$data = array(
			"module"     => get_class($this),
		);

		$this->template->set_layout('404');
		$this->template->build("index", $data);
	}
	
	
}

