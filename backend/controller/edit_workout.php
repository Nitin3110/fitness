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
$title_page = 'Edit item';
require '../views/header.view.php';
require '../views/navbar.view.php';

$connect = connect($database);
if(!$connect){
	header ('Location: ' . SITE_URL . '/controller/error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$exercises_lists = $_POST['exercise_id'];

	$workout_id = cleardata($_POST['workout_id']);
	$workout_title = cleardata($_POST['workout_title']);
	$workout_description = cleardata($_POST['workout_description']);
	$workout_duration = cleardata($_POST['workout_duration']);
	$workout_diffculty = cleardata($_POST['workout_diffculty']);
	$workout_goals = cleardata($_POST['workout_goals']);
	$workout_cover_save = $_POST['workout_cover_save'];
	$workout_cover = $_FILES['workout_cover'];

	if (empty($workout_cover['name'])) {
		$workout_cover = $workout_cover_save;
	} else{
		$workout_cover_upload = '../' . $items_config['images_folder'] . $_FILES['workout_cover']['name'];
		move_uploaded_file($_FILES['workout_cover']['tmp_name'], $workout_cover_upload);
		$workout_cover = $_FILES['workout_cover']['name'];
	}


$statment = $connect->prepare(
	'UPDATE workouts SET workout_title = :workout_title, workout_description = :workout_description, workout_duration = :workout_duration, workout_diffculty = :workout_diffculty, workout_goals = :workout_goals, workout_cover = :workout_cover WHERE workout_id = :workout_id'
	);

$statment->execute(array(

		':workout_title' => $workout_title,
		':workout_description' => $workout_description,
		':workout_duration' => $workout_duration,
		':workout_diffculty' => $workout_diffculty,
		':workout_goals' => $workout_goals,
		':workout_cover' => $workout_cover,
		':workout_id' => $workout_id

		));

$statment = $connect->prepare('DELETE FROM workouts_exercises WHERE workout_id = :workout_id');
  $statment->bindParam(':workout_id',$workout_id);
  $statment->execute();

  $statment = $connect->prepare( 'INSERT INTO workouts_exercises (exercise_id,workout_id) VALUES (:exercise_id, :workout_id)' );
  $statment->bindParam(':exercise_id', $idexercise);
  $statment->bindParam(':workout_id', $workout_id);

  $statment->execute();

foreach ($exercises_lists as $option_value)
{
   $idexercise = $option_value;
   $statment->execute();
}

header('Location:' . SITE_URL . '/controller/workouts.php');

} else{

$id_workout = id_workout($_GET['id']);
    
if(empty($id_workout)){
	header('Location: home.php');
	}

$workout = get_workout_per_id($connect, $id_workout);
    
    if (!$workout){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$workout = $workout['0'];

}

$recents = recently_added($connect);
$exercises_lists = get_exercises_list($connect);
$exercises_selected = selected_exercises($connect);
$exercises_not_selected = not_selected_exercises($connect);

require '../views/edit.workout.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>