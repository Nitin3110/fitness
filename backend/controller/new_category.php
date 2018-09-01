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
$title_page = 'New Product Category';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$categories_products_title = cleardata($_POST['categories_products_title']);

	$categories_products_image = $_FILES['categories_products_image']['tmp_name'];

	$categories_products_image_upload = '../' . $items_config['images_folder'] . $_FILES['categories_products_image']['name'];

	move_uploaded_file($categories_products_image, $categories_products_image_upload);

	$statment = $connect->prepare(
		'INSERT INTO categories_products (categories_products_id,categories_products_title,categories_products_image) VALUES (null, :categories_products_title, :categories_products_image)'
		);

	$statment->execute(array(
		':categories_products_title' => $categories_products_title,
		':categories_products_image' => $_FILES['categories_products_image']['name']
		));

	header('Location:' . SITE_URL . '/controller/categories.php');

}

$recents = recently_added($connect);

require '../views/new.category.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>