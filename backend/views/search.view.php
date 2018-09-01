<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-10">            
<div class="container-fluid">
<div class="row-top row">
<?php echo $title ?>
</div>
<div class="row-table row" style="padding-left: 0; padding-right: 0;">
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
<?php foreach($results as $result): ?>
<tr class="table-fields">
<td><?php echo $result['exercise_id']; ?></td>
<td style="width: 50px;"><a href="<?php echo SITE_URL ?>/images/<?php echo $result['exercise_image']; ?>" data-lightbox="image-1"><img class="media-object" id="image-home" src="<?php echo SITE_URL ?>/images/<?php echo $result['exercise_image']; ?>"></a></td>
<td width="150"><span><?php echo $result['exercise_title']; ?></span></td>
<td><span><?php echo $result['equipment_name']; ?></span></td>
<td><span><?php echo $result['exercise_reps']; ?></span></td>
<td><span><?php echo $result['exercise_time']; ?></span></td>
<td><span><?php echo $result['exercise_dificult']; ?></span></td>
<td><span><?php echo cleardata($result['exercise_sets']); ?></span></td>
<td><span><?php echo cleardata($result['exercise_steps']); ?></span></td>
<td><span><?php echo $result['bodypart_name']; ?></span></td>
<td class="actions">

 <a href="<?php echo SITE_URL ?>/controller/edit_exercise.php?id=<?php echo $result['exercise_id']; ?>">
<button type="button" class="btn btn-embossed btn-default btn-sm" style="width: 100%;margin-bottom: 5px;">Edit</button></a>
<a onclick="alertdelete_<?php echo $result['exercise_id']; ?>();" class="btn btn-embossed btn-danger btn-sm" style="width: 100%;margin-bottom: 5px;">Delete</a>
<script type="text/javascript">
  function alertdelete_<?php echo $result['exercise_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this exercise!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_exercise.php?id=<?php echo $result['exercise_id']; ?>" });}
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