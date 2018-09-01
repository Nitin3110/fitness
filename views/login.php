<?php

	if(isset($_SESSION['email']) && $_SESSION['email'] != '') {
		echo "<script>
		window.location.href = 'index.php?option=dashboard';
		</script>";
		exit;
	}

?>

<div class="main-w3layouts wrapper signup-layout">
		<h1 style="color:white;">Login Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top"> 
				<form method="post"  id="login-form"> 
					<input class="text email" name="email" placeholder="email" required="" type="text">
					<input class="text" name="pwd" placeholder="Password" required="" type="password">
					<input value="LOGIN" type="submit">
				</form>
				<div id="error"></div>
				<!-- <p>Don't have an Account? <a href="#"> Login Now!</a></p> -->
			</div>	 
		</div>	
		
		<ul class="w3lsg-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>

	<script>
	$('#login-form').submit(function(e) {
		e.preventDefault();
		var formData = $('#login-form').serialize();
		// alert(formData);
		$.ajax({
			url: "ajax_process/login_process.php",
			data: formData,
			type: 'post',
			dataType: 'JSON',
			success: function(response) {
				if(response.error == 1) {
					$('#error').html(response.msg);
				} else {
					location.reload(); 
				}
			}
		});
	});
</script>