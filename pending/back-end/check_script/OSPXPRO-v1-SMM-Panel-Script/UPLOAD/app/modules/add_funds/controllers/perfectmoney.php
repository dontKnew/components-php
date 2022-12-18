<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class perfectmoney extends MX_Controller {
	public $tb_users;
	public $tb_transaction_logs;
	public $perfectmoney;
	public $payment_type;
	public $currency_code;
	public $mode;
	public $perfect_money_wallet;
	public $perfect_money_pass;

	public function __construct(){
		parent::__construct();
		$this->tb_users            	= USERS;
		$this->tb_transaction_logs 	= TRANSACTION_LOGS;
		$this->payment_type		   	= "perfectmoney";
		$this->mode 				= get_option("payment_environment", "");
		$this->currency_code 		= get_option("perfect_money_currency_code", 'USD');
		$this->load->model('model', 'model');
		$this->load->library("perfectmoney_api");
		

	}

	public function index(){
		redirect(cn('add_funds'));
	}

	/**
	 *
	 * Create payment
	 *
	 */
	public function create_payment($data = ""){

		if (get_option('perfectmoney_alternate_passphrase', "") == "") {
			ms(array(
				"status"  => "error",
				"message" => lang('this_payment_is_not_active_please_choose_another_payment_or_contact_us_for_more_detail')
			));
		}
		
		$amount = (double)$data['amount'];
		if ($amount != "") {
			switch ($this->currency_code) {
	        	case 'EUR':
	        		$client_id = get_option("perfect_money_account_eur_client_id");
	        		break;

	        	case 'BTC':
	        		$client_id = get_option("perfect_money_account_btc_client_id");
	        		break;
	        	
	        	default:
	        		$client_id = get_option("perfect_money_account_usd_client_id");
	        		break;
	        }

	        if ($client_id == "" || !in_array($this->currency_code, ['USD', 'EUR', 'BTC'])) {
	        	redirect(cn('add_funds'));
	        }
	        $users = session('user_current_info');
	        $order_id = strtotime(NOW);
	        $perfectmoney = array(
	        	'PAYEE_ACCOUNT' 	=> $client_id,
	        	'PAYEE_NAME' 		=> get_option('website_name'),
	        	'PAYMENT_UNITS' 	=> $this->currency_code,
	        	'STATUS_URL' 		=> cn("add_funds/perfectmoney/complete"),
	        	'PAYMENT_URL' 		=> cn("add_funds/perfectmoney/complete"),
	        	'NOPAYMENT_URL' 	=> cn("add_funds/perfectmoney/unsuccess"),
	        	'BAGGAGE_FIELDS' 	=> 'IDENT',
	        	'ORDER_NUM' 		=> $order_id,
	        	'PAYMENT_ID' 		=> strtotime(NOW),
	        	'CUST_NUM' 		    => "USERID" . rand(10000,99999999),
	        	'memo' 		        => "Balance recharge - ".  $users['email'],

	        );
			$tnx_id = $perfectmoney['PAYMENT_ID'].':'.$perfectmoney['PAYEE_ACCOUNT'].':'. $amount.':'.$perfectmoney['PAYMENT_UNITS'];
			$tnx_id = sha1($tnx_id);
			$data_tnx_log = array(
				"ids" 				=> ids(),
				"uid" 				=> session("uid"),
				"type" 				=> $this->payment_type,
				"transaction_id" 	=> $tnx_id,
				"amount" 	        => $amount,
				"status" 	        => 0,
				"created" 			=> NOW,
			);
			$transaction_log_id = $this->db->insert($this->tb_transaction_logs, $data_tnx_log);
			
			$data = array(
				"module"        => 'add_funds',
				"amount"        => $amount,
				"perfectmoney"  => (object)$perfectmoney,
			);

			$this->load->view("perfectmoney/redirect", $data);
		}else{
			ms(array(
				"status"  => "error",
				"message" => lang('this_payment_is_not_active_please_choose_another_payment_or_contact_us_for_more_detail')
			));
		}
		
	}

	/**
	 *
	 * Call Execute payment after creating payment
	 *
	 */
	public function complete(){
		file_put_contents($_SERVER['DOCUMENT_ROOT'].'/perfectmoney_result.txt', json_encode($_POST).PHP_EOL, FILE_APPEND);
		/*----------  Insert to Transaction table  ----------*/
		if (!isset($_REQUEST['PAYMENT_BATCH_NUM'])) {
			redirect(cn("add_funds"));
		}
		$tnx_id = $_REQUEST['PAYMENT_ID'].':'.$_REQUEST['PAYEE_ACCOUNT'].':'. $_REQUEST['PAYMENT_AMOUNT'].':'.$_REQUEST['PAYMENT_UNITS'];
		$tnx_id = sha1($tnx_id);

		$transaction = $this->model->get('*', $this->tb_transaction_logs, ['transaction_id' => $tnx_id, 'status' => 0, 'uid' => session('uid'), 'type' => $this->payment_type]);
		if (!$transaction) {
			redirect(cn("add_funds"));
		}
		
		// check V2_hash
		$v2_hash = false;
		$this->perfectmoney = new perfectmoney_api();
		$v2_hash            = $this->perfectmoney->check_v2_hash(get_option('perfectmoney_alternate_passphrase', ""));
		if (!$v2_hash) {
			redirect(cn("add_funds"));
		}
		
		if ($_POST['PAYEE_ACCOUNT'] == get_option("perfect_money_account_usd_client_id") && $transaction && $transaction->amount == $_REQUEST['PAYMENT_AMOUNT'] && $v2_hash) {
            $this->db->update($this->tb_transaction_logs, ['status' => 1, 'transaction_id' => $_REQUEST['PAYMENT_BATCH_NUM']],  ['id' => $transaction->id]);
            $real_amount = ($transaction->amount * 100)/(100 + get_option('perfectmoney_chagre_fee', 1));
            $user_balance = get_field($this->tb_users, ["id" => $transaction->uid], "balance");
            $user_balance += $real_amount;
            $this->db->update($this->tb_users, ["balance" => $user_balance], ["id" => $transaction->uid]); 
            
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
			set_session("transaction_id", $transaction->id);
			redirect(cn("add_funds/success"));
		}else{
			$this->db->update($this->tb_transaction_logs, ['status' => -1],  ['id' => $transaction->id]);
		}
	}
}