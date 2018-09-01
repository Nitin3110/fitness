<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-8">            
<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">Edit Workout <span class="label label-default">ID <?php echo $workout['workout_id']; ?></span></h3>
</div>

<div class="panel-body">
<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="form-group">

   <input type="hidden" value="<?php echo $workout['workout_id']; ?>" name="workout_id">

   <label class="control-label">Title</label>
   <input type="text" maxlength="80" value="<?php echo $workout['workout_title']; ?>" name="workout_title" class="form-control" required>

   <label class="control-label">Description</label>
   <textarea type="text" class="form-control" name="workout_description" required><?php echo $workout['workout_description']; ?></textarea>

   <label class="control-label">Duraction</label>
   <input type="text" maxlength="80" value="<?php echo $workout['workout_duration']; ?>" name="workout_duration" class="form-control" required>

   <label class="control-label">Difficulty Level</label>
   <select class="form-control" name="workout_diffculty" required>
   <option value="<?php echo $workout['workout_diffculty']; ?>" selected><?php echo $workout['workout_diffculty']; ?></option>
   <option value="Beginner">Beginner</option>
   <option value="Intermediate">Intermediate</option>
   <option value="Advanced">Advanced</option>
   </select>


   <label class="control-label">Workout Goal</label>
   <select class="form-control" name="workout_goals" required="">
   <option value="<?php echo $workout['workout_goals']; ?>" selected><?php echo $workout['workout_goals']; ?></option>
   <option value="Build Muscle">Build Muscle</option>
   <option value="Lost Fat">Lost Fat</option>
   <option value="Transform">Transform</option>
   </select>  
  
   
   <label class="control-label">Exercises</label>
   <select multiple="multiple" class="my-select form-control" name="exercise_id[]" required>

	    <?php foreach($exercises_selected as $exercise_selected): ?>

<?php

$multiple_name_exercise = $exercise_selected['exercise_title'];
$single_name_exercise = explode(',', $multiple_name_exercise);
?>

<?php foreach ($single_name_exercise as $value_name_exercise) { ?>
<option data-img-src="<?php echo SITE_URL ?>/images/<?php echo $exercise_selected['exercise_image']; ?>" value="<?php echo $exercise_selected['exercise_id']; ?>" selected><?php echo $value_name_exercise ?></option>
<?php } ?>

      <?php endforeach; ?>


    <?php foreach($exercises_lists as $exercises_list): ?>
   <option data-img-src="<?php echo SITE_URL ?>/images/<?php echo $exercises_list['exercise_image']; ?>" value="<?php echo $exercises_list['exercise_id']; ?>"><?php echo $exercises_list['exercise_title']; ?></option>
    <?php endforeach; ?>
   </select>

   <label class="control-label">Featured Image: <a href="<?php echo SITE_URL ?>/images/<?php echo $workout['workout_cover']; ?>" data-lightbox="image-1"><?php echo $workout['workout_cover']; ?></a></label>
   <input name="workout_cover" class="input-file" type="file">
   <input type="hidden" value="<?php echo $workout['workout_cover']; ?>" name="workout_cover_save">
   <span class="text-danger">Recommended size: <b>1280 x 720 Pixels</b> </span>

   <div class="action-button">
   <input type="submit" name="update" value="Update" class="btn btn-embossed btn-primary">
   <a onclick="alertdelete();">
   <input name="trash" value="Delete" class="btn btn-embossed btn-danger" style="width: 80px;"></a>
    <script type="text/javascript">
   function alertdelete() {
   swal({ title: "Are you sure?", text: "You will not be able to recover this workout!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_workout.php?id=<?php echo $workout['workout_id']; ?>" });}
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
</div>
