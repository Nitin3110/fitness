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
$title_page = 'Subscribers';
require '../views/header.view.php';
require '../views/navbar.view.php';    

$errors = '';   

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	}

$subscribers = get_all_subscribers($connect);
 if (empty($subscribers)){
     $errors .='<div class="alert alert-warning">No subscribers found</div>';
}

$subscribers_total = number_subscribers($connect);

require '../views/subscribers.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>