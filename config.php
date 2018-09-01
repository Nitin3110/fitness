<?php
	crm_debug(1); // Set 0 to turn it off or 1 to make it on
	
	define("CRM_DB_HOST","something");
	define("crm_db_user","something");
	define("crm_db_pass","something");
	define("crm_db","something");
	define("SITE_URL", "http://localhost/fitness/");

	function crm_debug($status) {

		if($status != 0) {
			$status = 1;
		}
		
		if($status == 1) {
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);
		} else {
			ini_set('display_errors', 0);
			ini_set('display_startup_errors', 0);
			error_reporting(0);
		}
		
	}
	
	function pr($array) {
		echo "<pre>";
			print_r($array);
		echo "</pre>";
		exit;
	}

	require('database/database.php');
	$db = new Database;

?>