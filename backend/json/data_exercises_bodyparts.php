<?php

header('Content-Type: application/json');

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT exercises.*,bodyparts.bodypart_name,bodyparts.bodypart_id, equipments.equipment_name AS equipment_name, exercises_bodyparts.bodypart_id AS exercises_bodyparts_bodypart_id FROM exercises JOIN exercises_bodyparts ON exercises_bodyparts.exercise_id = exercises.exercise_id JOIN bodyparts ON exercises_bodyparts.bodypart_id = bodyparts.bodypart_id JOIN equipments ON exercises.exercise_equipment = equipments.equipment_id";

//$sql = "SELECT exercises.exercise_title,GROUP_CONCAT(bodyparts.bodypart_name) AS bodypart_name FROM exercises JOIN exercises_bodyparts ON exercises_bodyparts.exercise_id = exercises.exercise_id JOIN bodyparts ON bodyparts.bodypart_id = exercises_bodyparts.bodypart_id GROUP BY exercises_bodyparts.exercise_id";

mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$data_exercises_bodyparts = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{   
    $exercises_bodyparts_bodypart_id = $row['exercises_bodyparts_bodypart_id'];
    $exercise_title = $row['exercise_title'];
    $exercise_reps = $row['exercise_reps'];
    $exercise_dificult = $row['exercise_dificult'];
    $exercise_sets = $row['exercise_sets'];
    $exercise_steps = $row['exercise_steps'];
    $exercise_time = $row['exercise_time'];
    $exercise_image = $row['exercise_image'];
    $exercise_equipment = $row['exercise_equipment'];
    $equipment_name = $row['equipment_name'];
    $bodypart_name = $row['bodypart_name'];

    $data_exercises_bodyparts[] = array('id_exercise'=> $id++,'exercises_bodyparts_bodypart_id'=> $exercises_bodyparts_bodypart_id, 'exercise_title'=> $exercise_title, 'exercise_reps'=> $exercise_reps, 'exercise_dificult'=> $exercise_dificult,'exercise_sets'=> $exercise_sets,'exercise_steps'=> $exercise_steps, 'exercise_time'=> $exercise_time,'exercise_image'=> $exercise_image, 'exercise_equipment'=> $exercise_equipment, 'equipment_name'=> $equipment_name, 'bodypart_name'=> $bodypart_name);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode(['data_exercises_bodyparts' => $data_exercises_bodyparts], JSON_NUMERIC_CHECK );
print ($json_string);

?>
