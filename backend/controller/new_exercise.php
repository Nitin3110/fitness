<?php 

/*--------------------*/
// App Name: Trainer Fit
// Description: Trainer Fit Ionic App
// Author: Geordliner
// Author URI: https://codecanyon.net/user/geordliner/portfolio
// Version: 1.00
/*--------------------*/

session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';
$title_page = 'New Exercise';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$bodypart_lists = $_POST['bodypart_id'];
	$exercise_title = cleardata($_POST['exercise_title']);
	$exercise_steps = $_POST['exercise_steps'];
	$exercise_equipment = $_POST['exercise_equipment'];
	$exercise_dificult = $_POST['exercise_dificult'];
	$exercise_time = cleardata($_POST['exercise_time']);
	$exercise_sets = cleardata($_POST['exercise_sets']);
	$exercise_reps = cleardata($_POST['exercise_reps']);
	
	$exercise_image = $_FILES['exercise_image']['tmp_name'];

	$exercise_image_upload = '../' . $items_config['images_folder'] . $_FILES['exercise_image']['name'];

	move_uploaded_file($exercise_image, $exercise_image_upload);

	$exercise_video = cleardata($_POST['exercise_video']);

	$statment = $connect->prepare(
		'INSERT INTO exercises (exercise_id,exercise_title,exercise_steps,exercise_equipment,exercise_dificult,exercise_time,exercise_sets,exercise_reps,exercise_image,exercise_video,exercise_date) VALUES (null, :exercise_title, :exercise_steps, :exercise_equipment, :exercise_dificult, :exercise_time, :exercise_sets, :exercise_reps, :exercise_image, :exercise_video,CURRENT_TIMESTAMP)'
		);

	$statment->execute(array(
		':exercise_title' => $exercise_title,
		':exercise_steps' => $exercise_steps,
		':exercise_equipment' => $exercise_equipment,
		':exercise_dificult' => $exercise_dificult,
		':exercise_time' => $exercise_time,
		':exercise_sets' => $exercise_sets,
		':exercise_reps' => $exercise_reps,
		':exercise_image' => $_FILES['exercise_image']['name'],
		':exercise_video' => $exercise_video,
		));

$statment = $connect->prepare("SELECT @@identity AS id");
$statment->execute();
$resultado = $statment->fetchAll();
$id = 0;
foreach ($resultado as $row) {
        $id = $row["id"];
    }

$statment = $connect->prepare( 'INSERT INTO exercises_bodyparts (bodypart_id,exercise_id) VALUES (:bodypart_id, :exercise_id)' );
$statment->bindParam(':bodypart_id', $idbodypart);
$statment->bindParam(':exercise_id', $id);

foreach ($bodypart_lists as $option_value)
{
   $idbodypart = $option_value;
   $statment->execute();
}

	header('Location:' . SITE_URL . '/controller/home.php');

}

$recents = recently_added($connect);
if(empty($recents)){
	$recents_empty = 'No exercise found';
	}

$equipment_lists = get_equipments($connect);
$bodypart_lists = get_bodyparts($connect);

require '../views/new.exercise.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>