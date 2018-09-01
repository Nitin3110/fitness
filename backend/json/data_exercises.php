<?php

header('Content-Type: application/json');

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT exercises.*,equipments.equipment_thumbnail,equipments.equipment_name AS equipment_name, GROUP_CONCAT(bodyparts.bodypart_name) AS bodypart_name FROM exercises JOIN exercises_bodyparts ON exercises_bodyparts.exercise_id = exercises.exercise_id JOIN bodyparts ON bodyparts.bodypart_id = exercises_bodyparts.bodypart_id JOIN equipments ON exercises.exercise_equipment = equipments.equipment_id GROUP BY exercises.exercise_id";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$exercises = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{
    $exercise_title = $row['exercise_title'];
    $exercise_reps = $row['exercise_reps'];
    $exercise_dificult = $row['exercise_dificult'];
    $exercise_sets = $row['exercise_sets'];
    $exercise_steps = $row['exercise_steps'];
    $exercise_time = $row['exercise_time'];
    $exercise_image = $row['exercise_image'];
    $exercise_video = $row['exercise_video'];
    $exercise_equipment = $row['exercise_equipment'];
    $bodypart_name = $row['bodypart_name'];
    $equipment_name = $row['equipment_name'];
    $equipment_thumbnail = $row['equipment_thumbnail'];

    $exercises[] = array('id'=> $id++,'exercise_title'=> $exercise_title, 'exercise_reps'=> $exercise_reps, 'exercise_dificult'=> $exercise_dificult,'exercise_sets'=> $exercise_sets,'exercise_steps'=> $exercise_steps, 'exercise_time'=> $exercise_time,'exercise_image'=> $exercise_image,'exercise_video'=> $exercise_video, 'exercise_equipment'=> $exercise_equipment,'bodypart_name'=> $bodypart_name, 'equipment_name'=> $equipment_name, 'equipment_thumbnail'=> $equipment_thumbnail,);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = '{"exercises":' . json_encode($exercises) . '}';
print ($json_string)

?>
