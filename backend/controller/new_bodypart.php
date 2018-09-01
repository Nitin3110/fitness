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
$title_page = 'New Bodypart';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$bodypart_name = cleardata($_POST['bodypart_name']);

	$bodypart_thumbnail = $_FILES['bodypart_thumbnail']['tmp_name'];

	$bodypart_thumbnail_upload = '../' . $items_config['images_folder'] . $_FILES['bodypart_thumbnail']['name'];

	move_uploaded_file($bodypart_thumbnail, $bodypart_thumbnail_upload);

	$statment = $connect->prepare(
		'INSERT INTO bodyparts (bodypart_id,bodypart_name,bodypart_thumbnail) VALUES (null, :bodypart_name, :bodypart_thumbnail)'
		);

	$statment->execute(array(
		':bodypart_name' => $bodypart_name,
		':bodypart_thumbnail' => $_FILES['bodypart_thumbnail']['name']
		));

	header('Location:' . SITE_URL . '/controller/bodyparts.php');

}

$recents = recently_added($connect);

require '../views/new.bodypart.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>