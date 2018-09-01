<?php

session_destroy();
// echo $home_url = 'http://' . $_SERVER['HTTP_HOST']. '/fitness';

echo "<script>
		window.location.href = '/fitness';
		</script>";
exit;
?>