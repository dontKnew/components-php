<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'coinbase_commerce/autoload.php';

use CoinbaseCommerce\ApiClient;
use CoinbaseCommerce\Resources\Charge;
/**
 * coinbase
 */
class coinbase_api{
	private $cps_api;
	
	public function __construct($coinbase_api_key = null) {
		if ($coinbase_api_key != "" ) {
			ApiClient::init($coinbase_api_key);
		}
	}


	public function create_payment($data){


		$chargeObj = new Charge(
		    [
		        "description" => $data->description,
		        "metadata" => [
		            "customer_id"   => $data->uid,
		            "customer_name" => $data->email
		        ],
		        'local_price' => [
			        'amount' => $data->amount,
			        'currency' => $data->currency
			    ],
		        "name" => $data->name,
		        "payments" => [],
		        "pricing_type" => "fixed_price"
		    ]
		);

		try {
		    $chargeObj->save();
		    $redirect_url = $chargeObj->hosted_url;
		    $result = (object)array(
		    	'status'       => 'success',
		    	'redirect_url' => $redirect_url,
		    	'txn_id'       => $chargeObj->id,
		    );
		} catch (\Exception $exception) {
		    $result = (object)array(
		    	'status'  => 'error',
		    	'message' => $exception->getMessage(),
		    );
		}
		return $result;
	}

	public function get_transaction_detail_info($transaction_id){

	 	try {
	        $response = Charge::retrieve($transaction_id);
	        $result = array(
				'status' => 'success',	
				'data'   => $response,	
			);

	    } catch (\Exception $exception) {
	        $result = array(
				'status' => 'error',	
				'data'   => $exception->getMessage(),	
			);
	    }
		return (object)$result;

	} 
}





