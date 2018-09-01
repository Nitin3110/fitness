<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-10">
<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">Workouts <span class="label label-default">Total <?php echo $workouts_total; ?></span></h3>
</div>

<div class="panel-body" style="padding: 10px 5px;">
<?php foreach($workouts as $workout): ?>
	<div class="col-md-3">

    <div class="card" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.6)), url('<?php echo SITE_URL ?>/images/<?php echo $workout['workout_cover']; ?>');">
  <div class="card-id">ID <?php echo $workout['workout_id']; ?></div>
  <div class="card-description">
    <h2><?php echo $workout['workout_title']; ?></h2>
    <p><a href="<?php echo SITE_URL ?>/controller/edit_workout.php?id=<?php echo $workout['workout_id']; ?>">Edit</a> · 
    <a onclick="alertdelete_<?php echo $workout['workout_id']; ?>();">Delete</a>
    </p>
    <script type="text/javascript">
   function alertdelete_<?php echo $workout['workout_id']; ?>() {
   swal({ title: "Are you sure?", text: "You will not be able to recover this workout!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_workout.php?id=<?php echo $workout['workout_id']; ?>" });}
   </script> 
  </div>

</div>

    </div>
<?php endforeach; ?>

<?php if( !empty($errors)): ?>
<?php echo $errors; ?>    
<?php endif; ?>
</div>
</div>
<?php require '../controller/pagination.php'; ?>  
</div>
<div class="col-md-2">   
<?php require'sidebar.view.php'; ?>  
</div>
</div>
</div>