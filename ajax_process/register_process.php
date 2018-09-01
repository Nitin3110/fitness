<?php

	require("../config.php");
	
	$error = 0; 
	
	
	if(empty($_REQUEST['f_name'])) {
		$error = 1;
		$response['msg'] = "First Name required";
	}

	if(empty($_REQUEST['l_name'])) {
		$error = 1;
		$response['msg'] = "Last Name required";
	}
	
	if(empty($_REQUEST['pwd'])) {
		$error = 1;
		$response['msg'] = "Password required";
	}
	
	if(empty($_REQUEST['c_pwd'])) {
		$error = 1;
		$response['msg'] = "Confirm Password required";
	}

	/* if(empty($_REQUEST['username'])) {
		$error = 1;
	} */
	
	if($_REQUEST['pwd'] != $_REQUEST['c_pwd']) {
		$error = 1;
		$response['msg'] = "Password and confirm password didn't match.";
	}
	
	if(!empty($_REQUEST['mobile'])) {
		if (!preg_match('/^\d{10}$/', $_REQUEST['mobile'])) {
			$error = 1;
			$response['msg'] = "Mobile number with 10 digit required";
		}
	}
	
	if($error == 1) {
		$response['error'] = 1;
	} else {


		//insert user
		$f_name = $_REQUEST['f_name'];
		$l_name = $_REQUEST['l_name'];
		// $username = $_REQUEST['username'];
		$email = $_REQUEST['email'];
		$password = $_REQUEST['pwd'];


		$query_check = $db->query("select * from users where email = '$email' or email = '$email'");
		if($query_check->num_rows > 0) {

			$response['error'] = 1;
			$response['msg'] = 'Email already exist';

		} else {

			$query_result = $db->query("insert into users (first_name, last_name, email,password) values ('$f_name', '$l_name', '$email','$password')");
			$response['error'] = 0;
			$response['msg'] = "Sign up successfully, you will be logged in now.";
			
			session_start();
			$_SESSION['email'] = $email;

		}
	}
	
	echo json_encode($response);

?>