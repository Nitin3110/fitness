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
$title_page = 'Trainer Fit Backend';
require '../views/header.view.php';
require '../views/navbar.view.php';    

$errors = '';   

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	}
	
$exercises_total = number_exercises($connect);
$equipments_total = number_equipments($connect);
$bodyparts_total = number_bodyparts($connect);
$diets_total = number_diets($connect);
$workouts_total = number_workouts($connect);
$products_total = number_products($connect);
$products_categories_total = number_products_categories($connect);
$subscribers_total = number_subscribers($connect);

$exercises = get_exercises($items_config['items_per_page'], $connect);
 if (empty($exercises)){
     $errors .='<div class="alert alert-warning">No exercises found</div>';
}


require '../views/home.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>