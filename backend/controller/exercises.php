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
$title_page = 'Exercises';
require '../views/header.view.php';
require '../views/navbar.view.php';    

$errors = '';   

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	}
	
$exercises = get_exercises($items_config['items_per_page'], $connect);
 if (empty($exercises)){
     $errors .='<div style="padding: 0px 15px;">No exercises found</div>';
}

$exercises_total = number_exercises($connect);



require '../views/exercises.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>