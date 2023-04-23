<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class add_funds extends MX_Controller {
	public $tb_users;
	public $tb_transaction_logs;
	public $module_name;
	public $module_icon;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		$this->tb_users            = USERS;
		$this->tb_transaction_logs = TRANSACTION_LOGS;
	}

	public function index(){
		$data = array(
			"module"        => get_class($this),
		);

		$this->template->build('index', $data);
	}

	public function process(){
		$amount = post("amount");
		$agree  = post("agree");
		
		if(!empty(post("qrtransaction_id"))){
		    $qrtransaction_id = post("qrtransaction_id");
		}
		
		$payment_method = post('payment_method');
		if ($amount  == "") {
			ms(array(
				"status"  => "error",
				"message" => lang("amount_is_required"),
			));
		}

		if ($amount  < 0) {
			ms(array(
				"status"  => "error",
				"message" => lang("amount_must_be_greater_than_zero"),
			));
		}

		/*----------  Get Min ammout  ----------*/
		$min_ammount = get_option($payment_method."_payment_transaction_min");
		if ($min_ammount < 0 || $min_ammount == "") {
			$min_ammount = get_option('payment_transaction_min');
		}

		if ($amount  < $min_ammount) {
			ms(array(
				"status"  => "error",
				"message" => lang("minimum_amount_is")." ".$min_ammount,
			));
		}

		if (!$agree) {
			ms(array(
				"status"  => "error",
				"message" => lang("you_must_confirm_to_the_conditions_before_paying")
			));
		}
		
		$transaction_fee = 0;
		if ($payment_method != "") {
			$transaction_fee = get_option($payment_method."_chagre_fee", 4);
		}
		
		$total_amount = $amount + (($amount*$transaction_fee)/100);

		if (in_array($payment_method, ['coinbase', 'hesabe'])) {
			$data = array(
				"module"             => get_class($this),
				"amount"             => $total_amount,
			);
			require $payment_method.'.php';
			$payment_module = new $payment_method();
			$payment_module->create_payment($data);
		}else{
			set_session("real_amount", $amount);
			set_session("amount", (float)$total_amount);
			if(!empty($qrtransaction_id)){
			set_session("qrtransaction_id", $qrtransaction_id);
			}
			ms(array(
				"status" => "success",
				"message" => lang("processing_"),
			));
		}

	}

	public function two_checkout_form(){
		$data = array(
			"module"        => get_class($this),
			"amount"        => session('amount'),
		);
		$this->template->build('2checkout_form', $data);
	}
   
        public function razor_pay_form()
        {
            $data = array(
                "module"        => get_class($this),
                "amount"        => session('amount')
            );
            $this->template->build('razor_pay_form',$data);
        }
	public function stripe_form(){
		$data = array(
			"module"        => get_class($this),
			"amount"        => session('amount'),
		);
		$this->template->build('stripe_form', $data);
	}

	public function success(){
		$id = session("transaction_id");
		$transaction = $this->model->get("*", $this->tb_transaction_logs, "id = '{$id}' AND uid ='".session('uid')."'");
		if (!empty($transaction)) {
			$data = array(
				"module"        => get_class($this),
				"transaction"   => $transaction,
			);
			unset_session("transaction_id");
			$this->template->build('payment_successfully', $data);
		}else{
			redirect(cn("add_funds"));
		}
	}

	public function unsuccess(){
		$data = array(
			"module"        => get_class($this),
		);
		$this->template->build('payment_unsuccessfully', $data);
	}

}