<?php

header('Content-Type: application/json');

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT exercises.*,workouts.workout_id, workouts_exercises.workout_id AS workouts_exercises_workout_id, equipments.equipment_name AS equipment_name FROM exercises JOIN workouts_exercises ON workouts_exercises.exercise_id = exercises.exercise_id JOIN workouts ON workouts_exercises.workout_id = workouts.workout_id JOIN equipments ON exercises.exercise_equipment = equipments.equipment_id";

//$sql = "SELECT exercises.exercise_title,GROUP_CONCAT(bodyparts.bodypart_name) AS bodypart_name FROM exercises JOIN exercises_bodyparts ON exercises_bodyparts.exercise_id = exercises.exercise_id JOIN bodyparts ON bodyparts.bodypart_id = exercises_bodyparts.bodypart_id GROUP BY exercises_bodyparts.exercise_id";

mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$data_workouts_exercises = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{   
    $workouts_exercises_workout_id = $row['workouts_exercises_workout_id'];
    $exercise_title = $row['exercise_title'];
    $exercise_reps = $row['exercise_reps'];
    $exercise_dificult = $row['exercise_dificult'];
    $exercise_sets = $row['exercise_sets'];
    $exercise_steps = $row['exercise_steps'];
    $exercise_time = $row['exercise_time'];
    $exercise_image = $row['exercise_image'];
    $equipment_name = $row['equipment_name'];
    $exercise_id = $row['exercise_id'];

    $data_workouts_exercises[] = array('w_id_exercise'=> $id++,'workouts_exercises_workout_id'=> $workouts_exercises_workout_id, 'exercise_title'=> $exercise_title, 'exercise_reps'=> $exercise_reps, 'exercise_dificult'=> $exercise_dificult,'exercise_sets'=> $exercise_sets,'exercise_steps'=> $exercise_steps, 'exercise_time'=> $exercise_time,'exercise_image'=> $exercise_image, 'equipment_name'=> $equipment_name, 'exercise_id'=> $exercise_id);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode(['data_workouts_exercises' => $data_workouts_exercises], JSON_NUMERIC_CHECK );
print ($json_string);

?>
