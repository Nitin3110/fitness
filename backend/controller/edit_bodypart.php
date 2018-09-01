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

	$bodypart_name = cleardata($_POST['bodypart_name']);
	$bodypart_id = cleardata($_POST['bodypart_id']);
	$bodypart_thumbnail_save = $_POST['bodypart_thumbnail_save'];
	$bodypart_thumbnail = $_FILES['bodypart_thumbnail'];

	if (empty($bodypart_thumbnail['name'])) {
		$bodypart_thumbnail = $bodypart_thumbnail_save;
	} else{
		$bodypart_thumbnail_upload = '../' . $items_config['images_folder'] . $_FILES['bodypart_thumbnail']['name'];
		move_uploaded_file($_FILES['bodypart_thumbnail']['tmp_name'], $bodypart_thumbnail_upload);
		$bodypart_thumbnail = $_FILES['bodypart_thumbnail']['name'];
	}


$statment = $connect->prepare(
	'UPDATE bodyparts SET bodypart_name = :bodypart_name, bodypart_thumbnail = :bodypart_thumbnail WHERE bodypart_id = :bodypart_id'
	);

$statment->execute(array(

		':bodypart_name' => $bodypart_name,
		':bodypart_thumbnail' => $bodypart_thumbnail,
		':bodypart_id' => $bodypart_id

		));

header('Location:' . SITE_URL . '/controller/bodyparts.php');

} else{

$id_bodypart = id_bodypart($_GET['id']);
    
if(empty($id_bodypart)){
	header('Location: home.php');
	}

$bodypart = get_bodypart_per_id($connect, $id_bodypart);
    
    if (!$bodypart){
    header('Location: home.php');
}

$bodypart = $bodypart['0'];

}

$recents = recently_added($connect);

require '../views/edit.bodypart.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>