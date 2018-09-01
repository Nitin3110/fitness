<?php

header('Content-Type: application/json');

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT products.*,categories_products.categories_products_title AS 'category_name' FROM products,categories_products WHERE product_category = categories_products_id ORDER BY products.product_id DESC";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$products = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_price = $row['product_price'];
    $product_shipping = $row['product_shipping'];
    $product_link = $row['product_link'];
    $product_stock = $row['product_stock'];
    $product_save = $row['product_save'];
    $product_image = $row['product_image'];
    $product_category = $row['product_category'];
    $category_name = $row['category_name'];

    $products[] = array('id'=> (int)$id++,'product_title'=> $product_title, 'product_description'=> $product_description, 'product_price'=> $product_price,'product_shipping'=> $product_shipping,'product_link'=> $product_link, 'product_stock'=> $product_stock,'product_save'=> $product_save, 'product_image'=> $product_image, 'product_category'=> $product_category, 'category_name'=> $category_name);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = '{"products":' . json_encode($products) . '}';
print ($json_string)

?>
