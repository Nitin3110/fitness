<?php 

/*--------------------*/
// App Name: Trainer Fit
// Description: Trainer Fit Ionic App
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
// Version: 1.00
/*--------------------*/

session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';
$title_page = 'New Product';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$product_title = cleardata($_POST['product_title']);
	$product_description = $_POST['product_description'];
	$product_price = cleardata($_POST['product_price']);
	$product_save = cleardata($_POST['product_save']);
	$product_shipping = cleardata($_POST['product_shipping']);
	$product_link = cleardata($_POST['product_link']);
	$product_stock = cleardata($_POST['product_stock']);
	$product_category = cleardata($_POST['product_category']);

	$product_image = $_FILES['product_image']['tmp_name'];

	$product_image_upload = '../' . $items_config['images_folder'] . $_FILES['product_image']['name'];

	move_uploaded_file($product_image, $product_image_upload);

	$statment = $connect->prepare(
		'INSERT INTO products (product_id,product_title,product_description,product_price,product_save,product_shipping,product_link,product_stock,product_category,product_image) VALUES (null, :product_title, :product_description, :product_price, :product_save, :product_shipping, :product_link, :product_stock, :product_category, :product_image)'
		);

	$statment->execute(array(
		':product_title' => $product_title,
		':product_description' => $product_description,
		':product_price' => $product_price,
		':product_save' => $product_save,
		':product_shipping' => $product_shipping,
		':product_link' => $product_link,
		':product_stock' => $product_stock,
		':product_category' => $product_category,
		':product_image' => $_FILES['product_image']['name']
		));

	header('Location:' . SITE_URL . '/controller/products.php');

}

$get_categories_products_lists = get_categories_products($connect);
$recents = recently_added($connect);

require '../views/new.product.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>