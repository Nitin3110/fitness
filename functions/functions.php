<?php

function connect($database){
    try{
        $connect = new PDO('mysql:host=localhost;dbname='. $database['db'], $database['user'], $database['pass']);
        return $connect;
        
    }catch (PDOException $e){
        return false;
    }
}

function cleardata($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars ($data);
    return $data;
}

function actual_page(){
    
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}


function get_exercises($items_per_page, $connect)
{
    $home = (actual_page() > 1) ? actual_page() * $items_per_page - $items_per_page : 0;
    $sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS exercises.*,equipments.equipment_name AS equipment_name, GROUP_CONCAT(bodyparts.bodypart_name) AS bodypart_name FROM exercises JOIN exercises_bodyparts ON exercises_bodyparts.exercise_id = exercises.exercise_id JOIN bodyparts ON bodyparts.bodypart_id = exercises_bodyparts.bodypart_id JOIN equipments ON exercises.exercise_equipment = equipments.equipment_id GROUP BY exercises.exercise_id ORDER BY exercises.exercise_date DESC LIMIT $home, $items_per_page");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function number_pages($items_per_page, $connect){

    $total_exercises = $connect->prepare('SELECT FOUND_ROWS() AS total');
    $total_exercises->execute();
    $total_exercises = $total_exercises->fetch()['total'];

    $number_pages = ceil($total_exercises / $items_per_page);
    return $number_pages;
}


function id_exercise($id){
    return (int)cleardata($id);
}

function get_exercise_per_id($connect, $id){
    $sentence = $connect->query("SELECT exercises.*,equipments.equipment_name AS equipment_name, GROUP_CONCAT(bodyparts.bodypart_name) AS bodypart_name FROM exercises JOIN exercises_bodyparts ON exercises_bodyparts.exercise_id = exercises.exercise_id JOIN bodyparts ON bodyparts.bodypart_id = exercises_bodyparts.bodypart_id JOIN equipments ON exercises.exercise_equipment = equipments.equipment_id WHERE exercises.exercise_id = $id GROUP BY exercises.exercise_id LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function recently_added($connect){

$sentence = $connect->prepare('SELECT * FROM exercises ORDER BY exercise_date DESC LIMIT 8');
$sentence->execute(array());
return $sentence->fetchAll();

}

function get_all_diets($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM diets ORDER BY diet_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_all_teams($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM team"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_all_testimonials($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM testimonials ORDER BY id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_diet($id_diet){
    return (int)cleardata($id_diet);
}

function get_diet_per_id($connect, $id_diet){
    $sentence = $connect->query("SELECT * FROM diets WHERE diet_id = $id_diet LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_all_equipments($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM equipments ORDER BY equipment_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_equipment($id_equipment){
    return (int)cleardata($id_equipment);
}

function get_equipment_per_id($connect, $id_equipment){
    $sentence = $connect->query("SELECT * FROM equipments WHERE equipment_id = $id_equipment LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_all_products($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM products ORDER BY product_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_all_products_categories($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM categories_products ORDER BY categories_products_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_product($id_product){
    return (int)cleardata($id_product);
}

function get_product_per_id($connect, $id_product){
    $sentence = $connect->query("SELECT products.*,categories_products.categories_products_title AS category_name FROM products,categories_products WHERE products.product_id = $id_product AND products.product_category = categories_products.categories_products_id LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function id_products_categories($id_products_categories){
    return (int)cleardata($id_products_categories);
}

function get_products_categories_per_id($connect, $id_products_categories){
    $sentence = $connect->query("SELECT * FROM categories_products WHERE categories_products_id = $id_products_categories LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_all_bodyparts($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM bodyparts ORDER BY bodypart_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_bodypart($id_bodypart){
    return (int)cleardata($id_bodypart);
}

function get_bodypart_per_id($connect, $id_bodypart){
    $sentence = $connect->query("SELECT * FROM bodyparts WHERE bodypart_id = $id_bodypart LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_all_workouts($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM workouts ORDER BY workout_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_workout($id_workout){
    return (int)cleardata($id_workout);
}

function get_workout_per_id($connect, $id_workout){
    $sentence = $connect->query("SELECT * FROM workouts WHERE workout_id = $id_workout LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_all_subscribers($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM subscribers ORDER BY subscriber_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_subscriber($id_subscriber){
    return (int)cleardata($id_subscriber);
}

function get_subscriber_per_id($connect, $id_subscriber){
    $sentence = $connect->query("SELECT * FROM subscribers WHERE subscriber_id = $id_subscriber LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_all_appsettings($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM appsettings"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function app_id($app_id){
    return (int)cleardata($app_id);
}

function get_appsettings_per_id($connect, $app_id){
    $sentence = $connect->query("SELECT * FROM appsettings WHERE id_app = $app_id LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_exercises($connect){

$total_numbers = $connect->prepare('SELECT * FROM exercises');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function number_testimonias($connect){

$total_numbers = $connect->prepare('SELECT * FROM testimonials');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}


function number_equipments($connect){

$total_numbers = $connect->prepare('SELECT * FROM equipments');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}


function number_diets($connect){

$total_numbers = $connect->prepare('SELECT * FROM diets');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function number_teams($connect){

$total_numbers = $connect->prepare('SELECT * FROM team');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}


function number_bodyparts($connect){

$total_numbers = $connect->prepare('SELECT * FROM bodyparts');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function number_workouts($connect){

$total_numbers = $connect->prepare('SELECT * FROM workouts');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function number_subscribers($connect){

$total_numbers = $connect->prepare('SELECT * FROM subscribers');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function number_products($connect){

$total_numbers = $connect->prepare('SELECT * FROM products');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function number_products_categories($connect){

$total_numbers = $connect->prepare('SELECT * FROM categories_products');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function get_equipments($connect){

$sentence = $connect->prepare('SELECT * FROM equipments');
$sentence->execute(array());
return $sentence->fetchAll();

}

function get_categories_products($connect){

$sentence = $connect->prepare('SELECT * FROM categories_products');
$sentence->execute(array());
return $sentence->fetchAll();

}

function selected_bodyparts($connect){

if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare('SELECT bodyparts.bodypart_name, bodyparts.bodypart_id, bodyparts.bodypart_thumbnail FROM bodyparts JOIN exercises_bodyparts ON exercises_bodyparts.bodypart_id = bodyparts.bodypart_id JOIN exercises ON exercises_bodyparts.exercise_id = ? GROUP BY exercises_bodyparts.bodypart_id');
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function not_selected_bodyparts($connect){

 if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare('SELECT bodyparts.bodypart_name, bodyparts.bodypart_id, bodyparts.bodypart_thumbnail FROM bodyparts WHERE bodyparts.bodypart_id NOT IN (SELECT exercises_bodyparts.bodypart_id FROM exercises_bodyparts WHERE exercises_bodyparts.exercise_id = ? GROUP BY exercises_bodyparts.bodypart_id)');
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function get_bodyparts($connect){

$sentence = $connect->prepare('SELECT * FROM bodyparts');
$sentence->execute(array());
return $sentence->fetchAll();

}

function selected_exercises($connect){

if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare('SELECT exercises.exercise_title, exercises.exercise_id, exercises.exercise_image FROM exercises JOIN workouts_exercises ON workouts_exercises.exercise_id = exercises.exercise_id JOIN workouts ON workouts_exercises.workout_id = ? GROUP BY workouts_exercises.exercise_id');
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function not_selected_exercises($connect){

 if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare('SELECT exercises.exercise_title, exercises.exercise_id, exercises.exercise_image FROM exercises WHERE exercises.exercise_id NOT IN (SELECT workouts_exercises.exercise_id FROM workouts_exercises WHERE workouts_exercises.workout_id = ? GROUP BY workouts_exercises.exercise_id)');
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function get_exercises_list($connect){

$sentence = $connect->prepare('SELECT exercises.*, GROUP_CONCAT(bodyparts.bodypart_name) AS bodypart_name FROM exercises JOIN exercises_bodyparts ON exercises_bodyparts.exercise_id = exercises.exercise_id JOIN bodyparts ON bodyparts.bodypart_id = exercises_bodyparts.bodypart_id GROUP BY exercises.exercise_id');
$sentence->execute(array());
return $sentence->fetchAll();

}


function get_workouts($items_per_page, $connect)
{
    $home = (actual_page() > 1) ? actual_page() * $items_per_page - $items_per_page : 0;
    $sentence = $connect->prepare("SELECT * FROM workouts ORDER BY workout_id DESC LIMIT $home, $items_per_page");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function get_products_categories($items_per_page, $connect)
{
    $home = (actual_page() > 1) ? actual_page() * $items_per_page - $items_per_page : 0;
    $sentence = $connect->prepare("SELECT * FROM categories_products ORDER BY categories_products_id DESC LIMIT $home, $items_per_page");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function get_subscribers($connect){

$sentence = $connect->prepare('SELECT * FROM subscribers');
$sentence->execute(array());
return $sentence->fetchAll();

}


function fecha($fecha){

    $timestamp = strtotime($fecha);
    $meses = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP ', 'OCT', 'NOV', 'DEC'];
    $dia = date('d', $timestamp);
    $mes = date('m', $timestamp) - 1;
    $ano = date('Y', $timestamp);

    $fecha = "$dia " . $meses[$mes] . " $ano";
    return $fecha;
}
?>



