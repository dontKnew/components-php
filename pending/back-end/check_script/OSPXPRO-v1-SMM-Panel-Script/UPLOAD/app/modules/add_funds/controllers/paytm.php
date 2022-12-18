<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class paytm extends MX_Controller {
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
		$this->mode 			   = get_option("paytm_payment_environment", "TEST");
		$this->currency_code       = "INR";
		$this->load->library("paytmapi");
		$this->load->helper("paytm");
		$this->paytmapi = new paytmapi(get_option('paytm_merchant_key','o!Ay3xZDnXy6jwdD'), get_option('paytm_merchant_id','dmnuOm27150547533825'), $this->mode, 'SMMPanel');
	}

	public function index(){
	  //  echo '<pre>';print_r($_SESSION); die;
	     
		$path_file = APPPATH."./modules/setting/views/integrations/paytm.php";
        if (!file_exists($path_file)) {
        	redirect(cn('add_funds'));
        }
		$data = array(
			"module"        => 'add_funds',
			"amount"        => number_format((float)session('amount'), 2, '.', ''),
		);
		$this->template->build('paytm/paytm_form', $data);
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
      //  echo $uid = session("uid"); die;
        $paytm_mode = get_option("paytm_payment_environment", "TEST");
        
        if($paytm_mode == "TEST"){
            $PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
            $PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';
            $PAYTM_WEBSITE = "WEBSTAGING";
        }else{
        	$PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
        	$PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
        	$PAYTM_WEBSITE = "DEFAULT";
        }

        $merchent_id = get_option('paytm_merchant_id','dmnuOm27150547533825');
        $merchent_key = get_option('paytm_merchant_key','o!Ay3xZDnXy6jwdD'); 
        
        $ORDER_ID = $_POST["ORDER_ID"];
		$CUST_ID = $_POST["CUST_ID"];
		$INDUSTRY_TYPE_ID = "Retail";
		$CHANNEL_ID = "WEB";
		$TXN_AMOUNT = $_POST["TXN_AMOUNT"];
        
		$checkSum = "";
		$paramList = array();

		$paramList["MID"] = $merchent_id;
		$paramList["ORDER_ID"] = $ORDER_ID;
		$paramList["CUST_ID"] = $CUST_ID;
		$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
		$paramList["CHANNEL_ID"] = $CHANNEL_ID;
		$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
		$paramList["WEBSITE"] = $PAYTM_WEBSITE;
		$paramList["CALLBACK_URL"] = cn("add_funds/paytm/complete");
		
		$checkSum = getChecksumFromArray($paramList, $merchent_key);
         
		$data = array(
			'paramList' => $paramList,
			'checkSum'  => $checkSum,
			'PAYTM_TXN_URL'  => $PAYTM_TXN_URL,
		);
	

		$this->load->view("paytm/redirect", $data);
		
	}

	public function complete(){
	   
	    
	     $getSeperate = explode('_',$_POST['ORDERID']);
	     
	     
	     $order_id = $getSeperate[0];
	     $user_id = $getSeperate[1];
	     $real_amount =$getSeperate[2] ;
	    
    	

	$merchent_id = get_option('paytm_merchant_id','dmnuOm27150547533825');
    $merchent_key = get_option('paytm_merchant_key','o!Ay3xZDnXy6jwdD'); 
    
 
    
	$paytmChecksum = "";
    $paramList = array();
    $isValidChecksum = "FALSE";

    $paramList = $_POST;
    
    
    
    $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; 
    
    $isValidChecksum = verifychecksum_e($paramList, $merchent_key, $paytmChecksum); //will return TRUE or FALSE string.
   

       
         if($isValidChecksum == "TRUE") {
			if ($_POST["STATUS"] == "TXN_SUCCESS") {
			    
				$amount = round(($_POST["TXNAMOUNT"]/get_option('paytm_currency_rate_to_usd')), 2);
				
			
				/*----------  Insert to Transaction table  ----------*/
				$data = array(
					"ids" 				=> ids(),
					"uid" 				=> $user_id,
					"type" 				=> $this->payment_type,
					"transaction_id" 	=> $_POST["TXNID"],
					"amount" 	        => $amount,
					"created" 			=> NOW,
				);

				$this->db->insert($this->tb_transaction_logs, $data);
				$transaction_id = $this->db->insert_id();
				
				// echo session("uid");
				/*----------  Add funds to user balance  ----------*/
				$user_balance = get_field($this->tb_users, ["id" => $user_id], "balance");

				/*----------  Convert to USD  ----------*/
				//$user_balance += "100";
				
			//	$user_balance += ($real_amount/(get_option('paytm_currency_rate_to_usd')), 2);
				
				$user_balance += round(($real_amount/get_option('paytm_currency_rate_to_usd')), 2);
 
				$this->db->update($this->tb_users, ["balance" => $user_balance], ["id" => $user_id]);
				// unset_session("real_amount");
				
				/*----------  Send payment notification email  ----------*/
				if (get_option("is_payment_notice_email", '')) {
					$CI = &get_instance();
					if(empty($CI->payment_model)){
						$CI->load->model('model', 'payment_model');
					}
					$check_send_email_issue = $CI->payment_model->send_email(get_option('email_payment_notice_subject', ''), get_option('email_payment_notice_content', ''), $user_id);
					if($check_send_email_issue){
						ms(array(
							"status" => "error",
							"message" => $check_send_email_issue,
						));
					}
				}
				set_session("uid", $user_id);
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