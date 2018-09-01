<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-8">            
<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">New Workout</h3>
</div>

<div class="panel-body">
<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="form-group">

   <label class="control-label">Title</label>
   <input type="text" value="" maxlength="150" placeholder="Title" name="workout_title" class="form-control" required="">

   <label class="control-label">Description</label>
   <textarea type="text" value="" placeholder="Description" maxlength="350" rows="4" class="form-control" name="workout_description" required=""></textarea>

   <label class="control-label">Duraction</label>
   <input type="text" maxlength="80" value="" name="workout_duration" class="form-control" required>

   <label class="control-label">Difficulty Level</label>
   <select class="form-control" name="workout_diffculty" required="">
   <option value="Beginner">Beginner</option>
   <option value="Intermediate">Intermediate</option>
   <option value="Advanced">Advanced</option>
   </select>

   <label class="control-label">Workout Goal</label>
   <select class="form-control" name="workout_goals" required="">
   <option value="Build Muscle">Build Muscle</option>
   <option value="Lost Fat">Lost Fat</option>
   <option value="Transform">Transform</option>
   </select>  
   


   <label class="control-label">Exercises</label>
   <select multiple="multiple" class="my-select form-control" name="exercise_id[]" required="">
    <?php foreach($exercises_lists as $exercises_list): ?>
   <option data-img-src="<?php echo SITE_URL ?>/images/<?php echo $exercises_list['exercise_image']; ?>" value="<?php echo $exercises_list['exercise_id']; ?>"><?php echo $exercises_list['exercise_title']; ?> || <?php echo $exercises_list['bodypart_name']; ?></option>
    <?php endforeach; ?>
   </select>
   
   <label class="control-label">Cover Image</label>
   <input name="workout_cover" class="input-file" type="file">
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
</div>
