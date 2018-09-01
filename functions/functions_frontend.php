<?php

	function assoc_data($dataArray) {
		$result = [];
		while($row = $dataArray->fetch_assoc()) {
	        $result[] = $row;
	    }
	    return $result;
	}

	function get_user_by_mail($email) {
		global $db;
		$result = $db->query("select * from users where email = '$email'");
		$result = assoc_data($result);
		return $result;
	}

?>