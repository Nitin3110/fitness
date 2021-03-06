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
$title_page = 'New Equipment';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$equipment_name = cleardata($_POST['equipment_name']);

	$equipment_thumbnail = $_FILES['equipment_thumbnail']['tmp_name'];

	$equipment_thumbnail_upload = '../' . $items_config['images_folder'] . $_FILES['equipment_thumbnail']['name'];

	move_uploaded_file($equipment_thumbnail, $equipment_thumbnail_upload);

	$statment = $connect->prepare(
		'INSERT INTO equipments (equipment_id,equipment_name,equipment_thumbnail) VALUES (null, :equipment_name, :equipment_thumbnail)'
		);

	$statment->execute(array(
		':equipment_name' => $equipment_name,
		':equipment_thumbnail' => $_FILES['equipment_thumbnail']['name']
		));

	header('Location:' . SITE_URL . '/controller/equipments.php');

}

$recents = recently_added($connect);

require '../views/new.equipment.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>