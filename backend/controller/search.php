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
$title_page = 'Search';
require '../views/header.view.php';
require '../views/navbar.view.php';    

 $errors = '';   

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['searching'])) {

	$searching = cleardata($_GET['searching']);

	$statement = $connect->prepare("SELECT exercises.*,equipments.equipment_name AS equipment_name, GROUP_CONCAT(bodyparts.bodypart_name) AS bodypart_name FROM exercises JOIN exercises_bodyparts ON exercises_bodyparts.exercise_id = exercises.exercise_id JOIN bodyparts ON bodyparts.bodypart_id = exercises_bodyparts.bodypart_id JOIN equipments ON exercises.exercise_equipment = equipments.equipment_id WHERE exercises.exercise_title LIKE :searching GROUP BY exercises.exercise_id ORDER BY exercises.exercise_date");
	$statement->execute(array(':searching' => "%$searching%"));
	$results = $statement->fetchAll();

	if (empty($results)){

		$title = '<div class="alert alert-warning">No results found for: ' . '<strong>' . $searching . '</strong></div>';

	} else {

		$title = '<div class="alert alert-success">Searching results for: ' . '<strong>' . $searching . '</strong></div>';
	}

} else {

	header('Location: ' . SITE_URL . '/controller/home.php');
}

} else {
		header('Location: ' . SITE_URL . '/controller/login.php');	
		}

require '../views/search.view.php';

?>