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
$title_page = 'Edit Product Category';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$connect = connect($database);
if(!$connect){
	header ('Location: ' . SITE_URL . '/controller/error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$categories_products_title = cleardata($_POST['categories_products_title']);
	$categories_products_id = cleardata($_POST['categories_products_id']);
	$categories_products_image_save = $_POST['categories_products_image_save'];
	$categories_products_image = $_FILES['categories_products_image'];

	if (empty($categories_products_image['name'])) {
		$categories_products_image = $categories_products_image_save;
	} else{
		$categories_products_image_upload = '../' . $items_config['images_folder'] . $_FILES['categories_products_image']['name'];
		move_uploaded_file($_FILES['categories_products_image']['tmp_name'], $categories_products_image_upload);
		$categories_products_image = $_FILES['categories_products_image']['name'];
	}


$statment = $connect->prepare(
	'UPDATE categories_products SET categories_products_title = :categories_products_title, categories_products_image = :categories_products_image WHERE categories_products_id = :categories_products_id'
	);

$statment->execute(array(

		':categories_products_title' => $categories_products_title,
		':categories_products_image' => $categories_products_image,
		':categories_products_id' => $categories_products_id

		));

header('Location:' . SITE_URL . '/controller/categories.php');

} else{

$id_products_categories = id_products_categories($_GET['id']);
    
if(empty($id_products_categories)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$category = get_products_categories_per_id($connect, $id_products_categories);
    
    if (!$category){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$category = $category['0'];

}

$recents = recently_added($connect);

require '../views/edit.category.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>