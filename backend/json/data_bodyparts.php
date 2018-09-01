<?php

header('Content-Type: application/json');

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM bodyparts WHERE bodyparts.bodypart_id IN (SELECT exercises_bodyparts.bodypart_id FROM exercises_bodyparts GROUP BY exercises_bodyparts.bodypart_id)";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$bodyparts = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{ 

    $bodypart_id = $row['bodypart_id'];
    $bodypart_name = $row['bodypart_name'];
    $bodypart_thumbnail = $row['bodypart_thumbnail'];

    $bodyparts[] = array(
    	'id'=> (int)$id++,
    	'bodypart_id'=> (int)$bodypart_id,
    	'bodypart_name'=> $bodypart_name,
    	'bodypart_thumbnail'=> $bodypart_thumbnail
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = '{"bodyparts":' . json_encode($bodyparts) . '}';
print ($json_string)

?>
