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
$title_page = 'Edit Product';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$connect = connect($database);
if(!$connect){
	header ('Location: ' . SITE_URL . '/controller/error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$product_id = cleardata($_POST['product_id']);
	$product_title = cleardata($_POST['product_title']);
	$product_description = $_POST['product_description'];
	$product_price = cleardata($_POST['product_price']);
	$product_save = cleardata($_POST['product_save']);
	$product_shipping = cleardata($_POST['product_shipping']);
	$product_link = cleardata($_POST['product_link']);
	$product_stock = cleardata($_POST['product_stock']);
	$product_category = cleardata($_POST['product_category']);
	$product_image_save = $_POST['product_image_save'];
	$product_image = $_FILES['product_image'];

	if (empty($product_image['name'])) {
		$product_image = $product_image_save;
	} else{
		$product_image_upload = '../' . $items_config['images_folder'] . $_FILES['product_image']['name'];
		move_uploaded_file($_FILES['product_image']['tmp_name'], $product_image_upload);
		$product_image = $_FILES['product_image']['name'];
	}


$statment = $connect->prepare(
	'UPDATE products SET product_title = :product_title, product_description = :product_description, product_price = :product_price, product_save = :product_save, product_shipping = :product_shipping, product_link = :product_link, product_stock = :product_stock, product_category = :product_category, product_image = :product_image WHERE product_id = :product_id'
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
		':product_image' => $product_image,
		':product_id' => $product_id

		));

header('Location:' . SITE_URL . '/controller/products.php');

} else{

$id_product = id_product($_GET['id']);
    
if(empty($id_product)){
	header('Location: home.php');
	}

$product = get_product_per_id($connect, $id_product);
    
    if (!$product){
    header('Location: home.php');
}

$product = $product['0'];

}

$categories_products_lists = get_categories_products($connect);
$recents = recently_added($connect);

require '../views/edit.product.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>