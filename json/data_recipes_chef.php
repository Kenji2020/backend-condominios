<?php

if(isset($_GET["chef"])){
    if(!empty($_GET["chef"])){

?>

<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT recipes.*,categories.category_title AS category_title,chefs.chef_title AS chef_title FROM recipes,categories,chefs WHERE recipes.recipe_category = categories.category_id AND recipes.recipe_chef = chefs.chef_id AND recipes.recipe_status = 'Publish' AND recipes.recipe_chef='".$_GET["chef"]."' ORDER BY recipe_id DESC";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$recipes = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
    $recipe_id = $row['recipe_id'];
	$recipe_title = $row['recipe_title'];
    $recipe_description = $row['recipe_description'];
    $recipe_time = $row['recipe_time'];
    $recipe_servings = $row['recipe_servings'];
    $recipe_cals = $row['recipe_cals'];
    $recipe_video = $row['recipe_video'];
    $recipe_category = $row['recipe_category'];
    $recipe_chef = $row['recipe_chef'];
    $recipe_ingredients = $row['recipe_ingredients'];
    $recipe_directions = $row['recipe_directions'];
    $recipe_notes = $row['recipe_notes'];
    $recipe_featured = $row['recipe_featured'];
    $recipe_status = $row['recipe_status'];
    $recipe_image = $row['recipe_image'];
    $category_title = $row['category_title'];
    $chef_title = $row['chef_title'];

    $recipes[] = array(
    	'id'=> $id++,
    	'recipe_id'=> $recipe_id,
        'recipe_title'=> $recipe_title,
        
    	'recipe_description'=> $recipe_description,
    	'recipe_time'=> $recipe_time,
    	'recipe_servings'=> $recipe_servings,
    	'recipe_cals'=> $recipe_cals,
    	'recipe_video'=> $recipe_video,
    	'recipe_category'=> $recipe_category,
    	'recipe_chef'=> $recipe_chef,
    	'recipe_ingredients'=> $recipe_ingredients,
    	'recipe_directions'=> $recipe_directions,
    	'recipe_notes'=> $recipe_notes,
    	'recipe_featured'=> $recipe_featured,
    	'recipe_status'=> $recipe_status,
    	'recipe_image'=> $recipe_image,
        'category_title'=> $category_title,
        'chef_title'=> $chef_title,
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($recipes);
print ($json_string)

?>

<?php

}}

?>

<?php

    if(empty($_GET["chef"])){

?>

<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT recipes.*,categories.category_title AS category_title,chefs.chef_title AS chef_title FROM recipes,categories,chefs WHERE recipes.recipe_category = categories.category_id AND recipes.recipe_chef = chefs.chef_id AND recipes.recipe_status = 'Publish' ORDER BY recipe_id DESC";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$recipes = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{   
    $recipe_id = $row['recipe_id'];
    $recipe_title = $row['recipe_title'];

    $recipe_description = $row['recipe_description'];
    $recipe_time = $row['recipe_time'];
    $recipe_servings = $row['recipe_servings'];
    $recipe_cals = $row['recipe_cals'];
    $recipe_video = $row['recipe_video'];
    $recipe_category = $row['recipe_category'];
    $recipe_chef = $row['recipe_chef'];
    $recipe_ingredients = $row['recipe_ingredients'];
    $recipe_directions = $row['recipe_directions'];
    $recipe_notes = $row['recipe_notes'];
    $recipe_featured = $row['recipe_featured'];
    $recipe_status = $row['recipe_status'];
    $recipe_image = $row['recipe_image'];
    $category_title = $row['category_title'];
    $chef_title = $row['chef_title'];

    $recipes[] = array(
        'id'=> $id++,
        'recipe_id'=> $recipe_id,
        'recipe_title'=> $recipe_title,

        'recipe_description'=> $recipe_description,
        'recipe_time'=> $recipe_time,
        'recipe_servings'=> $recipe_servings,
        'recipe_cals'=> $recipe_cals,
        'recipe_video'=> $recipe_video,
        'recipe_category'=> $recipe_category,
        'recipe_chef'=> $recipe_chef,
        'recipe_ingredients'=> $recipe_ingredients,
        'recipe_directions'=> $recipe_directions,
        'recipe_notes'=> $recipe_notes,
        'recipe_featured'=> $recipe_featured,
        'recipe_status'=> $recipe_status,
        'recipe_image'=> $recipe_image,
        'category_title'=> $category_title,
        'chef_title'=> $chef_title,
        );

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($recipes);
print ($json_string)

?>

<?php

}

?>
