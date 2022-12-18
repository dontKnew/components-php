<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class setting extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		$this->load->model('language/language_model', 'sub_model');
	}

	public function index(){
		$data = array(
			"module"     => get_class($this),
			"settings"   => $this->sub_model->get_info(),
		);
		$this->template->build('index', $data);
	}

	public function ajax_get_contents(){
		$type = post("type");
		$data = array(
			"module"     => get_class($this),
			"tab"        => $type,
		);
		$payments_method = get_payments_method();
		if ($type != "") {
			if (in_array($type, $payments_method) && payment_method_exists($type)) {
				$this->load->view('integrations/'.$type, $data);
			}else{
				$this->load->view($type, $data);
			}
		}
	}

	public function ajax_general_settings(){
		$data = $this->input->post();
		$default_home_page = $this->input->post("default_home_page");

		if(is_array($data)){
			foreach ($data as $key => $value) {

				if(in_array($key, ['embed_javascript', 'embed_head_javascript', 'manual_payment_content'])){
					$value = htmlspecialchars(@$_POST[$key], ENT_QUOTES);
				}	

				if ($key == 'coinpayments_acceptance') {
					$value = json_encode($value);
				}
				
				if ($key == 'freekassa_acceptance') {
					$value = json_encode($value);
				}

				if ($key == 'new_currecry_rate') {
					$value = (double)$value;
					if ($value <= 0 ) {
						$value = 1;
					}
				}
				update_option($key, $value);
			}
		}

		if($default_home_page != ""){
			$theme_file = fopen(APPPATH."../themes/config.json", "w");
			$txt = '{ "theme" : "'.$default_home_page.'" }';
			fwrite($theme_file, $txt);
			fclose($theme_file);
		}

		ms(array(
        	"status"  => "success",
        	"message" => lang('Update_successfully')
        ));
	}
	
}