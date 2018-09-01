<?php

header('Content-Type: application/json');

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM categories_products WHERE categories_products.categories_products_id IN (SELECT products.product_category FROM products GROUP BY products.product_id)";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$categories_products = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{ 

    $categories_products_id = $row['categories_products_id'];
    $categories_products_title = $row['categories_products_title'];
    $categories_products_image = $row['categories_products_image'];

    $categories_products[] = array('id'=> $id++,'categories_products_id'=> (int)$categories_products_id, 'categories_products_title'=> $categories_products_title, 'categories_products_image'=> $categories_products_image);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = '{"categories_products":' . json_encode($categories_products) . '}';
print ($json_string)

?>
