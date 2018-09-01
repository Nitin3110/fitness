<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-8">            
<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">Edit Diet <span class="label label-default">ID <?php echo $diet['diet_id']; ?></span></h3>
</div>

<div class="panel-body">
<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="form-group">

   <input type="hidden" value="<?php echo $diet['diet_id']; ?>" name="diet_id">

   <label class="control-label">Title</label>
   <input type="text" value="<?php echo $diet['diet_title']; ?>" placeholder="Title" name="diet_title" class="form-control" required="">

   <label class="control-label">Description</label>
   <textarea value="" name="diet_description" class="form-control" id="description" required=""><?php echo $diet['diet_description']; ?></textarea>

      <label class="control-label">List Diet</label>
   <textarea value="" name="diet_list" class="form-control" id="list" required=""><?php echo $diet['diet_list']; ?></textarea>

      <label class="control-label">Diet Type</label>
   <select class="form-control" name="diet_type" required="">
   <option value="<?php echo $diet['diet_type']; ?>" selected><?php echo $diet['diet_type']; ?></option>
   <option value="Build Muscle">Build Muscle</option>
   <option value="Lost Fat">Lost Fat</option>
   <option value="Transform">Transform</option>
   </select>  

   <label class="control-label">Calories</label>
   <input type="number" value="<?php echo $diet['diet_calories']; ?>" placeholder="Calories" name="diet_calories" class="form-control" required="">

   <label class="control-label">Carbs</label>
   <input type="number" value="<?php echo $diet['diet_carbs']; ?>" placeholder="Carbs (Grams)" name="diet_carbs" class="form-control" required="">

   <label class="control-label">Protein</label>
   <input type="number" value="<?php echo $diet['diet_protein']; ?>" placeholder="Protein (Grams)" name="diet_protein" class="form-control" required="">

   <label class="control-label">Fat</label>
   <input type="number" value="<?php echo $diet['diet_fat']; ?>" placeholder="Fat (Grams)" name="diet_fat" class="form-control" required="">


   <label class="control-label">Featured Image: <a href="<?php echo SITE_URL ?>/images/<?php echo $diet['diet_image']; ?>" data-lightbox="image-1"><?php echo $diet['diet_image']; ?></a></label>
   <input name="diet_image" class="input-file" type="file">
   <input type="hidden" value="<?php echo $diet['diet_image']; ?>" name="diet_image_save">
   <span class="text-danger">Recommended size: <b>1280 x 300 Pixels</b> </span>

   <div class="action-button">
   <input type="submit" name="update" value="Update" class="btn btn-embossed btn-primary">
   <a onclick="alertdelete();">
   <input name="trash" value="Delete" class="btn btn-embossed btn-danger" style="width: 80px;"></a>
    <script type="text/javascript">
   function alertdelete() {
   swal({ title: "Are you sure?", text: "You will not be able to recover this diet!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_diet.php?id=<?php echo $diet['diet_id']; ?>" });}
   </script>


   </div>

</div>
</form>  
</div>
</div>
</div>
<div class="col-md-4">   
<?php require'page.sidebar.view.php'; ?>  
</div>
</div>
<script> CKEDITOR.replace( 'description' ); </script>
<script> CKEDITOR.replace( 'list' ); </script>
</div>
