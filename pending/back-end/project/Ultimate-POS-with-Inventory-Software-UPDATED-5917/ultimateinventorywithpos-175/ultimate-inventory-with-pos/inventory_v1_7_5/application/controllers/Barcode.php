<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barcode extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load_global();
	}
	function _remap($input) {
        $this->index($input);
    }
    function index($input){
    	$this->load->library('zend');
		$this->zend->load('Zend/Barcode');

		$barcodeOptions = array(
			    		'text' => $input, 
			    		'fontSize' => 10, 
			    		'factor'=>1.5,
			    		'barHeight'=> 10, 
						);
		$rendererOptions = array();
		$renderer = Zend_Barcode::factory('code128', 'image', $barcodeOptions, $rendererOptions)->render();

		//Zend_Barcode::render('code128', 'image', array('text'=>$input), array('font'=>'3')); //workd
    }
}

