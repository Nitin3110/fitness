<?php

header('Content-Type: application/json');

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT workouts.*,exercises.exercise_id,exercises.exercise_title,exercises.exercise_image,exercises.exercise_reps,exercises.exercise_sets,workouts_exercises.workout_id AS workouts_exercises_workout_id,workouts_exercises.exercise_id AS workouts_exercises_exercise_id FROM workouts JOIN workouts_exercises ON workouts_exercises.workout_id = workouts.workout_id JOIN exercises ON exercises.exercise_id = workouts_exercises.exercise_id ORDER BY workouts.workout_id DESC";

//$sql = "SELECT workouts.workout_id,workouts.workout_title,workouts.workout_description,workouts.workout_cover,workouts.workout_duration,workouts.workout_diffculty,workouts.workout_goals,exercises.exercise_id,exercises.exercise_title,exercises.exercise_image FROM workouts,exercises JOIN workouts_exercises ON workouts_exercises.workout_id = workouts.workout_id";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$workouts = array();

while($row = mysqli_fetch_array($result)) 
{ 
    $workout_id = $row['workout_id'];
    $workout_title = $row['workout_title'];
    $workout_description = $row['workout_description'];
    $workout_cover = $row['workout_cover'];
    $workout_duration = $row['workout_duration'];
    $workout_diffculty = $row['workout_diffculty'];
    $workout_goals = $row['workout_goals'];
    $exercise_id = $row['exercise_id'];
    $exercise_title = $row['exercise_title'];
    $exercise_image = $row['exercise_image'];
    $exercise_reps = $row['exercise_reps'];
    $exercise_sets = $row['exercise_sets'];
    $workouts_exercises_workout_id = $row['workouts_exercises_workout_id'];
    $workouts_exercises_exercise_id = $row['workouts_exercises_exercise_id'];

    $workouts[] = array(
    	'workout_id'=> $workout_id,
    	'workout_title'=> $workout_title,
    	'workout_description'=> $workout_description,
    	'workout_cover'=> $workout_cover,
    	'workout_duration'=> $workout_duration,
    	'workout_diffculty'=> $workout_diffculty,
    	'workout_goals'=> $workout_goals,
        'exercise_id'=> $exercise_id,
        'exercise_title'=> $exercise_title,
        'exercise_image'=> $exercise_image,
        'exercise_reps'=> $exercise_reps,
        'exercise_sets'=> $exercise_sets,
        'workouts_exercises_workout_id'=> $workouts_exercises_workout_id,
        'workouts_exercises_exercise_id'=> $workouts_exercises_exercise_id,
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = '{"workouts":' . json_encode($workouts) . '}';
print ($json_string)

?>
