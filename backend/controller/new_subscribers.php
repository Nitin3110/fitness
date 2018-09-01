<?php

/*--------------------*/
// App Name: Trainer Fit
// Description: Trainer Fit Ionic App
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
// Version: 1.00
/*--------------------*/
   
$jsonsubscribers = file_get_contents('php://input');

$objectsubscribers = json_decode($jsonsubscribers);
    
require '../admin/config.php';


$connect = new PDO('mysql:host=localhost;dbname='. $database['db'], $database['user'], $database['pass'])
	or die ('Error Database Conection');

$sql = "INSERT INTO subscribers (subscriber_id,subscriber_name,	subscriber_email,subscriber_date,subscriber_gender,subscriber_age,subscriber_goal) VALUES (NULL, :subscriber_name, :subscriber_email, CURRENT_TIMESTAMP, :subscriber_gender, :subscriber_age, :subscriber_goal)";
$q = $connect->prepare($sql);

$q->execute(array(
	':subscriber_name'=>$objectsubscribers->subscriber_name,
	':subscriber_email'=>$objectsubscribers->subscriber_email,
	':subscriber_gender'=>$objectsubscribers->subscriber_gender,
	':subscriber_age'=>$objectsubscribers->subscriber_age,
	':subscriber_goal'=>$objectsubscribers->subscriber_goal
	));

$connect =  NULL;


?>