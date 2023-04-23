<?php 

/**
 *
 * Currency function for paypal
 *
 */
if (!function_exists("currency_codes")) {
	function currency_codes(){
		$data = array(
			"AUD" => "Australian dollar",
			"BRL" => "Brazilian dollar",
			"CAD" => "Canadian dollar",
			"CZK" => "Czech koruna",
			"DKK" => "Danish krone",
			"EUR" => "Euro",
			"HKD" => "Hong Kong dollar",
			"HUF" => "Hungarian forint",
			"INR" => "Indian rupee",
			"ILS" => "Israeli",
			"JPY" => "Japanese yen",
			"MYR" => "Malaysian ringgit",
			"MXN" => "Mexican peso",
			"TWD" => "New Taiwan dollar",
			"NZD" => "New Zealand dollar",
			"NOK" => "Norwegian krone",
			"PHP" => "Philippine peso",
			"PLN" => "Polish złoty",
			"GBP" => "Pound sterling",
			"RUB" => "Russian ruble",
			"SGD" => "Singapore dollar",
			"SEK" => "Swedish krona",
			"CHF" => "Swiss franc",
			"THB" => "Thai baht",
			"USD" => "United States dollar",
		);

		return $data;
	}
}

if (!function_exists("currency_format")) {
	function currency_format($number, $number_decimal = "", $decimalpoint = "", $separator = ""){
		$decimal = 2;

		if ($number_decimal == "") {
			$decimal = get_option('currency_decimal', 2);
		}else{
			$decimal = $number_decimal;
		}

		if ($decimalpoint == "") {
			$decimalpoint = ".";
		}

		if ($separator == "") {
			$separator = ",";
		}	

		$number = number_format($number, $decimal, $decimalpoint, $separator);
		return $number;
	}
}

if (!function_exists("currency_format")) {
	function local_currency_code(){
		$data = array(   
		      	'USD',
			    'EUR',
			    'JPY',
			    'GBP',
			    'AUD',
			    'CAD',
			    'CHF',
			    'CNY',
			    'SEK',
			    'NZD',
			    'MXN',
			    'SGD',
			    'HKD',
			    'NOK',
			    'KRW',
			    'TRY',
			    'RUB',
			    'INR',
			    'BRL',
			    'ZAR',
			    'AED',
			    'AFN',
			    'ALL',
			    'AMD',
			    'ANG',
			    'AOA',
			    'ARS',
			    'AWG',
			    'AZN',
			    'BAM',
			    'BBD',
			    'BDT',
			    'BGN',
			    'BHD',
			    'BIF',
			    'BMD',
			    'BND',
			    'BOB',
			    'BSD',
			    'BTN',
			    'BWP',
			    'BYN',
			    'BZD',
			    'CDF',
			    'CLF',
			    'CLP',
			    'COP',
			    'CRC',
			    'CUC',
			    'CUP',
			    'CVE',
			    'CZK',
			    'DJF',
			    'DKK',
			    'DOP',
			    'DZD',
			    'EGP',
			    'ERN',
			    'ETB',
			    'FJD',
			    'FKP',
			    'GEL',
			    'GGP',
			    'GHS',
			    'GIP',
			    'GMD',
			    'GNF',
			    'GTQ',
			    'GYD',
			    'HNL',
			    'HRK',
			    'HTG',
			    'HUF',
			    'IDR',
			    'ILS',
			    'IMP',
			    'IQD',
			    'IRR',
			    'ISK',
			    'JEP',
			    'JMD',
			    'JOD',
			    'KES',
			    'KGS',
			    'KHR',
			    'KMF',
			    'KPW',
			    'KWD',
			    'KYD',
			    'KZT',
			    'LAK',
			    'LBP',
			    'LKR',
			    'LRD',
			    'LSL',
			    'LYD',
			    'MAD',
			    'MDL',
			    'MGA',
			    'MKD',
			    'MMK',
			    'MNT',
			    'MOP',
			    'MRO',
			    'MUR',
			    'MVR',
			    'MWK',
			    'MYR',
			    'MZN',
			    'NAD',
			    'NGN',
			    'NIO',
			    'NPR',
			    'OMR',
			    'PAB',
			    'PEN',
			    'PGK',
			    'PHP',
			    'PKR',
			    'PLN',
			    'PYG',
			    'QAR',
			    'RON',
			    'RSD',
			    'RWF',
			    'SAR',
			    'SBD',
			    'SCR',
			    'SDG',
			    'SHP',
			    'SLL',
			    'SOS',
			    'SRD',
			    'SSP',
			    'STD',
			    'SVC',
			    'SYP',
			    'SZL',
			    'THB',
			    'TJS',
			    'TMT',
			    'TND',
			    'TOP',
			    'TTD',
			    'TWD',
			    'TZS',
			    'UAH',
			    'UGX',
			    'UYU',
			    'UZS',
			    'VEF',
			    'VND',
			    'VUV',
			    'WST',
			    'XAF',
			    'XAG',
			    'XAU',
			    'XCD',
			    'XDR',
			    'XOF',
			    'XPD',
			    'XPF',
			    'XPT',
			    'YER',
			    'ZMW',
			    'ZWL',
		);
		return $data;
	}

}
