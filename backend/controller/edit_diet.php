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
$title_page = 'Edit Diet';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$connect = connect($database);
if(!$connect){
	header ('Location: ' . SITE_URL . '/controller/error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$diet_id = cleardata($_POST['diet_id']);
	$diet_title = cleardata($_POST['diet_title']);
	$diet_type = cleardata($_POST['diet_type']);
	$diet_description = $_POST['diet_description'];
	$diet_list = $_POST['diet_list'];
	$diet_calories = cleardata($_POST['diet_calories']);
	$diet_carbs = cleardata($_POST['diet_carbs']);
	$diet_protein = cleardata($_POST['diet_protein']);
	$diet_fat = cleardata($_POST['diet_fat']);
	$diet_image_save = $_POST['diet_image_save'];
	$diet_image = $_FILES['diet_image'];

	if (empty($diet_image['name'])) {
		$diet_image = $diet_image_save;
	} else{
		$diet_image_upload = '../' . $items_config['images_folder'] . $_FILES['diet_image']['name'];
		move_uploaded_file($_FILES['diet_image']['tmp_name'], $diet_image_upload);
		$diet_image = $_FILES['diet_image']['name'];
	}


$statment = $connect->prepare(
	'UPDATE diets SET diet_title = :diet_title, diet_type = :diet_type, diet_description = :diet_description, diet_list = :diet_list, diet_calories = :diet_calories, diet_carbs = :diet_carbs, diet_protein = :diet_protein, diet_fat = :diet_fat, diet_image = :diet_image WHERE diet_id = :diet_id'
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
		':diet_image' => $diet_image,
		':diet_id' => $diet_id

		));

header('Location:' . SITE_URL . '/controller/diets.php');

} else{

$id_diet = id_diet($_GET['id']);
    
if(empty($id_diet)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$diet = get_diet_per_id($connect, $id_diet);
    
    if (!$diet){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$diet = $diet['0'];

}

$recents = recently_added($connect);

require '../views/edit.diet.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>