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
$title_page = 'Delete Exercise';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

$id_exercise = cleardata($_GET['id']);

if(!$id_exercise){
	header('Location: ' . SITE_URL . '/controller/home.php');
}

$statement = $connect->prepare('DELETE FROM exercises_bodyparts WHERE exercise_id = :exercise_id;');
$statement->execute(array('exercise_id' => $id_exercise));

$statement = $connect->prepare('DELETE FROM workouts_exercises WHERE exercise_id = :exercise_id;');
$statement->execute(array('exercise_id' => $id_exercise));

$statement = $connect->prepare('DELETE FROM exercises WHERE exercise_id = :exercise_id;');
$statement->execute(array('exercise_id' => $id_exercise));

header('Location: ' . $_SERVER['HTTP_REFERER']);


}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>