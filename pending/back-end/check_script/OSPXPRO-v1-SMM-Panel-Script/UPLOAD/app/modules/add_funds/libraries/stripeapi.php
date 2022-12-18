<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once('stripe/autoload.php');

/**
 * 
 */
class stripeapi{
	
	public function __construct($stripe_secret_key = null, $stripe_publishable_key = null, $mode = "") {
	    \Stripe\Stripe::setApiKey($stripe_secret_key);
	}

	/**
	 *
	 * Block comment
	 *
	 */
	public function customer_create($data_buyer = ""){
		if (is_array($data_buyer)) {
			$result = \Stripe\Customer::create($data_buyer);
		}
		return $result;
	}

	/**
	 *
	 * Define Payment && Create payment.
	 *
	 */
	public function create_payment($data_charge = ""){
		$result = array();
		if (is_array($data_charge)) {
			try {
			    //retrieve charge details
				$response = \Stripe\Charge::create($data_charge);
				if ($response->paid == 1 && $response->amount_refunded == 0) {
					$result = (object)array(
						"status"      => "success",
						"response"    => $response,
					);
				}else{
					$result = (object)array(
						"status" 		=> "error",
						"response"      => 'There was some wrong with your request',
					);
				}
			} catch (Twocheckout_Error $e) {
				$result = (object)array(
					"status" => "error",
					"message" => "Transaction has been failed",
				);
			}
			return $result;
		}else{
			redirect(cn("add_funds"));
		}
	}
}


