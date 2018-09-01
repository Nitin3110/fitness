<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-8">            
<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">New Diet</h3>
</div>

<div class="panel-body">
<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="form-group">

   <label class="control-label">Title</label>
   <input type="text" value="" placeholder="Title" name="diet_title" class="form-control" required="">

   <label class="control-label">Description</label>
   <textarea value="" name="diet_description" class="form-control" id="description" required=""></textarea>

      <label class="control-label">Diet List</label>
   <textarea value="" name="diet_list" class="form-control" id="list" required=""></textarea>

      <label class="control-label">Diet Type</label>
   <select class="form-control" name="diet_type" required="">
   <option value="Build Muscle">Build Muscle</option>
   <option value="Lost Fat">Lost Fat</option>
   <option value="Transform">Transform</option>
   </select>  

   <label class="control-label">Calories</label>
   <input type="number" value="" placeholder="Calories" name="diet_calories" class="form-control" required="">

   <label class="control-label">Carbs</label>
   <input type="number" value="" placeholder="Carbs (Grams)" name="diet_carbs" class="form-control" required="">

   <label class="control-label">Protein</label>
   <input type="number" value="" placeholder="Protein (Grams)" name="diet_protein" class="form-control" required="">

   <label class="control-label">Fat</label>
   <input type="number" value="" placeholder="Fat (Grams)" name="diet_fat" class="form-control" required="">

   <label class="control-label">Image</label>
   <input name="diet_image" class="input-file" type="file" required="">
   <span class="text-danger">Recommended size: <b>1280 x 300 Pixels</b> </span>

   <div class="action-button">
   <input type="submit" name="save" value="Save" class="btn btn-embossed btn-primary">
   <input type="reset" name="reset" value="Reset" class="btn btn-embossed btn-danger">
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
<script type="text/javascript"> CKEDITOR.replace( 'description' ); </script>
<script type="text/javascript"> CKEDITOR.replace( 'list' ); </script>
</div>
