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
$title_page = 'Delete bodypart';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

$id_bodypart = cleardata($_GET['id']);

if(!$id_bodypart){
	header('Location: ' . SITE_URL . '/controller/home.php');
}

$statement = $connect->prepare('DELETE FROM exercises_bodyparts WHERE bodypart_id = :bodypart_id;');
$statement->execute(array('bodypart_id' => $id_bodypart));

$statement = $connect->prepare('DELETE FROM bodyparts WHERE bodypart_id = :bodypart_id');
$statement->execute(array('bodypart_id' => $id_bodypart));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>