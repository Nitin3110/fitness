<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-8">            
<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">Edit Product <span class="label label-default">ID <?php echo $product['product_id']; ?></span></h3>
</div>

<div class="panel-body">
<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="form-group">

   <input type="hidden" value="<?php echo $product['product_id']; ?>" name="product_id">
   <label class="control-label">Title</label>
   <input type="text" maxlength="80" value="<?php echo $product['product_title']; ?>" name="product_title" class="form-control" required>

   <label class="control-label">Steps</label>
   <textarea type="text" class="form-control" name="product_description" id="description" required><?php echo $product['product_description']; ?></textarea>

      <label class="control-label">Price</label>
   <input type="text" maxlength="80" value="<?php echo $product['product_price']; ?>" name="product_price" class="form-control" required>

         <label class="control-label">Save</label>
   <input type="text" value="<?php echo $product['product_save']; ?>" name="product_save" class="form-control" required>

         <label class="control-label">Shipping</label>
   <input type="text" value="<?php echo $product['product_shipping']; ?>" name="product_shipping" class="form-control" required>

      <label class="control-label">Affiliate link</label>
   <input type="url" value="<?php echo $product['product_link']; ?>" placeholder="http://www.yourafiliatelink.com" name="product_link" class="form-control" required="">

      <label class="control-label">Stock</label>
   
   <div class="row">
                        <div class="col-sm-2">

                        <?php 


$in = 'In Stock';

if (strpos($in, $product['product_stock']) !== false) {
    echo '<div class="radio radio-success"> <input type="radio" name="product_stock" id="radio3" value="'. $product['product_stock'] .'" checked=""> <label for="radio3"> '. $product['product_stock'] .' </label> </div>';
}else{
	echo '<div class="radio radio-success"> <input type="radio" name="product_stock" id="radio3" value="' . $in .'"> <label for="radio3"> '. $in .' </label> </div>';
}
                         ?>
                        </div>

                        <div class="col-sm-2">

                        <?php 


$out = 'Out Of Stock';

if (strpos($out, $product['product_stock']) !== false) {
    echo '<div class="radio radio-danger"> <input type="radio" name="product_stock" id="radio4" value="Out Of Stock" checked=""> <label for="radio4"> Out Of Stock </label> </div>';
}else{
	echo '<div class="radio radio-success"> <input type="radio" name="product_stock" id="radio4" value="'. $out .'"> <label for="radio4"> '. $out .' </label> </div>';
}
                         ?>
                        </div>

                    </div>

   <label class="control-label">Category</label>
   <select class="form-control" name="product_category" required>
   <option value="<?php echo $product['product_category']; ?>" selected><?php echo $product['category_name']; ?></option>
    <?php foreach($categories_products_lists as $categories_products_list): ?>
   <option value="<?php echo $categories_products_list['categories_products_id']; ?>"><?php echo $categories_products_list['categories_products_title']; ?></option>
    <?php endforeach; ?>
   </select>


   <label class="control-label">Featured Image: <a href="<?php echo SITE_URL ?>/images/<?php echo $product['product_image']; ?>" data-lightbox="image-1"><?php echo $product['product_image']; ?></a></label>
   <input name="product_image" class="input-file" type="file">
   <input type="hidden" value="<?php echo $product['product_image']; ?>" name="product_image_save">
   <span class="text-danger">Recommended size: <b>550 x 400 Pixels</b> </span>

   <div class="action-button">
   <input type="submit" name="update" value="Update" class="btn btn-embossed btn-primary">
   <a onclick="alertdelete();">
   <input name="trash" value="Delete" class="btn btn-embossed btn-danger" style="width: 80px;"></a>
    <script type="text/javascript">
   function alertdelete() {
   swal({ title: "Are you sure?", text: "You will not be able to recover this product!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_product.php?id=<?php echo $product['product_id']; ?>" });}
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
<script> CKEDITOR.replace( 'description' ); </script>
</div>
