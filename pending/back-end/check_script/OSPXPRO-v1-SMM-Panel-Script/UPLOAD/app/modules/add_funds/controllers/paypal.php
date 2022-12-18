<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class paypal extends MX_Controller {
	public $tb_users;
	public $tb_transaction_logs;
	public $paypal;
	public $payment_type;
	public $currency_code;
	public $mode;

	public function __construct(){
		parent::__construct();
		$this->tb_users            = USERS;
		$this->tb_transaction_logs = TRANSACTION_LOGS;
		$this->payment_type		   = "paypal";
		$this->mode = get_option("payment_environment", "");
		$this->currency_code = (get_option("currency_code", "USD") == "")? 'USD' : get_option("currency_code", "USD");
		$this->load->library("paypalapi");
		$this->paypal = new paypalapi(get_option('paypal_client_id',""), get_option('paypal_client_secret',""));
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
		unset_session("paypal_payment_id");
		$amount = session("amount");
		if (!empty($amount) && $amount > 0) {
			$data = (object)array(
				"amount" 		=> $amount,
				"currency" 		=> $this->currency_code,
				"redirectUrls" 	=> cn("add_funds/paypal/complete"),
				"cancelUrl" 	=> cn("add_funds/unsuccess"),
				"description" 	=> lang('Deposit_to_').get_option('website_name'),
			);	
			unset_session("amount");
			unset_session("real_amount");
			$this->paypal->create_payment($data, $this->mode);
		}else{
			redirect(cn("add_funds"));
		}
	}

	/**
	 *
	 * Call Execute payment after creating payment
	 *
	 */
	public function complete(){
		if (isset($_GET["paymentId"]) && $_GET["paymentId"] != "" && isset($_GET["paymentId"])) {

			$result = $this->paypal->execute_payment($_GET["paymentId"], $_GET["PayerID"], $this->mode);

			// get Transaction Id
			$transactions      = $result->getTransactions();
			$related_resources = $transactions[0]->getRelatedResources();
			$sale              = $related_resources[0]->getSale();
			$txt_status        = $sale->getState();//completed
			
			$sale_id           = $sale->getId();
			$exists_txnid = $this->model->get('id, transaction_id', $this->tb_transaction_logs, ['transaction_id' => $sale_id, 'uid' => session('uid')]);
			if(!empty($result) && $result->state == 'approved' && empty($exists_txnid) && session('paypal_payment_id') == $_GET["paymentId"]){
				unset_session("paypal_payment_id");
				/*----------  Insert to Transaction table  ----------*/
				$chagre_fee              = get_option('paypal_chagre_fee');
				$amount = $result->transactions[0]->amount;
				$data = array(
					"ids" 				=> ids(),
					"uid" 				=> session("uid"),
					"type" 				=> $this->payment_type,
					"transaction_id" 	=> $sale_id,
					"amount" 	        => $amount->total,
					"created" 			=> NOW,
				);

				$this->db->insert($this->tb_transaction_logs, $data);
				$transaction_id = $this->db->insert_id();

				/*----------  Add funds to user balance  ----------*/
				$user_balance   = get_field($this->tb_users, ["id" => session("uid")], "balance");
				$user_balance  += ($amount->total * 100)/(100 + $chagre_fee);

				$this->db->update($this->tb_users, ["balance" => $user_balance], ["id" => session("uid")]);
				
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
			redirect(cn("add_funds/unsuccess"));
		}
	}
}