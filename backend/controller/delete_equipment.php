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
$title_page = 'Delete equipment';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

$id_equipment = cleardata($_GET['id']);

if(!$id_equipment){
	header('Location: ' . SITE_URL . '/controller/home.php');
}

$statement = $connect->prepare('DELETE FROM equipments WHERE equipment_id = :equipment_id');
$statement->execute(array('equipment_id' => $id_equipment));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>