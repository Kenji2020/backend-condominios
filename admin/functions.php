<?php

/*--------------------*/
// App Name: Yonia
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
/*--------------------*/

function connect($database){
    try{
        $connect = new PDO('mysql:host='. $database['host'] .';dbname='. $database['db'], $database['user'], $database['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
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

function get_recipes($connect){

$sentence = $connect->prepare('SELECT recipes.*,categories.category_title AS category_title,chefs.chef_title AS chef_title FROM recipes,categories,chefs WHERE recipes.recipe_category = categories.category_id AND recipes.recipe_chef = chefs.chef_id ORDER BY recipe_date DESC LIMIT 8');
$sentence->execute(array());
return $sentence->fetchAll();

}

function get_all_recipes($connect)
{
    
    $sentence = $connect->prepare("SELECT recipes.*,categories.category_title AS category_title,chefs.chef_title AS chef_title FROM recipes,categories,chefs WHERE recipes.recipe_category = categories.category_id AND recipes.recipe_chef = chefs.chef_id"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_recipe($id_recipe){
    return (int)cleardata($id_recipe);
}

function get_recipe_per_id($connect, $id_recipe){
    $sentence = $connect->query("SELECT recipes.*,categories.category_title AS category_title,chefs.chef_title AS chef_title FROM recipes,categories,chefs WHERE recipes.recipe_id = $id_recipe AND recipes.recipe_category = categories.category_id AND recipes.recipe_chef = chefs.chef_id LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_recipes($connect){

$total_numbers = $connect->prepare('SELECT * FROM recipes');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function get_categories($connect){

$sentence = $connect->prepare('SELECT * FROM categories ORDER BY category_id DESC LIMIT 8');
$sentence->execute(array());
return $sentence->fetchAll();

}

function get_all_categories($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM categories ORDER BY category_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_category($id_category){
    return (int)cleardata($id_category);
}

function get_category_per_id($connect, $id_category){
    $sentence = $connect->query("SELECT * FROM categories WHERE category_id = $id_category LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_categories($connect){

$total_numbers = $connect->prepare('SELECT * FROM categories');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function get_chefs($connect){

$sentence = $connect->prepare('SELECT * FROM chefs ORDER BY chef_id DESC LIMIT 8');
$sentence->execute(array());
return $sentence->fetchAll();

}

function get_all_chefs($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM chefs ORDER BY chef_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_chef($id_chef){
    return (int)cleardata($id_chef);
}

function get_chef_per_id($connect, $id_chef){
    $sentence = $connect->query("SELECT * FROM chefs WHERE chef_id = $id_chef LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_chefs($connect){

$total_numbers = $connect->prepare('SELECT * FROM chefs');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function get_all_strings($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM strings"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_all_managers($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM managers ORDER BY id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_manager($id_manager){
    return (int)cleardata($id_manager);
}

function get_manager_per_id($connect, $id_manager){
    $sentence = $connect->query("SELECT * FROM managers WHERE id = $id_manager LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}


function fecha($fecha){

    $timestamp = strtotime($fecha);
    $meses = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    $dia = date('d', $timestamp);
    $mes = date('m', $timestamp) - 1;
    $anyo = date('Y', $timestamp);

    $fecha = "$dia " . $meses[$mes] . " $anyo";
    return $fecha;
}

?>