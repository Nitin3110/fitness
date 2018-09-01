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
$title_page = 'App Settings';
require '../views/header.view.php';
require '../views/navbar.view.php';    

$errors = '';
$success = '';

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$id_app = $_POST['id_app'];
	$facebook_app = $_POST['facebook_app'];
	$twitter_app = $_POST['twitter_app'];
	$instagram_app = $_POST['instagram_app'];
	$about_app = $_POST['about_app'];
	$terms_app = $_POST['terms_app'];
	$logo_app_save = $_POST['logo_app_save'];
	$logo_app = $_FILES['logo_app'];

	if (empty($logo_app['name'])) {
		$logo_app = $logo_app_save;
	} else{
		$logo_app_upload = '../' . $items_config['images_folder'] . $_FILES['logo_app']['name'];
		move_uploaded_file($_FILES['logo_app']['tmp_name'], $logo_app_upload);
		$logo_app = $_FILES['logo_app']['name'];
	}

$statment = $connect->prepare(
	'UPDATE appsettings SET facebook_app = :facebook_app, twitter_app = :twitter_app, instagram_app = :instagram_app, about_app = :about_app, terms_app = :terms_app, logo_app = :logo_app WHERE id_app = :id_app'
	);

	$statment->execute(array(
		':facebook_app' => $facebook_app,
		':twitter_app' => $twitter_app,
		':instagram_app' => $instagram_app,
		':about_app' => $about_app,
		':terms_app' => $terms_app,
		':logo_app' => $logo_app,
		':id_app' => $id_app,
		));

	header('Location: ' . $_SERVER['HTTP_REFERER']);
	echo "Success";

} else{

$app_id = app_id($_GET['id']);
    
if(empty($app_id)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$appsettings = get_appsettings_per_id($connect, $app_id);
    
    if (!$appsettings){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$appsettings = $appsettings['0'];

}

require '../views/appsettings.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>