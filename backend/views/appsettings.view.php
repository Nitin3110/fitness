<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-10">

<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">App Settings</h3>
</div>

<div class="panel-body">
<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="form-group">

   <input type="hidden" value="<?php echo $appsettings['id_app']; ?>" name="id_app">
   <label class="control-label">Facebook Page URL</label>
   <input type="text" value="<?php echo $appsettings['facebook_app']; ?>" placeholder="Facebook Page URL" name="facebook_app" class="form-control" required="">

   <label class="control-label">Twitter Username</label>
   <input type="text" value="<?php echo $appsettings['twitter_app']; ?>" placeholder="Twitter Username" name="twitter_app" class="form-control" required="">

   <label class="control-label">Instagram URL</label>
   <input type="text" value="<?php echo $appsettings['instagram_app']; ?>" placeholder="Instagram URL" name="instagram_app" class="form-control" required="">

   <label class="control-label">About</label>
   <textarea type="text" maxlength="350" rows="4" placeholder="About" class="form-control" name="about_app" required=""><?php echo $appsettings['about_app']; ?></textarea>

      <label class="control-label">Terms and Conditions</label>
   <textarea type="text" placeholder="Terms and Conditions" class="form-control" id="terms" name="terms_app" required=""><?php echo $appsettings['terms_app']; ?></textarea>

   <label class="control-label">Logo: <a href="<?php echo SITE_URL ?>/images/<?php echo $appsettings['logo_app']; ?>" data-lightbox="image-1"><?php echo $appsettings['logo_app']; ?></a></label>
   <input name="logo_app" class="input-file" type="file">
   <input type="hidden" value="<?php echo $appsettings['logo_app']; ?>" name="logo_app_save">
   <span class="text-danger">Recommended size: <b>350 x 150 Pixels</b> </span>

   <div class="action-button">
   <input type="submit" name="save" value="Save" class="btn btn-embossed btn-primary">
   </div>

</div>
</form>  
</div>
</div>

</div>
<div class="col-md-2">   
<?php require'sidebar.view.php'; ?>  
</div>
</div>
<script> CKEDITOR.replace( 'terms' ); </script>
</div>