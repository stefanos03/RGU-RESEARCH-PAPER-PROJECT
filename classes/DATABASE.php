<?php

class DATABASE{

	private static $_instance=null;
	private $_pdo, 
			$_query,
			$_error = false,
			$_results,
			$_count=0; 

	private $server = 'csdm-webdev';
	private $username = '1909248';
	private $password = '1909248';
	private $dbname = 'db1909248_research';

	public function connect()
	{
		$mysqli = new mysqli($this->server,$this->username,$this->password,$this->dbname);

		return $mysqli;		
	}

//hi test
}

?>