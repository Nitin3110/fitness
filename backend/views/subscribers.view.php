<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-10">
<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">Subscribers <span class="label label-default">Total <?php echo $subscribers_total; ?></span></h3>
</div>

<div style="padding: 10px;">
<table class="ui table">
<thead>
<tr>
<th>Id</th>
<th>Name</th>
<th style="width: 230px">Email</th>
<th>Gender</th>
<th>Age</th>
<th>Goal</th>
<th>Registered</th>
<th>Actions</th>
</tr>
</thead>
<?php foreach($subscribers as $subscriber): ?>
<tr class="table-fields">
<td><?php echo $subscriber['subscriber_id']; ?></td>
<td><span><?php echo $subscriber['subscriber_name']; ?></span></td>
<td><span title="<?php echo $subscriber['subscriber_email']; ?>"><?php echo $subscriber['subscriber_email']; ?></span></td>
<td><span><?php echo $subscriber['subscriber_gender']; ?></span></td>
<td><span><?php echo $subscriber['subscriber_age']; ?></span></td>
<td><span><?php echo $subscriber['subscriber_goal']; ?></span></td>
<td><span><?php echo fecha($subscriber['subscriber_date']); ?></span></td>
<td class="actions">
<a onclick="alertdelete_<?php echo $subscriber['subscriber_id']; ?>();" class="btn btn-embossed btn-danger btn-sm" style="width: 80%;margin-bottom: 5px;">Delete</a>
<script type="text/javascript">
  function alertdelete_<?php echo $subscriber['subscriber_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this subscriber!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_subscriber.php?id=<?php echo $subscriber['subscriber_id']; ?>" });}
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
</div>
<div class="col-md-2">   
<?php require'sidebar.view.php'; ?>  
</div>
</div>
</div>