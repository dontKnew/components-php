<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class paytmapi{
	
	public function __construct($paytm_merchant_key = null, $paytm_merchant_mid = null, $mode = "", $website_name = null) {

		if ($mode != "" && $paytm_merchant_key != "" && $paytm_merchant_mid != "" && $website_name != "") {
			define('PAYTM_ENVIRONMENT', $mode);
			define('PAYTM_MERCHANT_KEY', $paytm_merchant_key);
			define('PAYTM_MERCHANT_MID', $paytm_merchant_mid);
			define('PAYTM_MERCHANT_WEBSITE', $website_name);

			$PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/order/status';
			$PAYTM_TXN_URL='https://securegw.paytm.in/order/process';
			if (PAYTM_ENVIRONMENT == 'PROD') {
				$PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/order/status';
				$PAYTM_TXN_URL='https://securegw.paytm.in/order/process';
			}
			define('PAYTM_REFUND_URL', '');
			define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
			define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
			define('PAYTM_TXN_URL', $PAYTM_TXN_URL);
		}
	}

}


