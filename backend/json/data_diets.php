<?php

header('Content-Type: application/json');

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM diets ORDER BY diet_id DESC";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$diets = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{ 

    $diet_id = $row['diet_id'];
    $diet_title = $row['diet_title'];
    $diet_description = $row['diet_description'];
    $diet_list = $row['diet_list'];
    $diet_type = $row['diet_type'];
    $diet_calories = $row['diet_calories'];
    $diet_carbs = $row['diet_carbs'];
    $diet_protein = $row['diet_protein'];
    $diet_fat = $row['diet_fat'];
    $diet_image = $row['diet_image'];

    $diets[] = array(
    	'id'=> (int)$id++,
    	'diet_id'=> (int)$diet_id,
    	'diet_title'=> $diet_title,
    	'diet_description'=> $diet_description,
        'diet_list'=> $diet_list,
    	'diet_type'=> $diet_type,
    	'diet_calories'=> (int)$diet_calories,
    	'diet_carbs'=> (int)$diet_carbs,
    	'diet_protein'=> (int)$diet_protein,
    	'diet_fat'=> (int)$diet_fat,
    	'diet_image'=> $diet_image
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = '{"diets":' . json_encode($diets) . '}';
print ($json_string)

?>
