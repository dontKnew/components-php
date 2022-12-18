<?php

if(!function_exists('apis_list')){
	function apis_list($type = ""){
		$apis = array(
			'standard'    => "Standard (JAP, Perfectpanel, Smartpanel)",
			'indusrabbit' => "Type 2 (indusrabbit, Indiansmartpanel)",
			'yoyomedia'   => "Type 3 (Yoyomedia)",
			'instasmm'    => "Type 4 (Instasmm)",
		);
		return $apis;
	}
}