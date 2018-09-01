<div class="container-fluid" style="margin-top:25px">
<style type="text/css">
	body{background-color: #FF9800;text-align: center;}
	.input-group-addon{background-color: #ff9800; border: 1px solid #ff9800;}
	.input-group.focus .input-group-addon { background-color: #ff9800; border-color: #ff9800; }
	.form-control, .select2-search input[type="text"]{border: 1px solid #ffffff;}
	img{display: block; width: 100%; max-width: 210px; margin-left: auto; margin-right: auto; margin-bottom: 10px;}
	.copyrights{font-size: 12px; color: #ffd69a; margin-top: 10px;}
	.copyrights a{color: #ffffff}
</style>
	<div class="row">
	
	
		<div class="col-md-4">
		</div>
		
		
<div class="col-md-4 animated fadeIn"> <!-- BLOCK INPUT  -->

<?php foreach($appsettings as $appsetting): ?>
<img src="<?php echo SITE_URL ?>/images/<?php echo $appsetting['logo_app']; ?>">
<?php endforeach; ?>

<div style="background: rgba(0, 0, 0, 0.12); padding: 25px; border-radius: 8px;max-width: 350px; margin-left: auto; margin-right: auto;">		



<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="login">    
<div class="input-group">
   <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
   <input type="text" class="form-control" name="username" placeholder="Username">
</div>
<br/>
<div class="input-group">   
   <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
   <input type="password" class="form-control" name="password" placeholder="Password">  
</div>
<br/>

<button type="submit" class="btn btn-default" onclick="login.submit()" style="width: 100%;background-color: #ff9800;">Log In</button>

<?php if( !empty($errors)): ?>

<div class="alert alert-danger animated fadeIn" role="alert" style="margin-top: 20px; margin-bottom: 0;">
    
    <?php echo $errors; ?>
    
</div>
<?php endif; ?>

</form>  

</div>
<div class="copyrights">
CopyRights <a href="https://codecanyon.net/user/wicombit/portfolio" target="_blank">Wicombit</a>
</div>
</div><!-- FINISH BLOCK INPUT  -->
		
		
		<div class="col-md-4">
		</div>
		
		
	</div>
</div>