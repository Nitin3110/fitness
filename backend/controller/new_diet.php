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
$title_page = 'New Diet';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$diet_title = cleardata($_POST['diet_title']);
	$diet_type = cleardata($_POST['diet_type']);
	$diet_description = $_POST['diet_description'];
	$diet_list = $_POST['diet_list'];
	$diet_calories = cleardata($_POST['diet_calories']);
	$diet_carbs = cleardata($_POST['diet_carbs']);
	$diet_protein = cleardata($_POST['diet_protein']);
	$diet_fat = cleardata($_POST['diet_fat']);

	$diet_image = $_FILES['diet_image']['tmp_name'];

	$diet_image_upload = '../' . $items_config['images_folder'] . $_FILES['diet_image']['name'];

	move_uploaded_file($diet_image, $diet_image_upload);

	$statment = $connect->prepare(
		'INSERT INTO diets (diet_id,diet_title,diet_type,diet_description,diet_list,diet_calories,diet_carbs,diet_protein,diet_fat,diet_image) VALUES (null, :diet_title,:diet_type,:diet_description,:diet_list,:diet_calories,:diet_carbs,:diet_protein,:diet_fat, :diet_image)'
		);

	$statment->execute(array(

		':diet_title' => $diet_title,
		':diet_type' => $diet_type,
		':diet_description' => $diet_description,
		':diet_list' => $diet_list,
		':diet_calories' => $diet_calories,
		':diet_carbs' => $diet_carbs,
		':diet_protein' => $diet_protein,
		':diet_fat' => $diet_fat,
		':diet_image' => $_FILES['diet_image']['name']
		));

	header('Location:' . SITE_URL . '/controller/diets.php');

}

$recents = recently_added($connect);

require '../views/new.diet.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>