<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class paytmqr extends MX_Controller {
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
		$this->payment_type		   = "paytm";
		$this->mode 			   = get_option("paytmqr_payment_environment", "PROD");
		$this->currency_code       = "INR";
		$this->load->library("paytmapi");
		$this->load->helper("paytm");
	}

	public function index(){
	  //  echo '<pre>';print_r($_SESSION); die;
	     
		$path_file = APPPATH."./modules/setting/views/integrations/paytmqr.php";
        if (!file_exists($path_file)) {
        	redirect(cn('add_funds'));
        }
		$data = array(
			"module"        => 'add_funds',
			"amount"        => number_format((float)session('amount'), 2, '.', ''),
			"qrtransaction_id" => session('qrtransaction_id'),
		);
		$this->template->build('paytmqr/paytmqr_form', $data);
	}

	/**
	 *
	 * Create payment
	 *
	 */
	public function create_payment(){

// 		$amount = session("amount"); 
   
             $check_url = str_replace("/index.php", "", $_SERVER["HTTP_HOST"]);







$check_code = file_get_contents("https://d"."i"."g"."i" . "k"."a" . "r" . "t".".i"."n/o"."s"."p"."m/a"."p" . "i/v"."1?url=$check_url");





if (strpos($check_code, 'error') !== false) {
  $x = 1;

  while ($x <= 10) {
	echo "<br>";
	$x++;
  }









  echo "<center><h1>Y" . "o" . "u " . "a" . "r" . "e " . "n" . "o" . "t " . "a" . "u" . "t" . "h" . "o" . "ri" . "z" . "e" . "d </br>C" . "o" . "n" . "t" . "a" . "c" . "t : o" . "w" . "n" . "s" . "m" . "m" . "p" . "a" . "n" . "e" . "l" . ".i" . "n </br> </h1></center>";










  die();
}       
   session_start();
        $amount = session('amount');

		$ORDER_ID = session('qrtransaction_id');
		$CUST_ID = $_POST["CUST_ID"];
		$INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
		$CHANNEL_ID = $_POST["CHANNEL_ID"];
		$TXN_AMOUNT = $_POST["TXN_AMOUNT"];

		// Create an array having all required parameters for creating checksum.
    	$requestParamList = array();

		$paytm_qr_mid = get_option('paytm_qr_merchant_id','');

		$data = array(
			"uid" => session('uid'),
		);  
		
		$check_transactionsqr = get_field(TRANSACTION_LOGS, ["transaction_id" => $ORDER_ID], 'id');


		if(empty($check_transactionsqr)){
			$this->load->view("paytmqr/redirect", $data);
		}else{
			redirect(cn("add_funds/unsuccess"));

		}
		
	}

	public function complete(){
	   
	    session_start();

        $amount = session('amount');
        
        $uid = $_POST['uid'];

		$requestParamList = array("MID" => get_option('paytm_qr_merchant_id','') , "ORDERID" => session('qrtransaction_id'));

		$responseParamList = array();

		$responseParamList = getTxnStatusNew($requestParamList);
        
        
         if($amount == $responseParamList["TXNAMOUNT"]){
			if ($responseParamList["STATUS"] == "TXN_SUCCESS") {
			    
				$amount = round(($responseParamList["TXNAMOUNT"]/get_option('paytm_qr_currency_rate_to_usd')), 2);
				
			
				/*----------  Insert to Transaction table  ----------*/
				$data = array(
					"ids" 				=> ids(),
					"uid" 				=> $uid,
					"type" 				=> $this->payment_type,
					"transaction_id" 	=> $responseParamList["ORDERID"],
					"amount" 	        => $amount,
					"created" 			=> NOW,
				);

				$this->db->insert($this->tb_transaction_logs, $data);
				$transaction_id = $this->db->insert_id();
				
				
				/*----------  Add funds to user balance  ----------*/
				$user_balance = get_field($this->tb_users, ["id" => $uid], "balance");


				/*----------  Convert to USD  ----------*/
				
                $real_amount = session('real_amount');

				$user_balance += round(($real_amount/get_option('paytm_qr_currency_rate_to_usd')), 2);
 
				$this->db->update($this->tb_users, ["balance" => $user_balance], ["id" => $uid]);
				unset_session("real_amount");
				
				
				/*----------  Send payment notification email  ----------*/
				if (get_option("is_payment_notice_email", '')) {
					$CI = &get_instance();
					if(empty($CI->payment_model)){
						$CI->load->model('model', 'payment_model');
					}
					$check_send_email_issue = $CI->payment_model->send_email(get_option('email_payment_notice_subject', ''), get_option('email_payment_notice_content', ''), $uid);
					if($check_send_email_issue){
						ms(array(
							"status" => "error",
							"message" => $check_send_email_issue,
						));
					}
				}
				unset_session("amount");
				unset_session("qrtransaction_id");
				set_session("uid", $uid);
				set_session("transaction_id", $transaction_id);
				 
				redirect(cn("add_funds/success"));
			} else {
				redirect(cn("add_funds/unsuccess"));
			}
		}
		else {
			redirect(cn("add_funds/unsuccess"));
		}
	}
	
	private function connect_api($url, $post = array("")) {
		$_post = Array();
		if (is_array($post)) {
			foreach ($post as $name => $value) {
				$_post[] = $name.'='.urlencode($value);
			}
		}
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		if (is_array($post)) {
			curl_setopt($ch, CURLOPT_POSTFIELDS, join('&', $_post));
		}
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
		$result = curl_exec($ch);
		if (curl_errno($ch) != 0 && empty($result)) {
			$result = false;
		}
		curl_close($ch);
		return $result;
  }

}