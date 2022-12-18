<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class stripe extends MX_Controller {
	public $tb_users;
	public $tb_transaction_logs;
	public $stripeapi;
	public $payment_type;
	public $currency_code;
	public $mode;

	public function __construct(){
		parent::__construct();
		$this->tb_users            = USERS;
		$this->tb_transaction_logs = TRANSACTION_LOGS;
		$this->payment_type		   = "stripe";
		$this->mode 			   = get_option("payment_environment", "");
		$this->currency_code       = (get_option("currency_code", "USD") == "")? 'USD' : get_option("currency_code", "");
		$this->load->library("stripeapi");
		$this->stripeapi = new stripeapi(get_option('stripe_secret_key',""), get_option('stripe_publishable_key',""), $this->mode);
		$this->load->model('model', 'model');
	}

	public function index(){
		redirect(cn("add_funds"));
	}

	/**
	 *
	 * Create payment
	 *
	 */
	public function create_payment(){
		$amount = post("amount");
		$token  = post("stripeToken");
		if(!empty($token)){
			$users = session('user_current_info');
			// Item info
			$description   = lang("Balance_recharge")." - ".  $users['email'];
			$itemNumber    = 'SMMPANEL9271';
			$orderID       = "ORDS" . strtotime(NOW);

			if (strtolower($this->currency_code) == 'jpy') {
				$charge = $amount;
			}else{
				$charge = $amount*100;
			}

			$data_charge = array(
		        'amount'       => $charge,
		        'currency'     => strtolower($this->currency_code),
		        'description'  => $description,
		        'source'       => $token,
		        'metadata'     => array(
		            'order_id' => $orderID
		        )
			);

			//charge a credit or a debit card
		    $result = $this->stripeapi->create_payment($data_charge);
		    $exists_txnid = $this->model->get('id, transaction_id', $this->tb_transaction_logs, ['transaction_id' => $result->response->id, 'uid' => session('uid')]); 
			if (!empty($result) && $result->status == 'success' && empty($exists_txnid)) {
				/*----------  Insert to Transaction table  ----------*/
				$response = $result->response;
				unset_session("amount");
				if (strtolower($this->currency_code) == 'jpy') {
					$tx_amount = $response->amount;
				}else{
					$tx_amount = $response->amount/100;
				}
				$data = array(
					"ids" 				=> ids(),
					"uid" 				=> session("uid"),
					"type" 				=> $this->payment_type,
					"transaction_id" 	=> $response->id,
					"amount" 	        => $tx_amount,
					"created" 			=> NOW,
				);

				$this->db->insert($this->tb_transaction_logs, $data);
				$transaction_id = $this->db->insert_id();

				/*----------  Add funds to user balance  ----------*/
				$user_balance = get_field($this->tb_users, ["id" => session("uid")], "balance");

				$chagre_fee    = get_option('stripe_chagre_fee');
				$user_balance += ($tx_amount * 100)/(100 + $chagre_fee);
				
				$this->db->update($this->tb_users, ["balance" => $user_balance], ["id" => session("uid")]);
				unset_session("real_amount");

				/*----------  Send payment notification email  ----------*/
				if (get_option("is_payment_notice_email", '')) {
					$CI = &get_instance();
					if(empty($CI->payment_model)){
						$CI->load->model('model', 'payment_model');
					}
					$check_send_email_issue = $CI->payment_model->send_email(get_option('email_payment_notice_subject', ''), get_option('email_payment_notice_content', ''), session('uid'));
					if($check_send_email_issue){
						ms(array(
							"status" => "error",
							"message" => $check_send_email_issue,
						));
					}
				}
				set_session("transaction_id", $transaction_id);
				redirect(cn("add_funds/success"));
			}else{
				redirect(cn("add_funds/unsuccess"));
			}
	
		}else{
			redirect(cn("add_funds"));
		}
	}
}