<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-8">            
<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">Edit Exercise <span class="label label-default">ID <?php echo $exercise['exercise_id']; ?></span></h3>
</div>

<div class="panel-body">
<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="form-group">

   <input type="hidden" value="<?php echo $exercise['exercise_id']; ?>" name="exercise_id">
   <label class="control-label">Title</label>
   <input type="text" maxlength="80" value="<?php echo $exercise['exercise_title']; ?>" name="exercise_title" class="form-control" required>

   <label class="control-label">Steps</label>
   <textarea type="text" class="form-control" name="exercise_steps" id="steps" required><?php echo $exercise['exercise_steps']; ?></textarea>

   <label class="control-label">Equipments</label>
   <select class="form-control" name="exercise_equipment" required>
   <option value="<?php echo $exercise['exercise_equipment']; ?>" selected><?php echo $exercise['equipment_name']; ?></option>
    <?php foreach($equipment_lists as $equipment_list): ?>
   <option value="<?php echo $equipment_list['equipment_id']; ?>"><?php echo $equipment_list['equipment_name']; ?></option>
    <?php endforeach; ?>
   </select>
  
   
   <label class="control-label">Muscles Involved</label>
   <select multiple="multiple" class="my-select form-control" name="bodypart_id[]" required>

 <?php foreach($bodyparts_selected as $bodypart_selected): ?>

  <option data-img-src="<?php echo SITE_URL ?>/images/<?php echo $bodypart_selected['bodypart_thumbnail']; ?>" value="<?php echo $bodypart_selected['bodypart_id']; ?>" selected><?php echo $bodypart_selected['bodypart_name']; ?></option>

<?php endforeach; ?>

<?php foreach($bodyparts_not_selected as $bodypart_not_selected): ?>
<option data-img-src="<?php echo SITE_URL ?>/images/<?php echo $bodypart_not_selected['bodypart_thumbnail']; ?>" value="<?php echo $bodypart_not_selected['bodypart_id']; ?>"><?php echo $bodypart_not_selected['bodypart_name']; ?></option>
<?php endforeach; ?>


</select>

   <label class="control-label">Difficulty Level</label>
   <select class="form-control" name="exercise_dificult" required>
   <option value="<?php echo $exercise['exercise_dificult']; ?>" selected><?php echo $exercise['exercise_dificult']; ?></option>
   <option value="Beginner">Beginner</option>
   <option value="Intermediate">Intermediate</option>
   <option value="Advanced">Advanced</option>
   </select>

   <label class="control-label">Time</label>
   <input type="number" value="<?php echo $exercise['exercise_time']; ?>" placeholder="Time" name="exercise_time" class="form-control" required="">

   <label class="control-label">Sets</label>
   <input type="number" value="<?php echo $exercise['exercise_sets']; ?>" placeholder="Sets" name="exercise_sets" class="form-control" required="">

   <label class="control-label">Reps</label>
   <input type="number" value="<?php echo $exercise['exercise_reps']; ?>" placeholder="Reps" name="exercise_reps" class="form-control" required="">

   <label class="control-label">Youtube Video ID</label>
   <input type="text" value="<?php echo $exercise['exercise_video']; ?>" placeholder="Youtube Video ID" name="exercise_video" class="form-control" required="">

   <label class="control-label">Featured Image: <a href="<?php echo SITE_URL ?>/images/<?php echo $exercise['exercise_image']; ?>" data-lightbox="image-1"><?php echo $exercise['exercise_image']; ?></a></label>
   <input name="exercise_image" class="input-file" type="file">
   <input type="hidden" value="<?php echo $exercise['exercise_image']; ?>" name="exercise_image_save">
   <span class="text-danger">Recommended size: <b>1280 x 720 Pixels</b> </span>

   <div class="action-button">
   <input type="submit" name="update" value="Update" class="btn btn-embossed btn-primary">
   <a onclick="alertdelete();">
   <input name="trash" value="Delete" class="btn btn-embossed btn-danger" style="width: 80px;"></a>
    <script type="text/javascript">
   function alertdelete() {
   swal({ title: "Are you sure?", text: "You will not be able to recover this exercise!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_exercise.php?id=<?php echo $exercise['exercise_id']; ?>" });}
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
<script> CKEDITOR.replace( 'steps' ); </script>
</div>
