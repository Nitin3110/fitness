<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-8">            
<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">New Product</h3>
</div>

<div class="panel-body">
<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="form-group">

   <label class="control-label">Title</label>
   <input type="text" value="" placeholder="Title" name="product_title" class="form-control" required="">

   <label class="control-label">Description</label>
   <textarea value="" placeholder="Description" name="product_description" class="form-control" id="description" required=""></textarea>

   <label class="control-label">Price</label>
   <input type="text" value="" placeholder="Ex. 40 $" name="product_price" class="form-control" required="">

   <label class="control-label">Save</label>
   <input type="text" value="" placeholder="Ex. 10%" name="product_save" class="form-control" required="">

   <label class="control-label">Shipping</label>
   <input type="text" value="" placeholder="Ex. Free Shipping or 5 $" name="product_shipping" class="form-control" required="">

   <label class="control-label">Affiliate link</label>
   <input type="url" value="" placeholder="http://www.yourafiliatelink.com" name="product_link" class="form-control" required="">

   <label class="control-label">Stock</label>
   
   <div class="row">
                        <div class="col-sm-2">
                             <div class="radio radio-success">
                                <input type="radio" name="product_stock" id="radio3" value="In Stock" checked="">
                                <label for="radio3">
                                    In Stock
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="radio radio-danger">
                                <input type="radio" name="product_stock" id="radio4" value="Out Of Stock">
                                <label for="radio4">
                                    Out Of Stock
                                </label>
                            </div>
                        </div>
                    </div>

   <label class="control-label">Category</label>
   <select class="form-control" name="product_category" required="">
    <?php foreach($get_categories_products_lists as $get_categories_products_list): ?>
   <option value="<?php echo $get_categories_products_list['categories_products_id']; ?>"><?php echo $get_categories_products_list['categories_products_title']; ?></option>
    <?php endforeach; ?>
   </select>

   <label class="control-label">Image</label>
   <input name="product_image" class="input-file" type="file" required="">
   <span class="text-danger">Recommended size: <b>550 x 400 Pixels</b> </span>

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
<script type="text/javascript"> CKEDITOR.replace( 'description' ); </script>
</div>
