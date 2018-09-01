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
$title_page = 'Edit Equipment';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$connect = connect($database);
if(!$connect){
	header ('Location: ' . SITE_URL . '/controller/error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$equipment_name = cleardata($_POST['equipment_name']);
	$equipment_id = cleardata($_POST['equipment_id']);
	$equipment_thumbnail_save = $_POST['equipment_thumbnail_save'];
	$equipment_thumbnail = $_FILES['equipment_thumbnail'];

	if (empty($equipment_thumbnail['name'])) {
		$equipment_thumbnail = $equipment_thumbnail_save;
	} else{
		$equipment_thumbnail_upload = '../' . $items_config['images_folder'] . $_FILES['equipment_thumbnail']['name'];
		move_uploaded_file($_FILES['equipment_thumbnail']['tmp_name'], $equipment_thumbnail_upload);
		$equipment_thumbnail = $_FILES['equipment_thumbnail']['name'];
	}


$statment = $connect->prepare(
	'UPDATE equipments SET equipment_name = :equipment_name, equipment_thumbnail = :equipment_thumbnail WHERE equipment_id = :equipment_id'
	);

$statment->execute(array(

		':equipment_name' => $equipment_name,
		':equipment_thumbnail' => $equipment_thumbnail,
		':equipment_id' => $equipment_id

		));

header('Location:' . SITE_URL . '/controller/equipments.php');

} else{

$id_equipment = id_equipment($_GET['id']);
    
if(empty($id_equipment)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$equipment = get_equipment_per_id($connect, $id_equipment);
    
    if (!$equipment){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$equipment = $equipment['0'];

}

$recents = recently_added($connect);

require '../views/edit.equipment.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>