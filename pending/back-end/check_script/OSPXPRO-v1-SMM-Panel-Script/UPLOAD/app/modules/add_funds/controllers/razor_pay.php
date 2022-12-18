<?php

defined('BASEPATH') OR exit('No direct script access allowed');
 
class razor_pay extends MX_Controller {
	public $tb_users;
	public $tb_transaction_logs;
	//public $stripeapi;
	public $payment_type;
	public $currency_code;
	public $mode;

	public function __construct(){
            
		parent::__construct();
		$this->tb_users            = USERS;
		$this->tb_transaction_logs = TRANSACTION_LOGS;
		$this->payment_type		   = "razor_pay";
		$this->mode 			   = get_option("payment_environment", "");
		$this->currency_code       = (get_option("currency_code", "USD") == "")? 'USD' : get_option("currency_code", "");
	
		$this->load->model('model', 'model');
	}

	public function index(){
		redirect(cn("add_funds"));
	}

	/*
	 *
	 *
	 * Create payment
	 *
	 */
	public function create_payment(){
            //print_r($this->input->post());die;
		$amount = post("amount");
		$token  = post("razorpay_payment_id");
                
		if(!empty($token)){
			$users = session('user_current_info');
			// Item info
			$description   = lang("Balance_recharge")." - ".  $users['email'];
			$itemNumber    = 'SMMPANEL9271';
			$orderID       = "ORDS" . strtotime(NOW);

			if(strtolower($this->currency_code) == 'jpy') {
				$charge = $amount;
			}else{
				$charge = $amount*100;
			}
                        
                       
                        $capture_payment = $this->capture_payment_razorpay($token,$amount);
                       if($capture_payment->status=='captured')
                       {
                           
				if (strtolower($this->currency_code) == 'jpy') {
					$tx_amount = $capture_payment->amount;
				}else{
					$tx_amount = $capture_payment->amount/100;
				}
                                $data = array(
					"ids" 				=> ids(),
					"uid" 				=> session("uid"),
					"type" 				=> $this->payment_type,
					"transaction_id"                => $capture_payment->id,
					"amount"                        => $tx_amount,
					"created" 			=> NOW,
				);
                                $this->db->insert($this->tb_transaction_logs, $data);
				$transaction_id = $this->db->insert_id();
                                 // echo $transaction_id; die;
				/*----------  Add funds to user balance  ----------*/
				$user_balance = get_field($this->tb_users, ["id" => session("uid")], "balance");
                                
				$chagre_fee    = get_option('razor_pay_chagre_fee');
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
                       }
                       else{
				redirect(cn("add_funds/unsuccess"));
			}
	
		}else{
			redirect(cn("add_funds"));
		}
	}
        
        public function capture_payment_razorpay($transaction_id,$amount)
        {
           $razorpayClientID =get_option('razor_pay_publishable_key');
           $razorpaySecret= get_option('razor_pay_secret_key');
             $ch = curl_init();
                
                curl_setopt($ch, CURLOPT_URL,'https://api.razorpay.com/v1/payments/'.$transaction_id.'/capture');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "amount=".($amount*100)."&currency=".$this->currency_code);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_USERPWD, $razorpayClientID.":".$razorpaySecret);

                $headers = array();
                $headers[] = 'Content-Type: application/x-www-form-urlencoded';
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $result = curl_exec($ch);
                if(curl_errno($ch)) {
                    echo 'Error:' . curl_error($ch); die;
                }
                curl_close($ch);
                //echo $result; die;
                //return JSON_DECODE($result);
                return JSON_DECODE($result); 
        }
}