<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-8">            
<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">New Exercise</h3>
</div>

<div class="panel-body">
<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="form-group">

   <label class="control-label">Title</label>
   <input type="text" value="" maxlength="80" placeholder="Title" name="exercise_title" class="form-control" required="">

   <label class="control-label">Steps</label>
   <textarea type="text" value="" placeholder="Steps" class="form-control" name="exercise_steps" id="steps" required=""></textarea>

   <label class="control-label">Equipment</label>
   <select class="form-control" name="exercise_equipment" required="">
    <?php foreach($equipment_lists as $equipment_list): ?>
   <option value="<?php echo $equipment_list['equipment_id']; ?>"><?php echo $equipment_list['equipment_name']; ?></option>
    <?php endforeach; ?>
   </select>
  
   
   <label class="control-label">Muscles Involved</label>
   <select multiple="multiple" class="my-select form-control" name="bodypart_id[]" required="">
    <?php foreach($bodypart_lists as $bodypart_list): ?>
   <option data-img-src="<?php echo SITE_URL ?>/images/<?php echo $bodypart_list['bodypart_thumbnail']; ?>" value="<?php echo $bodypart_list['bodypart_id']; ?>"><?php echo $bodypart_list['bodypart_name']; ?></option>
    <?php endforeach; ?>
   </select>

   <label class="control-label">Difficulty Level</label>
   <select class="form-control" name="exercise_dificult" required="">
   <option value="Beginner">Beginner</option>
   <option value="Intermediate">Intermediate</option>
   <option value="Advanced">Advanced</option>
   </select>

   <label class="control-label">Time</label>
   <input type="number" value="" placeholder="Time" name="exercise_time" class="form-control" required="">

   <label class="control-label">Sets</label>
   <input type="number" value="" placeholder="Sets" name="exercise_sets" class="form-control" required="">

   <label class="control-label">Reps</label>
   <input type="number" value="" placeholder="Reps" name="exercise_reps" class="form-control" required="">

   <label class="control-label">Youtube Video ID</label>
   <input type="text" value="" placeholder="Youtube Video ID" name="exercise_video" class="form-control" required="">
   
   <label class="control-label">Featured Image</label>
   <input name="exercise_image" class="input-file" type="file">
   <span class="text-danger">Recommended size: <b>1280 x 720 Pixels</b> </span>

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
<script type="text/javascript"> CKEDITOR.replace( 'steps' ); </script>
</div>
