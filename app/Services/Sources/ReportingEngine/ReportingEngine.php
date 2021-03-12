<?php 

namespace App\Services\Sources\ReportingEngine;

use App\Services\Sources\Manager;

class ReportingEngine extends Manager
{
	var $_url;
	
	public function __construct()
	{
		// set reporting engine API URL
		$this->_url 	= "https://focus.freshtrak.com/api/v1/";
	}

	public function api($data=array())
	{
		// initialize variables
		$url 			= $this->_url;
	
		// generate query string from post_data
		$query_string 	= http_build_query($data);

		// initialize curl
		$ch = curl_init();
		
		// set parameters
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 1000); //timeout in seconds		

		// run cUrl
		$response	= curl_exec ($ch);

		curl_close($ch);

		return $response;
	}
}