<?php

	require("../config.php");
	
	$error = 0; 
	
	if(empty($_REQUEST['pwd'])) {
		$error = 1;
	}

	if(empty($_REQUEST['email'])) {
		$error = 1;
	}
	
	if($error == 1) {
		$response['error'] = 1;
		$response['msg'] = "Error found";
	} else {

		$email = $_REQUEST['email'];
		$password = $_REQUEST['pwd'];


		$query_check = $db->query("select * from users where email = '$email' or password = '$password'");
		if($query_check->num_rows > 0) {

			$response['error'] = 0;
			$response['msg'] = 'Login successfully.';
			$result = mysqli_fetch_assoc($query_check);
			session_start();
			$_SESSION['email'] = $result['email'];


		} else {

			$response['error'] = 1;
			$response['msg'] = 'Sorry, no result found.';

		}
	}
	
	echo json_encode($response);

?>