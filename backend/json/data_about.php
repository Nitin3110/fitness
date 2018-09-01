<?php

header('Content-Type: application/json');

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM appsettings";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$about = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{
    $id_app = $row['id_app'];
    $facebook_app = $row['facebook_app'];
    $twitter_app = $row['twitter_app'];
    $instagram_app = $row['instagram_app'];
    $about_app = $row['about_app'];
    $terms_app = $row['terms_app'];

    $about[] = array(
        'id'=> (int)$id++,
        'id_app'=> $id_app,
        'facebook_app'=> $facebook_app,
        'twitter_app'=> $twitter_app,
        'instagram_app'=> $instagram_app,
        'about_app'=> $about_app,
        'terms_app'=> $terms_app,
        );

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = '{"about":' . json_encode($about) . '}';
print ($json_string)

?>
