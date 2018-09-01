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
$title_page = 'Edit item';
require '../views/header.view.php';
require '../views/navbar.view.php';

$connect = connect($database);
if(!$connect){
	header ('Location: ' . SITE_URL . '/controller/error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$bodypart_lists = $_POST['bodypart_id'];

	$exercise_id = cleardata($_POST['exercise_id']);
	$exercise_title = cleardata($_POST['exercise_title']);
	$exercise_steps = $_POST['exercise_steps'];
	$exercise_equipment = $_POST['exercise_equipment'];
	$exercise_dificult = $_POST['exercise_dificult'];
	$exercise_time = cleardata($_POST['exercise_time']);
	$exercise_sets = cleardata($_POST['exercise_sets']);
	$exercise_reps = cleardata($_POST['exercise_reps']);
	$exercise_image_save = $_POST['exercise_image_save'];
	$exercise_image = $_FILES['exercise_image'];

	if (empty($exercise_image['name'])) {
		$exercise_image = $exercise_image_save;
	} else{
		$exercise_image_upload = '../' . $items_config['images_folder'] . $_FILES['exercise_image']['name'];
		move_uploaded_file($_FILES['exercise_image']['tmp_name'], $exercise_image_upload);
		$exercise_image = $_FILES['exercise_image']['name'];
	}

	$exercise_video = cleardata($_POST['exercise_video']);


$statment = $connect->prepare(
	'UPDATE exercises SET exercise_title = :exercise_title, exercise_steps = :exercise_steps, exercise_equipment = :exercise_equipment, exercise_dificult = :exercise_dificult, exercise_time = :exercise_time, exercise_sets = :exercise_sets, exercise_reps = :exercise_reps, exercise_image = :exercise_image, exercise_video = :exercise_video WHERE exercise_id = :exercise_id'
	);

$statment->execute(array(

		':exercise_title' => $exercise_title,
		':exercise_steps' => $exercise_steps,
		':exercise_equipment' => $exercise_equipment,
		':exercise_dificult' => $exercise_dificult,
		':exercise_time' => $exercise_time,
		':exercise_sets' => $exercise_sets,
		':exercise_reps' => $exercise_reps,
		':exercise_image' => $exercise_image,
		':exercise_video' => $exercise_video,
		':exercise_id' => $exercise_id

		));

$statment = $connect->prepare('DELETE FROM exercises_bodyparts WHERE exercise_id = :exercise_id');
  $statment->bindParam(':exercise_id',$exercise_id);
  $statment->execute();

  $statment = $connect->prepare( 'INSERT INTO exercises_bodyparts (bodypart_id,exercise_id) VALUES (:bodypart_id, :exercise_id)' );
  $statment->bindParam(':bodypart_id', $idbodypart);
  $statment->bindParam(':exercise_id', $exercise_id);

  $statment->execute();

foreach ($bodypart_lists as $option_value)
{
   $idbodypart = $option_value;
   $statment->execute();
}

header('Location:' . SITE_URL . '/controller/home.php');

} else{

$id_exercise = id_exercise($_GET['id']);
    
if(empty($id_exercise)){
	header('Location: home.php');
	}

$exercise = get_exercise_per_id($connect, $id_exercise);
    
    if (!$exercise){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$exercise = $exercise['0'];

}

$recents = recently_added($connect);
$equipment_lists = get_equipments($connect);
$bodypart_lists = get_bodyparts($connect);
$bodyparts_selected = selected_bodyparts($connect);
$bodyparts_not_selected = not_selected_bodyparts($connect);

require '../views/edit.exercise.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>