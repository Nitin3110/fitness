<?php

	if(isset($_SESSION['email']) && $_SESSION['email'] != '') {
		echo "<script>
		window.location.href = 'index.php?option=dashboard';
		</script>";
		exit;
	}

?>
<div class="main-w3layouts wrapper signup-layout">
		<h1 style="color:white;">SignUp Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top page-wrapper">
				<form method="post"  id="register-form">
                    <div class="row">
                        <div class="col-lg-6">
                            <input class="text" name="f_name" placeholder="First Name" required="" type="text">
                        </div>
                        <div class="col-lg-6">
                            <input class="text" name="l_name" placeholder="Last Name" required="" type="text">
                        </div>
                    </div>
					<!--<input class="text email" name="username" placeholder="Username" required="" type="text">-->
					<input class="text email" name="email" placeholder="Email" required="" type="email">
					<input class="text" name="pwd" placeholder="Password" required="" type="password">
					<input class="text w3lpass" name="c_pwd" placeholder="Confirm Password" required="" type="password">
					<input class="text" name="mobile" placeholder="Mobile" type="text">
					<input value="SIGNUP" type="submit">
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
	$('#register-form').submit(function(e) {
		e.preventDefault();
		var formData = $('#register-form').serialize();
		// alert(formData);
		$.ajax({
			url: "ajax_process/register_process.php",
			data: formData,
			type: 'post',
			dataType: 'JSON',
			success: function(response) {
				$('#error').html(response.msg);
				
				if(response.error == 0) {
					location.reload(); 
				}
			}
		});
	});
</script>