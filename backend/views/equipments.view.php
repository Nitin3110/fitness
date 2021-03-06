<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-10">
<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">Equipments <span class="label label-default">Total <?php echo $equipments_total; ?></span></h3>
</div>

<div class="panel-body" style="padding: 10px 5px;">
<?php foreach($equipments as $equipment): ?>
	<div class="col-md-3">

    <div class="card" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.6)), url('<?php echo SITE_URL ?>/images/<?php echo $equipment['equipment_thumbnail']; ?>');">
  <div class="card-id">ID <?php echo $equipment['equipment_id']; ?></div>
  <div class="card-description">
    <h2><?php echo $equipment['equipment_name']; ?></h2>
    <p>
    <a href="<?php echo SITE_URL ?>/controller/edit_equipment.php?id=<?php echo $equipment['equipment_id']; ?>">Edit</a> · 
    <a onclick="alertdelete_<?php echo $equipment['equipment_id']; ?>();">Delete</a>
    <script type="text/javascript">
  function alertdelete_<?php echo $equipment['equipment_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_equipment.php?id=<?php echo $equipment['equipment_id']; ?>" });}
  </script>
    
    </p>
  </div>
  </div>
  </div>
<?php endforeach; ?>
<?php if( !empty($errors)): ?>
<?php echo $errors; ?>    
<?php endif; ?>

</div>
</div>
<!-- <?php require '../controller/pagination.php'; ?>   -->        
</div>
<div class="col-md-2">   
<?php require'sidebar.view.php'; ?>  
</div>
</div>
</div>