<?php

// echo $_SERVER['REQUEST_URI'];
// echo "<pre>";
// 	print_r($_REQUEST);
// echo "</pre>";

// require 'functions/functions.php';
if(isset($_REQUEST['option'])) {
	$option = $_REQUEST['option'];
} else {
	$option = '';
}

check_login(['dashboard']);

function check_login($cases) {
	if(!isset($_SESSION) && !in_array($_REQUEST['option'], $cases)) {
		pr("you are logged in");
	} else {
		// include("views/logout.php");
			break;
	}
}

	switch($option) {
			
		case "signup":
			include("views/signup.php");
			break;

		case "login":
			include("views/login.php");
			break;

		case "dashboard":
			include("views/dashboard.php");
			break;

		case "profile":
			include("views/profile.php");
			break;

		case "logout":
			include("views/logout.php");
			break;
		
		default:
			include("views/home.php");
			break;
	}

?>