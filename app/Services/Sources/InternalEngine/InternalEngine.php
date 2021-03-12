<?php 

namespace App\Services\Sources\InternalEngine;

use App\Services\Sources\Manager;

class InternalEngine extends Manager
{
	var $_url;
	
	public function __construct()
	{
		// set db connection string
		$this->_db 	= $this->connect();
	}

	public function connect()
	{
		return array();	// db connection
	}
}