<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-10">            
<div class="container-fluid">
<div class="row-top row">

<a href="<?php echo SITE_URL; ?>/controller/exercises.php"><div class="col-md-16 col-xs-3">
<div class="info-box bg-green">
<span class="info-box-icon bg-icon-green"><i class="glyphicon"><img src="<?php echo SITE_URL ?>/files/1.svg"></i></span>
<div class="info-box-content">
<span class="info-box-text">Exercises</span>
<span class="info-box-number"><?php echo $exercises_total; ?></span></div>
</div></div></a>

<a href="<?php echo SITE_URL; ?>/controller/equipments.php"><div class="col-md-16 col-xs-3">
<div class="info-box bg-green">
<span class="info-box-icon bg-icon-green"><i class="glyphicon"><img src="<?php echo SITE_URL ?>/files/2.svg"></i></span>
<div class="info-box-content">
<span class="info-box-text">Equipments</span>
<span class="info-box-number"><?php echo $equipments_total; ?></span></div>
</div></div></a>

<a href="<?php echo SITE_URL; ?>/controller/bodyparts.php"><div class="col-md-16 col-xs-3">
<div class="info-box bg-green">
<span class="info-box-icon bg-icon-green"><i class="glyphicon"><img src="<?php echo SITE_URL ?>/files/3.svg"></i></span>
<div class="info-box-content">
<span class="info-box-text">Bodyparts</span>
<span class="info-box-number"><?php echo $bodyparts_total; ?></span></div>
</div></div></a>

<a href="<?php echo SITE_URL; ?>/controller/workouts.php"><div class="col-md-16 col-xs-3">
<div class="info-box bg-green">
<span class="info-box-icon bg-icon-green"><i class="glyphicon"><img src="<?php echo SITE_URL ?>/files/5.svg"></i></span>
<div class="info-box-content">
<span class="info-box-text">Workouts</span>
<span class="info-box-number"><?php echo $workouts_total; ?></span></div>
</div></div></a>

<a href="<?php echo SITE_URL; ?>/controller/diets.php"><div class="col-md-16 col-xs-3">
<div class="info-box bg-green">
<span class="info-box-icon bg-icon-green"><i class="glyphicon"><img src="<?php echo SITE_URL ?>/files/6.svg"></i></span>
<div class="info-box-content">
<span class="info-box-text">Diet Plans</span>
<span class="info-box-number"><?php echo $diets_total; ?></span></div>
</div></div></a>

<a href="<?php echo SITE_URL; ?>/controller/categories.php"><div class="col-md-16 col-xs-3">
<div class="info-box bg-green">
<span class="info-box-icon bg-icon-green"><i class="glyphicon"><img src="<?php echo SITE_URL ?>/files/7.svg"></i></span>
<div class="info-box-content">
<span class="info-box-text">Store Categories</span>
<span class="info-box-number"><?php echo $products_categories_total; ?></span></div>
</div></div></a>

<a href="<?php echo SITE_URL; ?>/controller/products.php"><div class="col-md-16 col-xs-3">
<div class="info-box bg-green">
<span class="info-box-icon bg-icon-green"><i class="glyphicon"><img src="<?php echo SITE_URL ?>/files/8.svg"></i></span>
<div class="info-box-content">
<span class="info-box-text">Products</span>
<span class="info-box-number"><?php echo $products_total; ?></span></div>
</div></div></a>

<a href="<?php echo SITE_URL; ?>/controller/subscribers.php"><div class="col-md-16 col-xs-3">
<div class="info-box bg-green">
<span class="info-box-icon bg-icon-green"><i class="glyphicon"><img src="<?php echo SITE_URL ?>/files/9.svg"></i></span>
<div class="info-box-content">
<span class="info-box-text">Subscribers</span>
<span class="info-box-number"><?php echo $subscribers_total; ?></span></div>
</div></div></a>

</div>
<div class="row-table row">
<table class="ui single line table">
<thead>
<tr>
<th>Id</th>
<th>Image</th>
<th>Title</th>
<th>Equipment</th>
<th>Reps.</th>
<th>Time</th>
<th>Dificult</th>
<th>Sets</th>
<th>Steps</th>
<th>Muscles Involved</th>
<th>Actions</th>
</tr>
</thead>
<?php foreach($exercises as $exercise): ?>
<tr class="table-fields">
<td><?php echo $exercise['exercise_id']; ?></td>
<td style="width: 50px;"><a href="<?php echo SITE_URL ?>/images/<?php echo $exercise['exercise_image']; ?>" data-lightbox="image-1"><img class="media-object" id="image-home" src="<?php echo SITE_URL ?>/images/<?php echo $exercise['exercise_image']; ?>"></a></td>
<td width="150"><span><?php echo $exercise['exercise_title']; ?></span></td>
<td><span><?php echo $exercise['equipment_name']; ?></span></td>
<td><span><?php echo $exercise['exercise_reps']; ?></span></td>
<td><span><?php echo $exercise['exercise_time']; ?></span></td>
<td><span><?php echo $exercise['exercise_dificult']; ?></span></td>
<td><span><?php echo cleardata($exercise['exercise_sets']); ?></span></td>
<td><span><?php echo cleardata($exercise['exercise_steps']); ?></span></td>
<td><span><?php echo $exercise['bodypart_name']; ?></span></td>
<td class="actions">

 <a href="<?php echo SITE_URL ?>/controller/edit_exercise.php?id=<?php echo $exercise['exercise_id']; ?>">
<button type="button" class="btn btn-embossed btn-default btn-sm" style="width: 100%;margin-bottom: 5px;">Edit</button></a>
<a onclick="alertdelete_<?php echo $exercise['exercise_id']; ?>();" class="btn btn-embossed btn-danger btn-sm" style="width: 100%;margin-bottom: 5px;">Delete</a>
<script type="text/javascript">
  function alertdelete_<?php echo $exercise['exercise_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this exercise!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_exercise.php?id=<?php echo $exercise['exercise_id']; ?>" });}
  </script>
</td>
</tr>
<?php endforeach; ?>
</table>

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

