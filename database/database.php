<?php


class Database {
	
	var $database_host = CRM_DB_HOST;
	var $database_name = crm_db;
	var $database_user = crm_db_user;
	var $database_pass = crm_db_pass;
	var $con;
	
	public function __construct() {
		$database_host = 'localhost';
		$database_name = 'fitness_db';
		$database_user = 'root';
		$database_pass = '';
		$this->con = mysqli_connect($database_host,$database_user,$database_pass,$database_name);
		// Check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
    
		// return $this->con;
	}
	
	function query($stmt) {
		$result = mysqli_query($this->con,$stmt);
		return $result;
	}
	
}

?>