<?php

header('Content-Type: application/json');

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM equipments WHERE equipments.equipment_id IN (SELECT exercises.exercise_equipment FROM exercises)";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$equipments = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{ 

    $equipment_id = $row['equipment_id'];
    $equipment_name = $row['equipment_name'];
    $equipment_thumbnail = $row['equipment_thumbnail'];

    $equipments[] = array('id'=> (int)$id++, 'equipment_id'=> $equipment_id, 'equipment_name'=> $equipment_name, 'equipment_thumbnail'=> $equipment_thumbnail);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = '{"equipments":' . json_encode($equipments) . '}';
print ($json_string)

?>
