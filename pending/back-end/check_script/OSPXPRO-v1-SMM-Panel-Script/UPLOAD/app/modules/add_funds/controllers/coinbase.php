<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class coinbase extends MX_Controller {
	public $tb_users;
	public $tb_transaction_logs;
	public $payment_type;
	public $currency_code;
	public $charge_fee;
	public $mode;

	public function __construct(){
		parent::__construct();
		$this->tb_users            = USERS;
		$this->tb_transaction_logs = TRANSACTION_LOGS;
		$this->payment_type		   = "coinbase";
		$this->currency_code       = (get_option("currency_code", "USD") == "")? 'USD' : get_option("currency_code", "");
		$this->load->library("coinbase_api");
		$this->coinbase_api = new coinbase_api(get_option("coinbase_api_key"));
	}

	public function index(){
		redirect(cn('add_funds'));
	}

	/**
	 *
	 * Create payment
	 *
	 */
	 
	 
	 
	public function create_payment($data){

		if (!isset($data['amount'])) {
			redirect(cn('statistics'));
		}
		
		$amount = $data['amount'];
		if (!empty($amount) && $amount > 0) {
			$website_name = get_option('website_name');
			$users = session('user_current_info');
			$data = (object)array(
				"uid" 		    => session('uid'),
				"email" 		=> $users['email'],
				"amount" 		=> $amount,
				"name" 		    => $website_name,
				"currency" 		=> 'USD',
				"description" 	=> lang('Deposit_to_').$website_name. ' ('.$users['email'].')',
			);	
			$result = $this->coinbase_api->create_payment($data);
			if (isset($result) && $result->status == 'success') {
				$pricing = $result->response->pricing;
				$data = array(
					"ids" 				=> ids(),
					"uid" 				=> session("uid"),
					"type" 				=> $this->payment_type,
					"transaction_id" 	=> $result->txn_id,
					"amount" 	        => $amount,
					"status" 	        => 0,
					"created" 			=> NOW,
				);
				$this->db->insert($this->tb_transaction_logs, $data);
				unset_session("amount");
				unset_session("real_amount");
				$this->load->view($this->payment_type.'/redirect', ['redirect_url' => $result->redirect_url]);
			}else{
				redirect(cn("add_funds/unsuccess"));
			}
		}else{
			redirect(cn());
		}
	}
	


	public function cron(){
		$this->load->model('model', 'help_model');
		$transaction_ids = $this->help_model->fetch('ids, uid, transaction_id, amount', $this->tb_transaction_logs, ['status' => 0, 'type' => $this->payment_type]);
		if (!empty($transaction_ids)) {
			foreach ($transaction_ids as $key => $row) {
				$result = $this->coinbase_api->get_transaction_detail_info($row->transaction_id);
				if ($result->status == 'success') {
					$timelines = $result->data->timeline;
					
					$tx_status = 0;
					foreach ($timelines as $key => $timeline) {

						if ($timeline['status'] == "COMPLETED") {
							$tx_status = 1;
							break;
						}

						if ($timeline['status'] == "CANCELED" || $timeline['status'] == "EXPIRED") {
							$tx_status = -1;
							break;
						}

					}

					if ($tx_status == 1) {
						$real_amount = ($row->amount * 100)/(100 + get_option('coinbase_chagre_fee', 1));
						$user_balance = get_field($this->tb_users, ["id" => $row->uid], "balance");
						$user_balance += $real_amount;
						$this->db->update($this->tb_users, ["balance" => $user_balance], ["id" => $row->uid]);
					}

					if ($tx_status == 1 || $tx_status == -1) {
						$this->db->update($this->tb_transaction_logs, ['status' => $tx_status], ['ids' => $row->ids, 'type' => $this->payment_type]);
					}

				}
			}
		}else{
			echo "There is no Transaction at the present<br>";
		}
		echo "Successfully";
	}
}


