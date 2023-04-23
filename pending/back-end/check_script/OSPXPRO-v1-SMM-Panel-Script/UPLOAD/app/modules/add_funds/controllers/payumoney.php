<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class payumoney extends MX_Controller {
	public $tb_users;
	public $tb_transaction_logs;
	public $payumoney;
	public $payment_type;
	public $currency_code;
	public $mode;

	public function __construct(){
		parent::__construct();
		$this->tb_users            = USERS;
		$this->tb_transaction_logs = TRANSACTION_LOGS;
		$this->payment_type		   = "payumoney";
		$this->mode                = get_option("payumoney_payment_environment", "");
		$this->currency_code       = 'INR';
		$this->load->model('model', 'model');
	}

	public function index(){
		unset_session('signature');

		$path_file = APPPATH."./modules/setting/views/integrations/payumoney.php";
        if (!file_exists($path_file)) {
        	redirect(cn('add_funds'));
        }

        $payumoney_merchant_key = get_option('payumoney_merchant_key', "");
		$payumoney_accountId  = get_option('payumoney_merchant_salt', "");

        $payumoney = (object)array(
        	'merchant_key'         => $payumoney_merchant_key,
        	'merchant_salt'        => $payumoney_accountId, 
        	'productInfo'          => lang('Deposit_to_').get_option('website_name'), 
        	'amount'               => number_format((double)session('amount'), 2, '.', ','), 
        	'txnid'                => "Txn" . strtotime(NOW), 
        	'response_url'         => cn('add_funds/payumoney/complete'), 
        );

        if ($this->mode == 'LIVE') {
        	$payumoney->action_url = "https://checkout-static.citruspay.com/bolt/run/bolt.min.js";
        }else{
        	$payumoney->action_url = "https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js";
        }

        $signature = $payumoney->merchant_key.":".$payumoney->amount.":".$payumoney->txnid;
        set_session('signature', md5($signature));
		$data = array(
			"module"        => 'add_funds',
			"user"          => get_current_user_data(),
			"amount"        => number_format((double)session('amount'), 2, '.', ','),
			"payumoney"     => $payumoney,
		);
		$this->template->build('payumoney/payumoney_form', $data);
	}

	public function request_hash(){
		if (!empty($_POST)) {
			$data = (object)$_POST;
		    $hash=hash('sha512', $data->key.'|'.$data->txnid.'|'.$data->amount.'|'.$data->pinfo.'|'.$data->fname.'|'.$data->email.'|||||'.$data->udf5.'||||||'.$data->salt);
		    $json=array();
		    $json['success'] = $hash;
		      echo json_encode($json);
		}
	}


	/**
	 *
	 * Call Execute payment after creating payment
	 *
	 */
	public function complete(){
		$postdata = $_POST;
		file_put_contents($_SERVER['DOCUMENT_ROOT'].'/payumoney_result.txt', json_encode($postdata));
		if (isset($postdata ['key'])) {
			$key				=   $postdata['key'];
			$salt				=   $postdata['salt'];
			$txnid 				= 	$postdata['txnid'];
		    $amount      		= 	$postdata['amount'];
			$productInfo  		= 	$postdata['productinfo'];
			$firstname    		= 	$postdata['firstname'];
			$email        		=	$postdata['email'];
			$udf5				=   $postdata['udf5'];
			$mihpayid			=	$postdata['mihpayid'];
			$status				= 	$postdata['status'];
			$resphash		    = 	$postdata['hash'];
			//Calculate response hash to verify	
			$keyString 	  		=  	$key.'|'.$txnid.'|'.$amount.'|'.$productInfo.'|'.$firstname.'|'.$email.'|||||'.$udf5.'|||||';
			$keyArray 	  		= 	explode("|",$keyString);
			$reverseKeyArray 	= 	array_reverse($keyArray);
			$reverseKeyString	=	implode("|",$reverseKeyArray);
			$CalcHashString 	= 	strtolower(hash('sha512', $salt.'|'.$status.'|'.$reverseKeyString));

			$exists_txnid = $this->model->get('id', $this->tb_transaction_logs, ['transaction_id' => $txnid, 'uid' => session('uid')]);

			$signature = $key.":".$postdata['amount'].":".$txnid;
			if($status == 'success'  && session('signature') == md5($signature) && empty($exists_txnid)) {
				$currency_rate_to_usd = get_option('payumoney_currency_rate_to_usd');
				$amount = round(($postdata['amount'] / $currency_rate_to_usd), 2);
				/*----------  Insert to Transaction table  ----------*/
				$data = array(
					"ids" 				=> ids(),
					"uid" 				=> session("uid"),
					"type" 				=> $this->payment_type,
					"transaction_id" 	=> $txnid,
					"amount" 	        => $amount,
					"created" 			=> NOW,
				);

				$this->db->insert($this->tb_transaction_logs, $data);
				$transaction_id = $this->db->insert_id();

				/*----------  Add funds to user balance  ----------*/
				$user_balance = get_field($this->tb_users, ["id" => session("uid")], "balance");

				/*----------  Convert to USD  ----------*/
				$chagre_fee  = get_option('payumoney_chagre_fee');
				$real_amount = ($postdata['amount'] * 100)/(100 + $chagre_fee);
				$user_balance += round(($real_amount/$currency_rate_to_usd), 2);
				$this->db->update($this->tb_users, ["balance" => $user_balance], ["id" => session("uid")]);
				
				unset_session("amount");
				unset_session("signature");
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

			} else {
				redirect(cn("add_funds/unsuccess"));
			}
		}else{
			redirect(cn("add_funds/unsuccess"));
		}
	}
}
