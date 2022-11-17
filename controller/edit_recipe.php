<?php 

/*--------------------*/
// App Name: Yonia
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
/*--------------------*/

session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';
include('./fileuploader.php');
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$connect = connect($database);
if(!$connect){
	header ('Location: ' . SITE_URL . '/controller/error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$recipe_title = $_POST['recipe_title'];
	$recipe_description = $_POST['recipe_description'];
	$recipe_ingredients = $_POST['recipe_ingredients'];
	$recipe_directions = $_POST['recipe_directions'];
	$recipe_cals = $_POST['recipe_cals'];
	$recipe_time = $_POST['recipe_time'];
	$recipe_servings = $_POST['recipe_servings'];
	$recipe_notes = $_POST['recipe_notes'];
	$recipe_video = $_POST['recipe_video'];
	$recipe_status = $_POST['recipe_status'];
	$recipe_category = $_POST['recipe_category'];
	$recipe_chef = $_POST['recipe_chef'];
	$recipe_featured = $_POST['recipe_featured'];
	$recipe_image_save = $_POST['recipe_image_save'];
	$recipe_id = cleardata($_POST['recipe_id']);
	$recipe_image = $_FILES['recipe_image'];

	if (empty($recipe_image['name'])) {
		$recipe_image = $recipe_image_save;
	} else{
			$imagefile = explode(".", $_FILES["recipe_image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$recipe_image_upload = '../' . $items_config['images_folder'];
		move_uploaded_file($_FILES['recipe_image']['tmp_name'], $recipe_image_upload . 'recipe_' . $renamefile);
		$recipe_image = 'recipe_' . $renamefile;
	}

$statment = $connect->prepare(
	'UPDATE recipes SET recipe_title = :recipe_title, recipe_description = :recipe_description, recipe_ingredients = :recipe_ingredients, recipe_directions = :recipe_directions, recipe_cals = :recipe_cals, recipe_time = :recipe_time, recipe_servings = :recipe_servings, recipe_notes = :recipe_notes, recipe_video = :recipe_video, recipe_status = :recipe_status, recipe_category = :recipe_category, recipe_chef = :recipe_chef, recipe_featured = :recipe_featured, recipe_image = :recipe_image WHERE recipe_id = :recipe_id'
	);

$statment->execute(array(

		':recipe_title' => $recipe_title,
		':recipe_description' => $recipe_description,
		':recipe_ingredients' => $recipe_ingredients,
		':recipe_directions' => $recipe_directions,
		':recipe_cals' => $recipe_cals,
		':recipe_time' => $recipe_time,
		':recipe_servings' => $recipe_servings,
		':recipe_notes' => $recipe_notes,
		':recipe_video' => $recipe_video,
		':recipe_status' => $recipe_status,
		':recipe_category' => $recipe_category,
		':recipe_chef' => $recipe_chef,
		':recipe_featured' => $recipe_featured,
		':recipe_id' => $recipe_id,
		':recipe_image' => $recipe_image

		));

header('Location:' . SITE_URL . '/controller/recipes.php');

} else{

$id_recipe = id_recipe($_GET['id']);
    
if(empty($id_recipe)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$recipe = get_recipe_per_id($connect, $id_recipe);
    
    if (!$recipe){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$recipe = $recipe['0'];

}

$categories = get_categories($connect);
$chefs = get_chefs($connect);

require '../views/edit.recipe.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>