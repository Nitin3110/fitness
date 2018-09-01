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
$title_page = 'New Exercise';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$exercises_lists = $_POST['exercise_id'];
	$workout_title = cleardata($_POST['workout_title']);
	$workout_description = cleardata($_POST['workout_description']);
	$workout_duration = cleardata($_POST['workout_duration']);
	$workout_diffculty = cleardata($_POST['workout_diffculty']);
	$workout_goals = cleardata($_POST['workout_goals']);
	
	$workout_cover = $_FILES['workout_cover']['tmp_name'];

	$workout_cover_upload = '../' . $items_config['images_folder'] . $_FILES['workout_cover']['name'];

	move_uploaded_file($workout_cover, $workout_cover_upload);

	$statment = $connect->prepare(
		'INSERT INTO workouts (workout_id,workout_title,workout_description,workout_duration,workout_diffculty,workout_goals,workout_cover) VALUES (null, :workout_title, :workout_description, :workout_duration, :workout_diffculty, :workout_goals, :workout_cover)'
		);

	$statment->execute(array(
		':workout_title' => $workout_title,
		':workout_description' => $workout_description,
		':workout_duration' => $workout_duration,
		':workout_diffculty' => $workout_diffculty,
		':workout_goals' => $workout_goals,
		':workout_cover' => $_FILES['workout_cover']['name']
		));

$statment = $connect->prepare("SELECT @@identity AS id");
$statment->execute();
$resultado = $statment->fetchAll();
$id = 0;
foreach ($resultado as $row) {
        $id = $row["id"];
    }

$statment = $connect->prepare( 'INSERT INTO workouts_exercises (exercise_id,workout_id) VALUES (:exercise_id, :workout_id)' );
$statment->bindParam(':exercise_id', $idexercise);
$statment->bindParam(':workout_id', $id);

foreach ($exercises_lists as $option_value)
{
   $idexercise = $option_value;
   $statment->execute();
}

	header('Location:' . SITE_URL . '/controller/workouts.php');

}

$recents = recently_added($connect);
if(empty($recents)){
	$recents_empty = 'No exercise found';
	}

$exercises_lists = get_exercises_list($connect);

require '../views/new.workout.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>